<?php

class login
{

	public function __construct ( $socket , $dir )
	{
		$dir_log = $dir [ 'character' ] . "/" . __CLASS__ ;
		if ( ! ( file_exists ( $dir_log ) ) )
		{
			mkdir ( $dir_log , 0750 , TRUE ) ;
		}
		$this -> { 'log' } = $dir_log . "/" . date ( "Ymd-His" ) . ".log" ;
		$this -> { 'socket' } = $socket ;
		return ( TRUE ) ;
	}

	public function __deconstruct ( )
	{
		return ( TRUE ) ;
	}

	public function init ( $socket )
	{
		$input = "flag LogOn on\n" ;
		print '[' . __CLASS__ . ']: ' . $input ;
		if ( socket_write ( $this -> { 'socket' } , $input , strlen ( $input ) ) )
		{
			sleep ( 1 ) ;
		}
		return ( TRUE ) ;
	}

	public function socket_read ( $gameArray , $buf )
	{
		if ( preg_match ( "/<pushStream id=\"logons\"/i" , $buf ) )
		{
			if ( $split1 = preg_split ( "/<a /i" , $buf ) )
			{
				if ( isset ( $split1 [ 1 ] ) )
				{
					if ( preg_match_all ( '/ noun="(.*)">(.*)<\/a>/i' , $split1 [ 1 ] , $matches ) )
					{
						if ( preg_match ( "/^" . $matches [ 1 ] [ 0 ] . "/i",  $matches [ 2 ] [ 0 ] ) )
						{
							$character_name = $matches [ 1 ] [ 0 ] ;
						}
					}	
				}
			}
			if ( ! ( isset ( $character_name ) ) )
			{
				$character_name = 'UNKNOWN' ;
			}
			$character_action = 'login' ;
			$character_status = '' ;
			if ( preg_match ( "/has arrived and the adventure can truly begin!/i" , $buf ) )
			{
				$character_action = 'login' ;
				$character_status = 'NEW' ;
			}
			elseif ( preg_match ( "/joins the adventure./i" , $buf ) )
			{
				$character_action = 'login' ;
				$character_status = 'OLD' ;
			}
			elseif ( preg_match ( "/returns home from a hard day of adventuring./" , $buf ) )
			{
				$character_action = 'logout' ;
				$character_status = '' ;
			}
			else
			{
				$character_status = '' ;
			}
			print '[' . __CLASS__ . ' @ ' . date ( "Ymd-His" ) . ']: ' . $character_action . ": " . $character_name ;
			if ( $character_status == 'NEW' )
			{
				print " (NEW)" ;
			}
			print "\n" ;
			file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $character_name . ": " . $character_action . ": " . $character_status . "\n" , FILE_APPEND ) ;

			if ( is_callable ( array ( 'local_db' , 'connect' ) ) )
			{
				$log_array [ 'source' ] = __CLASS__ ;
				$log_array [ 'game_code' ] = $gameArray [ 'local' ] [ 'game_code' ] ;
				$log_array [ 'character_name' ] = $character_name ;
				$log_array [ 'original_text' ] = $buf ;
				$log_array [ 'date_utc' ] = date ( "Y-m-d H:i:s" ) ;
				$local_db = new local_db ( ) ;
				$local_db -> connect ( ) ;
				$local_db -> insert ( __CLASS__ , $log_array ) ;
				$local_db -> close ( ) ;
				unset ( $local_db ) ;
			}

		}
		$return [ 'gameArray' ] = $gameArray ;
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

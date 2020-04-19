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
		$input = "<c>flag LogOn on\n" ;
		print '[' . __CLASS__ . ']: ' . $input ;
		if ( socket_write ( $this -> { 'socket' } , $input , strlen ( $input ) ) )
		{
			sleep ( 1 ) ;
		}
		$input = "<c>flag LogOff on\n" ;
		print '[' . __CLASS__ . ']: ' . $input ;
		if ( socket_write ( $this -> { 'socket' } , $input , strlen ( $input ) ) )
		{
			sleep ( 1 ) ;
		}
		return ( TRUE ) ;
	}

	public function socket_read ( $gameArray , $buf )
	{
		$local_buf = $buf ;

		$type = $gameArray [ 'local' ] [ 'type' ] ;

		$found = FALSE ;

		if ( $type == 'XML' )
		{
			if ( preg_match ( "/<pushStream id=\"logons\"/i" , $buf ) )
			{
				if ( $split1 = preg_split ( "/<a /i" , $local_buf ) )
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
					$character_name = $buf ;
				}
				$character_action = 'login' ;
				$character_status = '' ;

				if ( preg_match ( "/joins the adventure./i" , $buf ) )
				{
					$character_action = 'login' ;
					$character_status = 'OLD' ;
				}
				elseif ( preg_match ( "/arrival./i" , $buf ) )
				{
					$character_action = 'login' ;
					$character_status = 'OLD' ;
				}
				elseif ( preg_match ( "/just nodded off./" , $buf ) )
				{
					$character_action = 'logout' ;
					$character_status = '' ;
				}
				elseif ( preg_match ( "/returns home from a hard day of adventuring./" , $buf ) )
				{
					$character_action = 'logout' ;
					$character_status = '' ;
				}
				elseif ( preg_match ( "/has disconnected./" , $buf ) )
				{
					$character_action = 'logout' ;
					$character_status = '' ;
				}
				elseif ( preg_match ( "/and then dissolve, leaving nothing behind./" , $buf ) )
				{
					$character_action = 'logout' ;
					$character_status = '' ;
				}
				elseif ( preg_match ( "/leaves to correct heretical views and inspire beings toward the path of enlightenment./" , $buf ) )
				{
					$character_action = 'logout' ;
					$character_status = '' ;
				}
				elseif ( preg_match ( "/leaves to heed the call of nature./" , $buf ) )
				{
					$character_action = 'logout' ;
					$character_status = '' ;
				}
				elseif ( preg_match ( "/puts away his shovel and heads for the nearest tavern./" , $buf ) )
				{
					$character_action = 'logout' ;
					$character_status = '' ;
				}
				elseif ( preg_match ( "/is going home./" , $buf ) )
				{
					$character_action = 'logout' ;
					$character_status = '' ;
				}
				elseif ( preg_match ( "/heads off./" , $buf ) )
				{
					$character_action = 'logout' ;
					$character_status = '' ;
				}
				elseif ( preg_match ( "/has arrived and the adventure can truly begin!/i" , $buf ) )
				{
					$character_action = 'login' ;
					$character_status = 'NEW' ;
				}
				else
				{
					$character_status = '' ;
				}

				$output = '[' . __CLASS__ . ' @ ' . date ( "Ymd-His" ) . ']: ' . $character_action . ": " . $character_name ;
				if ( $character_status == 'NEW' )
				{
					$output .= " (NEW)" ;
				}
				$output .= "\n" ;
				file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $character_name . ": " . $character_action . ": " . $character_status . "\n" , FILE_APPEND ) ;
				$found = TRUE ;
			}

		}
		elseif ( preg_match_all ( "/\ \*(.*)\ joins\ the\ adventure\./i" , $buf , $matches ) )
		{
			if ( isset ( $matches [ 1 ] [ 0 ] ) )
			{
				$character_name = $matches [ 1 ] [ 0 ] ;
				$character_action = 'login' ;
				$character_status = '' ;
				file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $character_name . ": " . $character_action . ": " . $character_status . "\n" , FILE_APPEND ) ;
				$output = '[' . __CLASS__ . ' @ ' . date ( "Ymd-His" ) . ']: ' . $character_action . ": " . $character_name . "\n" ;
			}
		}
		elseif ( preg_match_all ( "/\ \*(.*)\ has arrived and the adventure can truly begin\!/i" , $buf , $matches ) )
		{
			if ( isset ( $matches [ 1 ] [ 0 ] ) )
			{
				$character_name = $matches [ 1 ] [ 0 ] ;
				$character_action = 'login' ;
				$character_status = 'NEW' ;
				file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $character_name . ": " . $character_action . ": " . $character_status . "\n" , FILE_APPEND ) ;
				$output = '[' . __CLASS__ . ' @ ' . date ( "Ymd-His" ) . ']: ' . $character_action . ": " . $character_name . " (NEW)\n" ;
			}
		}
		elseif ( preg_match_all ( "/\ \*(.*)\ returns home from a hard day of adventuring\./i" , $buf , $matches ) )
		{
			if ( isset ( $matches [ 1 ] [ 0 ] ) )
			{
				$character_name = $matches [ 1 ] [ 0 ] ;
				$character_action = 'logout' ;
				$character_status = '' ;
				file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $character_name . ": " . $character_action . ": " . $character_status . "\n" , FILE_APPEND ) ;
				$output = '[' . __CLASS__ . ' @ ' . date ( "Ymd-His" ) . ']: ' . $character_action . ": " . $character_name . "\n" ;
			}
		}
		elseif ( preg_match_all ( "/\ \*(.*)\ has disconnected\./i" , $buf , $matches ) )
		{
			if ( isset ( $matches [ 1 ] [ 0 ] ) )
			{
				$character_name = $matches [ 1 ] [ 0 ] ;
				$character_action = 'logout' ;
				$character_status = '' ;
				file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $character_name . ": " . $character_action . ": " . $character_status . "\n" , FILE_APPEND ) ;
				$output = '[' . __CLASS__ . ' @ ' . date ( "Ymd-His" ) . ']: ' . $character_action . ": " . $character_name . "\n" ;
			}
		}

		if ( preg_match_all ( "/(\*)/" , $buf , $matches ) )
		{
			if ( count ( $matches ) > 2 )
			{
				print "Check for multiple login/logout/death: " . $buf . "\n" ;
			}
		}

		if ( $found )
		{
			if ( ! ( preg_match ( "/\ /" , $character_name ) ) )
			{
				if ( is_callable ( array ( 'local_db' , 'connect' ) ) )
				{
					$log_array [ 'source' ] = __CLASS__ ;
					$log_array [ 'game_code' ] = $gameArray [ 'local' ] [ 'game_code' ] ;
					$log_array [ 'character_name' ] = $character_name ;
					$log_array [ 'action' ] = $character_action ;
					$log_array [ 'original_text' ] = $buf ;
					$log_array [ 'date_utc' ] = date ( "Y-m-d H:i:s" ) ;
					$local_db = new local_db ( ) ;
					$local_db -> connect ( ) ;
					$local_db -> insert ( __CLASS__ , $log_array ) ;
					$local_db -> close ( ) ;
					unset ( $local_db ) ;
				}
			}
		}

		$return [ 'gameArray' ] = $gameArray ;
		if ( isset ( $output ) )
		{
			$return [ 'output' ] = $output ;
		}
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

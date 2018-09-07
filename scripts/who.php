<?php

class who
{

	public function __construct ( $socket , $dir )
	{
		$minutes = 15 ;
		$seconds = 60 * $minutes ;
		$dir_log = $dir [ 'character' ] . "/" . __CLASS__ ;
		$this -> { 'seconds' } = $seconds ;
		$this -> { 'who_full' } = FALSE ;
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
		$this -> { 'time' } = ( time ( ) - ( $this -> { 'seconds' } * 2 ) ) ;
		return ( TRUE ) ;
	}

	public function tick ( $gameArray )
	{
		if ( ( time ( ) - $this -> { 'time' } ) >= $this -> { 'seconds' } )
		{
			$input = "WHO FULL\n" ;
			print "[" . __CLASS__ . "] " . $input ;
			if ( socket_write ( $this -> { 'socket' } , $input , strlen ( $input ) ) )
			{
			}
			$this -> { 'time' } = time ( ) ;
		}
		$return [ 'gameArray' ] = $gameArray ;
		return ( $return ) ;
	}

	public function socket_read ( $gameArray , $buf )
	{
		if ( preg_match ( "/Due to the amount of data this command generates, it is necessary to (.*)who full confirm(.*)confirm(.*) it./i" , $buf ) )
		{
			$input = "WHO FULL CONFIRM" ;
			$buf = "[" . __CLASS__ . "] " . $input . "\n" ;
			$input .= "\n" ;
			if ( socket_write ( $this -> { 'socket' } , $input , strlen ( $input ) ) )
			{
			}
			$this -> { 'time' } = time ( ) ;
		}
		elseif ( preg_match ( "/Brave Adventurers Questing:/i" , $buf ) )
		{
			$this -> { 'who_full' } = $buf ;
			$buf = '' ;
		}
		elseif ( ! ( empty ( $this -> { 'who_full' } ) ) )
		{
			$this -> { 'who_full' } .= $buf ;
			$buf = '' ;
		}

		if ( preg_match ( "/Active Players: /i" , $this -> { 'who_full' } ) )
		{
			$array = preg_split ( "/\n/" , $this -> { 'who_full' } ) ;
			foreach ( $array as $line_no => $line )
			{
				if ( preg_match ( "/\ {2,}/" , $line ) )
				{
					if ( $split1 = preg_split ( "/\ {2,}/" , $line ) )
					{
						foreach ( $split1 as $character_line => $character_info )
						{
							if ( preg_match ( '/noun="(.*)"/i' , $character_info , $matches ) )
							{
								if ( isset ( $matches [ 1 ] ) )
								{
									$character_name = $matches [ 1 ] ;

									if ( is_callable ( array ( 'local_db' , 'connect' ) ) )
									{
										$log_array [ 'source' ] = __CLASS__ ;
										$log_array [ 'game_code' ] = $gameArray [ 'local' ] [ 'game_code' ] ;
										$log_array [ 'character_name' ] = $character_name ;
										$log_array [ 'original_text' ] = $character_info ;
										$log_array [ 'date_utc' ] = date ( "Y-m-d H:i:s" ) ;
										$local_db = new local_db ( ) ;
										$local_db -> connect ( ) ;
										$local_db -> insert ( __CLASS__ , $log_array ) ;
										$local_db -> close ( ) ;
										unset ( $local_db ) ;
									}

									file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": ONLINE: " . $character_name . "\n" , FILE_APPEND ) ;
								}
							}
						}
					}
				}
				if ( $split1 = preg_split ( "/Active Players: /i" , trim ( $line ) ) )
				{
					if ( isset ( $split1 [ 1 ] ) )
					{
						$active_players = $split1 [ 1 ] ;
						$buf = '[' . __CLASS__ . ' @ ' . date ( "Ymd-His" ) . ']: ONLINE: ' . $active_players . "\n" ;

						file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": ONLINE: " . $active_players . "\n" , FILE_APPEND ) ;

						if ( is_callable ( array ( 'local_db' , 'connect' ) ) )
						{
							$log_array [ 'source' ] = __CLASS__ ;
							$log_array [ 'game_code' ] = $gameArray [ 'local' ] [ 'game_code' ] ;
							$log_array [ 'total' ] = $active_players ;
							$log_array [ 'original_text' ] = $line ;
							$log_array [ 'date_utc' ] = date ( "Y-m-d H:i:s" ) ;
							$local_db = new local_db ( ) ;
							$local_db -> connect ( ) ;
							$local_db -> insert ( __CLASS__ , $log_array ) ;
							$local_db -> close ( ) ;
							unset ( $local_db ) ;
						}

						break ;
					}
				}
			}
		}
		$return [ 'gameArray' ] = $gameArray ;
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

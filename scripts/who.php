<?php

class who
{

	public function __construct ( $socket , $dir )
	{
		$minutes = 15 ;
		$seconds = 60 * $minutes ;
		$dir_log = $dir [ 'character' ] . "/" . __CLASS__ ;
		$this -> { 'seconds' } = $seconds ;
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
		$this -> { 'time' } = ( time ( ) - $this -> { 'seconds' } - 1 ) ;
		return ( TRUE ) ;
	}

	public function tick ( $gameArray )
	{
		if ( ( time ( ) - $this -> { 'time' } ) >= $this -> { 'seconds' } )
		{
			$input = "WHO" ;
			print "[" . __CLASS__ . "] " . $input . "\n" ;
			$input .= "\n" ;
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
		if ( preg_match ( "/Active Players: /i" , $buf ) )
		{
			$array = preg_split ( "/\n/" , $buf ) ;
			foreach ( $array as $line_no => $line )
			{
				if ( preg_match ( "/Active Players: /i" , $line ) )
				{
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
								$log_array [ 'class' ] = 'All' ;
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
		}

		$return [ 'gameArray' ] = $gameArray ;
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

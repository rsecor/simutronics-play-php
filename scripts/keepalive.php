<?php

class keepalive
{

	public function __construct ( $socket , $dir )
	{
		$this -> { 'socket' } = $socket ;
		$this -> { 'VERBS' } [ ] = 'EXPERIENCE' ;
		$this -> { 'VERBS' } [ ] = 'LUMNIS' ;
		$this -> { 'VERBS' } [ ] = 'WHO' ;
		return ( TRUE ) ;
	}

	public function __deconstruct ( )
	{
		file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": LOG ENDED\n" ) ;
		return ( TRUE ) ;
	}

	public function socket_read ( $gameArray , $buf )
	{
		if ( preg_match ( "/YOU HAVE BEEN IDLE TOO LONG. PLEASE RESPOND./i" , $buf ) )
		{
			$input = $this -> { 'VERBS' } [ array_rand ( $this -> { 'VERBS' } , 1 ) ] . "\n" ;
			print "[" . __CLASS__ . "] " . $input ;
			if ( socket_write ( $this -> { 'socket' } , $input , strlen ( $input ) ) )
			{
			}
		}
		$return [ 'gameArray' ] = $gameArray ;
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

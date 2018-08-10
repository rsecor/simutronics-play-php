<?php

class keepalive
{

	public function __construct ( $socket , $dir )
	{
		$this -> { 'socket' } = $socket ;
		$this -> { 'seconds' } = 30 ;
		$this -> { 'time' } = time ( ) ;
		$this -> { 'VERBS' } [ ] = 'EXPERIENCE' ;
		$this -> { 'VERBS' } [ ] = 'GLANCE' ;
		$this -> { 'VERBS' } [ ] = 'LOOK' ;
		return ( TRUE ) ;
	}

	public function __deconstruct ( )
	{
		file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": LOG ENDED\n" ) ;
		return ( TRUE ) ;
	}

	public function tick ( $gameArray )
	{
		if ( ( time ( ) - $this -> { 'time' } ) >= $this -> { 'seconds' } )
		{
			$input = $this -> { 'VERBS' } [ array_rand ( $this -> { 'VERBS' } , 1 ) ] ;
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

}

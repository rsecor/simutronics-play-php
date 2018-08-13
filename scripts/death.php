<?php

class obituaries
{

	public function __construct ( $socket , $dir )
	{
		$this -> { 'socket' } = $socket ;
		return ( TRUE ) ;
	}

	public function __deconstruct ( )
	{
		return ( TRUE ) ;
	}

	public function socket_read ( $gameArray , $buf )
	{
		if ( preg_match ( "/id=\"death\"/i" , $buf ) )
		{
			print __CLASS__ . ": " . $buf . "\n" ;
		}
		$return [ 'gameArray' ] = $gameArray ;
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

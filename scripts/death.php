<?php

class death
{

	public function __construct ( $socket , $dir )
	{
		$this -> { 'socket' } = $socket ;
		$input = "flag ShowDeaths on\n" ;
		print '[' . __CLASS__ . ']: ' . $input ;
		if ( socket_write ( $this -> { 'socket' } , $input , strlen ( $input ) ) )
		{
		}
		return ( TRUE ) ;
	}

	public function __deconstruct ( )
	{
		return ( TRUE ) ;
	}

	public function socket_read ( $gameArray , $buf )
	{
		// <pushStream id="death"/>
		print __CLASS__ . ": " . $buf . "\n" ;
		if ( preg_match ( "/id=\"death\"/i" , $buf ) )
		{
			print __CLASS__ . ": " . $buf . "\n" ;
		}
		$return [ 'gameArray' ] = $gameArray ;
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

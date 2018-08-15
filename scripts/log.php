<?php

class log
{

	public function __construct ( $socket , $dir )
	{
		$this -> { 'socket' } = $socket ;
		$dir_log = $dir [ 'character' ] . "/" . __CLASS__ ;
		print __CLASS__ . ": dir_log: " . $dir_log . "\n" ;
		if ( ! ( file_exists ( $dir_log ) ) )
		{
			mkdir ( $dir_log , 0750 , TRUE ) ;
		}
		$this -> { 'log' } = $dir_log . "/" . date ( "Ymd-His" ) . ".log" ;
		print __CLASS__ . ": this -> log: " . $this -> { 'log' } . "\n" ;
		file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": LOG STARTED\n" ) ;
		return ( TRUE ) ;
	}

	public function __deconstruct ( )
	{
		file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": LOG ENDED\n" ) ;
		return ( TRUE ) ;
	}

	public function socket_read ( $gameArray , $buf )
	{
		file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $buf , FILE_APPEND ) ;
		$return [ 'gameArray' ] = $gameArray ;
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

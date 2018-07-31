<?php

class log
{

	public function __construct ( $dir )
	{
		if ( ! ( file_exists ( $dir [ 'logs' ] ) ) )
		{
			mkdir ( $dir [ 'logs' ] ) ;
			return ( FALSE ) ;
		}
		$this -> { 'log' } = $dir [ 'logs' ] . "/" . date ( "Ymd-His" ) . ".log" ;
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

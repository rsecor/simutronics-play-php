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
		file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": LOG STARTED" ) ;
		return ( TRUE ) ;
	}

	public function __deconstruct ( )
	{
		file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": LOG ENDED" ) ;
		return ( TRUE ) ;
	}

	public function socket_read ( $data )
	{
		file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $data , FILE_APPEND ) ;
		return ( $data ) ;
	}

}

<?php

class log
{

	function __construct ( $dir )
	{
		mkdir ( $dir [ 'logs' ] ) ;
		$this -> { 'log' } = $dir [ 'logs' ] . "/" . date ( "Ymd-His" ) . ".log" ;
		file_put_contents ( $this -> { 'log' } , NULL ) ;
	}

	function __deconstruct ( )
	{
	}

	function socket_read ( $data )
	{
		file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $data , FILE_APPEND ) ;
		return ( $data ) ;
	}

}

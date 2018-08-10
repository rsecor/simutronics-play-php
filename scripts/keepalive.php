<?php

class log
{

	public function __construct ( $dir )
	{
		$this -> { 'time' } = 1 ;
		return ( TRUE ) ;
	}

	public function __deconstruct ( )
	{
		file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": LOG ENDED\n" ) ;
		return ( TRUE ) ;
	}

	public function socket_read ( $gameArray , $buf )
	{
		$this -> { 'time' } ++ ;
		if ( $this -> { 'time' } > 29 )
		{
			$this -> { 'time' } = 1 ;
		}
		return ( $buf ) ;
	}

}

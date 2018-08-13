<?php

class death
{

	public function __construct ( $socket , $dir )
	{
		$this -> { 'socket' } = $socket ;
                if ( ! ( file_exists ( $dir [ 'logs' ] ) ) )
                {
                        mkdir ( $dir [ 'logs' ] ) ;
                        return ( FALSE ) ;
                }
                $this -> { 'log' } = $dir [ 'logs' ] . "/" . date ( "Ymd" ) . "-death.log" ;
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
		if ( preg_match ( "/id=\"death\"/i" , $buf ) )
		{
			if ( preg_match ( '/noun="(.*)"/i' , $buf , $matches ) )
			{
				if ( isset ( $matches [ 1 ] ) )
				{
					$character_name = $matches [ 1 ] ;
					print '[' . __CLASS__ . ']: ' . date ( "Ymd H:i:s" ) . ": " . $character_name . "\n" ;
			                file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $character_name . "\n" , FILE_APPEND ) ;
				}
			}
		}
		$return [ 'gameArray' ] = $gameArray ;
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

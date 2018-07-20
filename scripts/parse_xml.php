<?php

class parse_xml
{

	function __construct ( $dir )
	{
	}

	function __deconstruct ( )
	{
	}

	function socket_read ( $data )
	{
		$data_out = "parsed: " . $data ;
		return ( $data_out ) ;
	}

}

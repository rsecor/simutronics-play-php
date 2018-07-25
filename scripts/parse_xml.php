<?php

class parse_xml
{

	public function __construct ( $dir )
	{
		return ( TRUE ) ;
	}

	public function __deconstruct ( )
	{
		return ( TRUE ) ;
	}

	public function socket_read ( $data )
	{
		$dom = new DOMDocument ( ) ;
		@$dom -> loadHTML ( $data ) ;
		foreach ( $dom -> getElementsByTagName ( '*' ) as $tag_no => $tag_info )
		{
			print $tag_no . " has " . print_r ( $tag_info , TRUE ) ;
		}
		$data_out = "parsed: " . $data ;
		return ( $data_out ) ;
	}

}

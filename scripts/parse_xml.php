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

	public function socket_read ( $gameArray , $buf )
	{
		$gameArray = $this -> xml2game ( $gameArray , $buf ) ;
		return ( $gameArray ) ;
	}

	public function xml2game ( $gameArray , $buf )
	{
		$xml  = '<?xml version="1.0"?>' . "\n" ;
		$xml .= '<root>' ;
		$xml .= $buf ;
		$xml .= '</root>' ;
		$dom = new DOMDocument ( ) ;
		$dom -> loadXML ( $xml ) ;
		$dom -> normalizeDocument ( ) ;
		$xml =  $dom -> saveXML ( ) ;
		unset ( $dom ) ;
		$dom = new DOMDocument ( ) ;
		$dom -> loadXML ( $xml ) ;
		$array = $this -> xml2array ( $dom ) ;
		print __LINE__ . ": xml: " . $xml . "\n" ;
		print ".............................\n" ;
		$gameArray = $this -> game2array ( $gameArray , $array ) ;
		// print __LINE__ . ": array: " . print_r ( $array , TRUE ) ;
		print __LINE__ . ": gameArray: " . print_r ( $gameArray , TRUE ) ;
		$return [ 'gameArray' ] = $gameArray ;
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}


	private function xml2array ( $domNode )
	{
		$array = array ( ) ;
		$array [ nodeName ] = $domNode -> nodeName ;
		$array [ nodeType ] = $domNode -> nodeType ;
		$array [ localName ] = $domNode -> localName ;
		$array [ nodeValue ] = $domNode -> nodeValue ;
		if ( $domNode -> hasAttributes ( ) )
		{
			foreach ( $domNode -> attributes as $attribute )
			{
				$array [ $attribute -> name ] = $attribute -> value ;
			}
		}
		if ( $domNode -> hasChildNodes ( ) )
		{
			$childNodeNo = 0 ;
			foreach ( $domNode -> childNodes as $childNode )
			{
				$childNodeNo ++ ;
				$array [ $childNodeNo ] = $this -> xml2array ( $childNode ) ;
			}

		}
		return ( $array ) ;
	}

	private function game2array ( $gameArray , $xmlArray )
	{
		foreach ( $xmlArray as $pos => $pos_array )
		{
			if ( is_array ( $pos_array ) )
			{
				$gameArray = $this -> game2array ( $gameArray , $pos_array ) ;
			}
			else
			{
				if ( $pos == 'id' )
				{
					if ( $pos_array == 'ActiveSpells' )
					{
						// print print_r ( $xmlArray , TRUE ) . "\n" ;
					}
					elseif ( $pos_array == 'room' )
					{
						if ( isset ( $xmlArray [ 'title' ] ) )
						{
							$room_title_subtitle = trim ( $xmlArray [ 'title' ] ) ;
							if ( isset ( $xmlArray [ 'subtitle' ] ) )
							{
								$room_title_subtitle = trim ( $xmlArray [ 'title' ] . $xmlArray [ 'subtitle' ] ) ;
							}	
							if ( ! ( empty ( $room_title_subtitle ) ) )
							{
								$gameArray [ 'room' ] = $room_title_subtitle ;
							}
						}	
					}
					else
					{
						$gameArray [ $xmlArray [ 'id' ] ] = $xmlArray [ 'value' ] ;
					}
				}
			}
		}
		return ( $gameArray ) ;
	}



}

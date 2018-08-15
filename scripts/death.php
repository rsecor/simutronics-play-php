<?php

class death
{

	public function __construct ( $socket , $dir )
	{
		$this -> { 'socket' } = $socket ;

		// INFO - https://gswiki.play.net/Death%27s_Sting#Death_Messaging
		$this -> { 'location' } [ "(.*) just got squashed!" ] = "Cysaegir" ;	
		$this -> { 'location' } [ "(.*) has gone to feed the fishes!" ] = "River's Rest / Citadel" ;
		$this -> { 'location' } [ "(.*) just bit the dust!" ] = "Wehnimer's Landing" ;
		$this -> { 'location' } [ "(.*) just turned (.*) last page!" ] = "Ta'Illistim / OTF" ;
		$this -> { 'location' } [ "(.*) was just put on ice!" ] = "Icemule Trace" ;
		$this -> { 'location' } [ "(.*) just punched a one-way ticket!" ] = "Teras Isle / Ruined Temple" ;
		$this -> { 'location' } [ "(.*) is going home on his shield!" ] = "Ta'Vaalor" ;
		$this -> { 'location' } [ "(.*) just took a long walk off a short pier!" ] = "Solhaven" ;
		$this -> { 'location' } [ "(.*) is dust in the wind!" ] = "Four Winds Isle" ;
		$this -> { 'location' } [ "(.*) is six hundred feet under!" ] = "Zul Logoth" ;
		$this -> { 'location' } [ "(.*) may just be going home on his shield!" ] = "Aradhul Road / Displaced Red Forest" ;
		$this -> { 'location' } [ "The death cry of (.*) echoes in your mind!" ] = "The Rift" ;
		$this -> { 'location' } [ "(.*) (.*) in the Elemental Confluence!" ] = "Elemental Confluence" ;
		$this -> { 'location' } [ "(.*) just gave up the ghost!" ] = "Castle Varunar / Trail to Solhaven / Trail to Icemule" ;
		$this -> { 'location' } [ "(.*) flame just burnt out in the Sea of Fire!" ] = "Sanctum of Scales" ;
		$this -> { 'location' } [ "(.*) just lost his way somewhere in the Settlement of Reim!" ] = "Reim" ;
		$this -> { 'location' } [ "(.*) just perished defending a fortress within Reim!" ] = "Reim Fortress Defense" ;
		$this -> { 'location' } [ "(.*) just defeated in Duskruin Arena!" ] = "Duskruin Arena" ;
		$this -> { 'location' } [ "(.*) just perished underneath Bloodriven Village!" ] = "Duskruin Arena Sewers" ;
		$this -> { 'location' } [ "(.*) failed within the Bank at Bloodriven!" ] = "Duskruin Bank Heist" ;
		$this -> { 'location' } [ "(.*) is now fish food for the fauna of Caligos Isle!" ] = "Ebon Gate Festival - Caligos Isle" ;
		$this -> { 'location' } [ "(.*) was just reunited with her ancestors!" ] = "Ebon Gate Festival - Feywrot Mire" ;
		$this -> { 'location' } [ "(.*) failed to bring a shrubbery to the Night at the Academy!" ] = "Night at the Academy" ;

                $dir_log = $dir [ 'character' ] . "/" . __CLASS__ ;
                if ( ! ( file_exists ( $dir_log ) ) )
                {
                        mkdir ( $dir_log ) ;
                        return ( FALSE ) ;
                }
                $this -> { 'log' } = $dir_log . "/" . date ( "Ymd-His" ) . ".log" ;
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
			if ( $split1 = preg_split ( "/<a /i" , $buf ) )
			{
				if ( isset ( $split1 [ 1 ] ) )
				{
					if ( preg_match_all ( '/ noun="(.*)">(.*)<\/a>/i' , $split1 [ 1 ] , $matches ) )
					{
						if ( preg_match ( "/^" . $matches [ 1 ] [ 0 ] . "/i",  $matches [ 2 ] [ 0 ] ) )
						{
							$character_name = $matches [ 1 ] [ 0 ] ;
						}
					}	
				}
			}
			foreach ( $this -> { 'location' } as $death_message => $location )
			{
				if ( preg_match_all ( "/" . $death_message . "/i" , $buf , $matches ) )
				{
					if ( isset ( $matches [ 1 ] ) )
					{
						$death_location = $location ;
						break ;
					}
				}
			}
			if ( isset ( $character_name ) )
			{
				if ( isset ( $death_location ) )
				{
					print '[' . __CLASS__ . ']: ' . $character_name . ' has died near ' . $death_location . "\n" ;
			                file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $character_name . ": " . $death_location . "\n" , FILE_APPEND ) ;
				}
				else
				{
					print $buf ;
			                file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $character_name . ": UNKNOWN\n" , FILE_APPEND ) ;
				}
			}
			else
			{
				if ( isset ( $death_location ) )
				{
					print $buf ;
					print '[' . __CLASS__ . ']: ' . 'UNKNOWN' . ' has died near ' . $death_location . "\n" ;
			                file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . 'UNKNOWN' . ": " . $death_location . "\n" , FILE_APPEND ) ;
				}
				else
				{
					print $buf ;
					print '[' . __CLASS__ . ']: ' . 'UNKNOWN' . ' has died near ' . 'UNKNOWN' . "\n" ;
			                file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . 'UNKNOWN' . ": UNKNOWN\n" , FILE_APPEND ) ;
				}
			}
		}
		$return [ 'gameArray' ] = $gameArray ;
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

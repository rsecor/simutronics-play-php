<?php

class death
{

	public function __construct ( $socket , $dir )
	{
		// INFO - https://gswiki.play.net/Death%27s_Sting#Death_Messaging

		// Elmental Confluence
		$this -> { 'location' } [ "(.*) just bit the dust in the Elemental Confluence!" ] = "Elemental Confluence / Wehnimer's Landing" ;
		$this -> { 'location' } [ "(.*) just turned (.*) last page in the Elemental Confluence!" ] = "Elemental Confluence / Ta'Illistim / OTF" ;
		$this -> { 'location' } [ "(.*) is six hundred feet under the Elemental Confluence!" ] = "Elemental Confluence / Zul Logoth" ;
		$this -> { 'location' } [ "(.*) just punched a one-way ticket to the Elemental Confluence!" ] = "Elemental Confluence / Teras Isle / Ruined Temple" ;
		$this -> { 'location' } [ "(.*) is dust in the winds of the Elemental Confluence!" ] = "Elemental Confluence / Four Winds Isle" ;
		$this -> { 'location' } [ "(.*) is going home from the Elemental Confluence on (.*) shield!" ] = "Elemental Confluence / Ta'Vaalor" ;
		$this -> { 'location' } [ "(.*) just took a long walk off of a short pier in the Elemental Confluence!" ] = "Elemental Confluence / Solhaven" ;
		$this -> { 'location' } [ "(.*) was just put on ice in the Elemental Confluence!" ] = "Elemental Confluence / Icemule Trace" ;
		$this -> { 'location' } [ "(.*) has gone to feed the fishes in the Elemental Confluence!" ] = "Elemental Confluence / River's Rest / Citadel" ;
		$this -> { 'location' } [ "(.*) (.*) in the Elemental Confluence!" ] = "Elemental Confluence" ;

		// Towns
		$this -> { 'location' } [ "(.*) just bit the dust!" ] = "Wehnimer's Landing" ;
		$this -> { 'location' } [ "(.*) just turned (.*) last page!" ] = "Ta'Illistim / OTF" ;
		$this -> { 'location' } [ "(.*) is six hundred feet under!" ] = "Zul Logoth" ;
		$this -> { 'location' } [ "(.*) just punched a one-way ticket!" ] = "Teras Isle / Ruined Temple" ;
		$this -> { 'location' } [ "(.*) is dust in the wind!" ] = "Four Winds Isle" ;
		$this -> { 'location' } [ "(.*) is going home on (.*) shield!" ] = "Ta'Vaalor" ;
		$this -> { 'location' } [ "(.*) just took a long walk off of a short pier!" ] = "Solhaven" ;
		$this -> { 'location' } [ "(.*) was just put on ice!" ] = "Icemule Trace" ;
		$this -> { 'location' } [ "(.*) has gone to feed the fishes!" ] = "River's Rest / Citadel" ;

		// Quests / Events
		$this -> { 'location' } [ "(.*) just bit the dust... somewhere around Bloodriven Village!" ] = "Bloodriven Village" ;
		$this -> { 'location' } [ "(.*) just became plant food!" ] = "Circle of Trees, A Midsummer Night's Festival" ;
		$this -> { 'location' } [ "(.*) just bit the dust... in Black Swan Castle!" ] = "Black Swan Castle" ;
		$this -> { 'location' } [ "(.*) just got squashed!" ] = "Cysaegir" ;	
		$this -> { 'location' } [ "(.*) may just be going home on (.*) shield!" ] = "Aradhul Road / Displaced Red Forest" ;
		$this -> { 'location' } [ "The death cry of (.*) echoes in your mind!" ] = "The Rift" ;
		$this -> { 'location' } [ "(.*) just gave up the ghost!" ] = "Castle Varunar / Trail to Solhaven / Trail to Icemule" ;
		$this -> { 'location' } [ "(.*) flame just burnt out in the Sea of Fire!" ] = "Sanctum of Scales" ;
		$this -> { 'location' } [ "(.*) just lost (.*) way somewhere in the Settlement of Reim!" ] = "Reim" ;
		$this -> { 'location' } [ "(.*) just perished within the Reim Base Camp!" ] = "Reim Base Camp" ;
		$this -> { 'location' } [ "(.*) just perished defending a fortress within Reim!" ] = "Reim Fortress Defense" ;
		$this -> { 'location' } [ "(.*) just defeated in Duskruin Arena!" ] = "Duskruin Arena" ;
		$this -> { 'location' } [ "(.*) just perished underneath Bloodriven Village!" ] = "Duskruin Arena Sewers" ;
		$this -> { 'location' } [ "(.*) failed within the Bank at Bloodriven!" ] = "Duskruin Bank Heist" ;
		$this -> { 'location' } [ "(.*) is now fish food for the fauna of Caligos Isle!" ] = "Ebon Gate Festival - Caligos Isle" ;
		$this -> { 'location' } [ "(.*) was just reunited with (.*) ancestors!" ] = "Ebon Gate Festival - Feywrot Mire" ;
		$this -> { 'location' } [ "(.*) failed to bring a shrubbery to the Night at the Academy!" ] = "Night at the Academy" ;

		// Other
		$this -> { 'location' } [ "(.*) has just returned to Gosaena!" ] = "Unknown" ;
		$this -> { 'location' } [ "(.*) was just disintegrated!" ] = "Unknown" ;
		$this -> { 'location' } [ "(.*) has been vaporized!" ] = "Unknown" ;

		$dir_log = $dir [ 'character' ] . "/" . __CLASS__ ;
		if ( ! ( file_exists ( $dir_log ) ) )
		{
			mkdir ( $dir_log , 0750 , TRUE ) ;
		}
		$this -> { 'log' } = $dir_log . "/" . date ( "Ymd-His" ) . ".log" ;
		$this -> { 'socket' } = $socket ;
		return ( TRUE ) ;
	}

	public function __deconstruct ( )
	{
		return ( TRUE ) ;
	}

	public function init ( $socket )
	{
		$input = "flag ShowDeaths on\n" ;
		print '[' . __CLASS__ . ']: ' . $input ;
		if ( socket_write ( $this -> { 'socket' } , $input , strlen ( $input ) ) )
		{
			sleep ( 1 ) ;
		}
		return ( TRUE ) ;
	}

	public function socket_read ( $gameArray , $buf )
	{
		$buf = preg_replace ( "/is off to a rough start!  (She|He) /i" , "" , $buf ) ;
		if ( preg_match ( "/<pushStream id=\"death\"/i" , $buf ) )
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
			if ( ! ( isset ( $character_name ) ) )
			{
				$character_name = 'UNKNOWN' ;
			}
			if ( ! ( isset ( $death_location ) ) )
			{
				$death_location = 'UNKNOWN' ;
			}
			$buf = '[' . __CLASS__ . ' @ ' . date ( "Ymd-His" ) . ']: ' . $character_name . ' has died near ' . $death_location . "\n" ;
			file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $character_name . ": " . $death_location . "\n" , FILE_APPEND ) ;

			if ( is_callable ( array ( 'local_db' , 'connect' ) ) )
			{
				$log_array [ 'source' ] = __CLASS__ ;
				$log_array [ 'game_code' ] = $gameArray [ 'local' ] [ 'game_code' ] ;
				$log_array [ 'character_name' ] = $character_name ;
				$log_array [ 'location_name' ] = $death_location ;
				$log_array [ 'original_text' ] = $buf ;
				$log_array [ 'date_utc' ] = date ( "Y-m-d H:i:s" ) ;
				$local_db = new local_db ( ) ;
				$local_db -> connect ( ) ;
				$local_db -> insert ( __CLASS__ , $log_array ) ;
				$local_db -> close ( ) ;
				unset ( $local_db ) ;
			}

		}
		$return [ 'gameArray' ] = $gameArray ;
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

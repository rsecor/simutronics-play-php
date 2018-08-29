<?php

class death
{

	public function __construct ( $socket , $dir )
	{
		// INFO - https://gswiki.play.net/Death%27s_Sting#Death_Messaging

		// Elmental Confluence
		$this -> { 'location' } [ "(.*) has gone to feed the fishes in the Elemental Confluence!" ] = "Elemental Confluence / River's Rest / Citadel" ;
		$this -> { 'location' } [ "(.*) is dust in the winds of the Elemental Confluence!" ] = "Elemental Confluence / Four Winds Isle" ;
		$this -> { 'location' } [ "(.*) is going home from the Elemental Confluence on h(er|is) shield!" ] = "Elemental Confluence / Ta'Vaalor" ;
		$this -> { 'location' } [ "(.*) is six hundred feet under the Elemental Confluence!" ] = "Elemental Confluence / Zul Logoth" ;
		$this -> { 'location' } [ "(.*) just bit the dust in the Elemental Confluence!" ] = "Elemental Confluence / Wehnimer's Landing" ;
		$this -> { 'location' } [ "(.*) just turned h(er|is) last page in the Elemental Confluence!" ] = "Elemental Confluence / Ta'Illistim / OTF" ;
		$this -> { 'location' } [ "(.*) just punched a one-way ticket to the Elemental Confluence!" ] = "Elemental Confluence / Teras Isle / Ruined Temple" ;
		$this -> { 'location' } [ "(.*) just took a long walk off of a short pier in the Elemental Confluence!" ] = "Elemental Confluence / Solhaven" ;
		$this -> { 'location' } [ "(.*) was just put on ice in the Elemental Confluence!" ] = "Elemental Confluence / Icemule Trace" ;
		$this -> { 'location' } [ "(.*) (.*) in the Elemental Confluence!" ] = "Elemental Confluence" ;

		// Towns
		$this -> { 'location' } [ "(.*) has gone to feed the fishes!" ] = "River's Rest / Citadel" ;
		$this -> { 'location' } [ "(.*) is dust in the wind!" ] = "Four Winds Isle" ;
		$this -> { 'location' } [ "(.*) is going home on h(er|is) shield!" ] = "Ta'Vaalor" ;
		$this -> { 'location' } [ "(.*) is six hundred feet under!" ] = "Zul Logoth" ;
		$this -> { 'location' } [ "(.*) just bit the dust!" ] = "Wehnimer's Landing" ;
		$this -> { 'location' } [ "(.*) just punched a one-way ticket!" ] = "Teras Isle / Ruined Temple" ;
		$this -> { 'location' } [ "(.*) just took a long walk off a short pier!" ] = "Solhaven" ;
		$this -> { 'location' } [ "(.*) just took a long walk off of a short pier!" ] = "Solhaven" ;
		$this -> { 'location' } [ "(.*) just turned h(er|is) last page!" ] = "Ta'Illistim / OTF" ;
		$this -> { 'location' } [ "(.*) was just put on ice!" ] = "Icemule Trace" ;

		// Quests / Events
		$this -> { 'location' } [ "The death cry of (.*) echoes in your mind!" ] = "The Rift" ;
		$this -> { 'location' } [ "(.*) failed to bring a shrubbery to the Night at the Academy!" ] = "Night at the Academy" ;
		$this -> { 'location' } [ "(.*) failed within the Bank at Bloodriven!" ] = "Duskruin Bank Heist" ;
		$this -> { 'location' } [ "(.*) flame just burnt out in the Sea of Fire!" ] = "Sanctum of Scales" ;
		$this -> { 'location' } [ "(.*) is now fish food for the fauna of Caligos Isle!" ] = "Ebon Gate Festival - Caligos Isle" ;
		$this -> { 'location' } [ "(.*) just became plant food!" ] = "Circle of Trees, A Midsummer Night's Festival" ;
		$this -> { 'location' } [ "(.*) just bit the dust... in Black Swan Castle!" ] = "Black Swan Castle" ;
		$this -> { 'location' } [ "(.*) just bit the dust... somewhere around Bloodriven Village!" ] = "Bloodriven Village" ;
		$this -> { 'location' } [ "(.*) was just defeated in Duskruin Arena!" ] = "Duskruin Arena" ;
		$this -> { 'location' } [ "(.*) just died on the Great Western Sea!" ] = "Troubled Waters" ;
		$this -> { 'location' } [ "(.*) just got squashed!" ] = "Cysaegir" ;	
		$this -> { 'location' } [ "(.*) just got trampled in the Talondown Arena!" ] = "Talondown Arena" ;
		$this -> { 'location' } [ "(.*) just gave up the ghost!" ] = "Castle Varunar / Trail to Solhaven / Trail to Icemule" ;
		$this -> { 'location' } [ "(.*) just lost h(er|is) way somewhere in the Settlement of Reim!" ] = "Reim" ;
		$this -> { 'location' } [ "(.*) just perished defending a fortress within Reim!" ] = "Reim Fortress Defense" ;
		$this -> { 'location' } [ "(.*) just perished underneath Bloodriven Village!" ] = "Duskruin Arena Sewers" ;
		$this -> { 'location' } [ "(.*) just perished within the Reim Base Camp!" ] = "Reim Base Camp" ;
		$this -> { 'location' } [ "(.*) may just be going home on h(er|is) shield!" ] = "Aradhul Road / Displaced Red Forest" ;
		$this -> { 'location' } [ "(.*) was just reunited with h(er|is) ancestors!" ] = "Ebon Gate Festival - Feywrot Mire" ;

		// Holiday - April Fool's
		$this -> { 'location' } [ "Alas, poor (.*).  I knew h(er|im), Horatio." ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "Hmm hmm hmm... yawn  Oh yeah, (.*) just died." ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "To be... or not to be...  Guess (.*) chose the latter." ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) forgot to duck.  Ouch!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) is dead!  Long live (.*)!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) is feeding the worms!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) is pining for the fjords!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) is pushing up daisies!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) is still alive.  Not!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) isnt" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) just ate some dust!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) just became an ex-adventurer!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) just became living impaired!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) just became one with the ground.  Ohmmm..." ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) just bit the dust... but it bit harder!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) just bought the farm!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) just croaked!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) just died.  Typical." ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) just kicked the bucket!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) just met h(er|is) maker!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "(.*) sleeps with the fishes!" ] = "Elanthia / April Fool's" ;

		// Holiday - Halloween
		$this -> { 'location' } [ "Knocking on the wrong door, (.*) got a special treat!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "Leg bone connected to the knee bone.  Knee bone..  Oh wait, (.*) just died." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "Quit your moaning, (.*).  Being dead is fun!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "While trying to fly like a bat, (.*) meets the ground.  Messy." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "Will someone tell (.*) to stop pretending to be a ghost?" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) became dead.  Guess the trick went bad." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) does the zombie-shuffle." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) gets into the spirit of things.  Literally." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) gorged on too much candy and exploded." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) just became one of the recently deceased." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) just bit the dust.  Would someone give h(er|im) some treats?" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) just crawled into h(er|is) grave.  Weirdo." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) just drowned while bobbing for apples." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) just found h(er|im)self a six-foot deep hole." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) just tried turning into a pumpkin.  Must be midnight." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) lets out a scream that would make a banshee whine.  Earplugs, anyone?" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) looks like (s|)he just crawled out of a grave.  Get the shovel!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) looks like (s|)he saw a ghost!  Never mind, (s|)he is a ghost!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) makes an appointment for the Ebon Gate." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) tripped over a pumpkin and found a squash." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*) was just scared to death!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*), table for two\?  Er... never mind, make that table for one." ] = "Elanthia / Halloween" ;

		// Other
		$this -> { 'location' } [ "(.*) has been incinerated!" ] = "Unknown" ;
		$this -> { 'location' } [ "(.*) has been vaporized!" ] = "Unknown" ;
		$this -> { 'location' } [ "(.*) has just returned to Gosaena!" ] = "Unknown" ;
		$this -> { 'location' } [ "(.*) was just incinerated." ] = "Unknown" ;

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

<?php

class death
{

	public function __construct ( $socket , $dir )
	{
		// INFO - https://gswiki.play.net/Death%27s_Sting#Death_Messaging

		// Elmental Confluence
		$this -> { 'location' } [ "has gone to feed the fishes in the Elemental Confluence!" ] = "Elemental Confluence / River's Rest / Citadel" ;
		$this -> { 'location' } [ "is dust in the winds of the Elemental Confluence!" ] = "Elemental Confluence / Four Winds Isle" ;
		$this -> { 'location' } [ "is going home from the Elemental Confluence on .+h(er|is).+ shield!" ] = "Elemental Confluence / Ta'Vaalor" ;
		$this -> { 'location' } [ "is six hundred feet under the Elemental Confluence!" ] = "Elemental Confluence / Zul Logoth" ;
		$this -> { 'location' } [ "just bit the dust in the Elemental Confluence!" ] = "Elemental Confluence / Wehnimer's Landing" ;
		$this -> { 'location' } [ "just turned .+h(er|is).+ last page in the Elemental Confluence!" ] = "Elemental Confluence / Ta'Illistim / OTF" ;
		$this -> { 'location' } [ "just punched a one-way ticket to the Elemental Confluence!" ] = "Elemental Confluence / Teras Isle / Ruined Temple" ;
		$this -> { 'location' } [ "just took a long walk off of a short pier in the Elemental Confluence!" ] = "Elemental Confluence / Solhaven" ;
		$this -> { 'location' } [ "was just put on ice in the Elemental Confluence!" ] = "Elemental Confluence / Icemule Trace" ;
		$this -> { 'location' } [ "(.*) in the Elemental Confluence!" ] = "Elemental Confluence" ;

		// Towns
		$this -> { 'location' } [ "has gone to feed the fishes!" ] = "River's Rest / Citadel" ;
		$this -> { 'location' } [ "is dust in the wind!" ] = "Four Winds Isle" ;
		$this -> { 'location' } [ "is going home on .+h(er|is).+ shield!" ] = "Ta'Vaalor" ;
		$this -> { 'location' } [ "is six hundred feet under!" ] = "Zul Logoth" ;
		$this -> { 'location' } [ "just bit the dust!" ] = "Wehnimer's Landing" ;
		$this -> { 'location' } [ "just punched a one-way ticket!" ] = "Teras Isle / Ruined Temple" ;
		$this -> { 'location' } [ "just took a long walk off a short pier!" ] = "Solhaven" ;
		$this -> { 'location' } [ "just took a long walk off of a short pier!" ] = "Solhaven" ;
		$this -> { 'location' } [ "just turned .+h(er|is).+ last page!" ] = "Ta'Illistim / OTF" ;
		$this -> { 'location' } [ "was just put on ice!" ] = "Icemule Trace" ;

		// Quests / Events
		$this -> { 'location' } [ "The death cry of (.*) echoes in your mind!" ] = "The Rift" ;
		$this -> { 'location' } [ "failed to bring a shrubbery to the Night at the Academy!" ] = "Night at the Academy" ;
		$this -> { 'location' } [ "failed within the Bank at Bloodriven!" ] = "Duskruin Bank Heist" ;
		$this -> { 'location' } [ "flame just burnt out in the Sea of Fire!" ] = "Sanctum of Scales" ;
		$this -> { 'location' } [ "is now fish food for the fauna of Caligos Isle!" ] = "Ebon Gate Festival - Caligos Isle" ;
		$this -> { 'location' } [ "just became plant food!" ] = "Circle of Trees, A Midsummer Night's Festival" ;
		$this -> { 'location' } [ "just bit the dust... in Black Swan Castle!" ] = "Black Swan Castle" ;
		$this -> { 'location' } [ "just bit the dust... somewhere around Bloodriven Village!" ] = "Bloodriven Village" ;
		$this -> { 'location' } [ "was just defeated in Duskruin Arena!" ] = "Duskruin Arena" ;
		$this -> { 'location' } [ "just died on the Great Western Sea!" ] = "Troubled Waters" ;
		$this -> { 'location' } [ "just got squashed!" ] = "Cysaegir" ;	
		$this -> { 'location' } [ "just got trampled in the Talondown Arena!" ] = "Talondown Arena" ;
		$this -> { 'location' } [ "just gave up the ghost!" ] = "Castle Varunar / Trail to Solhaven / Trail to Icemule" ;
		$this -> { 'location' } [ "just lost .+h(er|is).+ way somewhere in the Settlement of Reim!" ] = "Reim" ;
		$this -> { 'location' } [ "just perished defending a fortress within Reim!" ] = "Reim Fortress Defense" ;
		$this -> { 'location' } [ "just perished underneath Bloodriven Village!" ] = "Duskruin Arena Sewers" ;
		$this -> { 'location' } [ "just perished within the Reim Base Camp!" ] = "Reim Base Camp" ;
		$this -> { 'location' } [ "shield!" ] = "Aradhul Road / Displaced Red Forest" ;
		$this -> { 'location' } [ "ancestors!" ] = "Ebon Gate Festival - Feywrot Mire" ;

		// Holiday - April Fool's
		$this -> { 'location' } [ "Alas, poor (.*).  I knew .+h(er|im).+, Horatio." ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "Hmm hmm hmm... yawn  Oh yeah, (.*) just died." ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "To be... or not to be...  Guess (.*) chose the latter." ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "forgot to duck.  Ouch!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "is dead!  Long live (.*)!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "is feeding the worms!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "is pining for the fjords!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "is pushing up daisies!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "is still alive.  Not!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "isnt" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "just ate some dust!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "just became an ex-adventurer!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "just became living impaired!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "just became one with the ground.  Ohmmm..." ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "just bit the dust... but it bit harder!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "just bought the farm!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "just croaked!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "just died.  Typical." ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "just kicked the bucket!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "maker!" ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ "sleeps with the fishes!" ] = "Elanthia / April Fool's" ;

		// Holiday - Halloween
		$this -> { 'location' } [ "A black cat just crossed (.*) path!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "A mournful wail fills the air.  Oh wait, it's just (.*) dying." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "Knocking on the wrong door, (.*) got a special treat!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "Leg bone connected to the knee bone.  Knee bone..  Oh wait, (.*) just died." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "Looks like (.*) won't be breaking any mirrors anytime soon." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "Quit your moaning, (.*).  Being dead is fun!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "While trying to fly like a bat, (.*) meets the ground.  Messy." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "Will someone tell (.*) to stop pretending to be a ghost?" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "became dead.  Guess the trick went bad." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "death cry sounds like (s|)he stepped on a cat." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "does the zombie-shuffle." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "gets into the spirit of things.  Literally." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "gorged on too much candy and exploded." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "just became one of the recently deceased." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "some treats?" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "grave.  Weirdo." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "just crawled out of a grave.  Get the shovel!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "just drowned while bobbing for apples." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "just found .+h(er|im)self.+ a six-foot deep hole." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "just tried turning into a pumpkin.  Must be midnight." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "lets out a scream that would make a banshee whine.  Earplugs, anyone?" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "looks like (s|)he just crawled out of a grave.  Get the shovel!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "looks like (s|)he saw a ghost!  Never mind, (s|)he is a ghost!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "makes an appointment for the Ebon Gate." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "takes the costume contest just a lil' too far." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "tripped over a pumpkin and found a squash." ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "was just scared to death!" ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ "(.*), table for two\?  Er... never mind, make that table for one." ] = "Elanthia / Halloween" ;

		// Other - Custom
		$this -> { 'location' } [ "has just returned to Gosaena!" ] = "Unknown / Custom" ;

		// Other
		$this -> { 'location' } [ "has been incinerated!" ] = "Unknown" ;
		$this -> { 'location' } [ "has been vaporized!" ] = "Unknown" ;
		$this -> { 'location' } [ "was just incinerated." ] = "Unknown" ;

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
		$local_buf = preg_replace ( "/is off to a rough start!  (She|He) /i" , "" , trim ( $buf ) ) ;

                $type = $gameArray [ 'local' ] [ 'type' ] ;

                $found = FALSE ;

		if ( $type == 'XML' )
		{

			if ( preg_match_all ( "/<pushStream id=\"death\"\/>(.*)/i" , $local_buf , $matches ) )
			{
				foreach ( $matches [ 1 ] as $matches2_no => $matches2_val )
				{
					if ( ! ( isset ( $output ) ) )
					{
						$output = '' ;
					}
					unset ( $character_name ) ;
					unset ( $location_name ) ;

					foreach ( $this -> { 'location' } as $death_message => $location )
					{
						if ( preg_match_all ( '/noun="(.*)">(.*)<\/a>.+' . $death_message . '/i' , $matches2_val , $matches3 ) )
						{
							$character_name = $matches3 [ 1 ] [ 0 ] ;
							$death_location = $location ;

							print __LINE__ . ": " . $character_name . ": " . $death_location . "\n" ;
							if ( ! ( isset ( $character_name ) ) )
							{
								$character_name = 'UNKNOWN' ;
							}
							if ( ! ( isset ( $death_location ) ) )
							{
								$death_location = 'UNKNOWN' ;
							}
							$output .= '[' . __CLASS__ . ' @ ' . date ( "Ymd-His" ) . ']: ' . $character_name . ' has died near ' . $death_location . "\n" ;
							file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $gameArray [ 'local' ] [ 'game_code' ] . ": " . $character_name . ": " . $death_location . ": " . $buf . "\n" , FILE_APPEND ) ;
							$found = TRUE ;
							break ;
						}
					}

				}
			}
		}
		elseif ( preg_match_all ( "/(\*)/" , $buf , $matches ) )
		{
			foreach ( $matches as $match_no => $match_no_array )
			{
				if ( $match_no )
				{
					foreach ( $match_no_array as $match2_no => $match2_value )
					{
						print __LINE__ . ": " . $match2_no . ": " . $match2_value . "\n" ;
					}
				}
			}
		}

		if ( preg_match_all ( "/(\*)/" , $buf , $matches ) )
		{
			if ( count ( $matches ) > 2 )
			{
				print "Check for multiple login/logout/death: " . $buf . "\n" ;
			}
		}

		if ( $found )
		{
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
		if ( isset ( $output ) )
		{
			$return [ 'output' ] = $output ;
		}
		$return [ 'buf' ] = $buf ;
		return ( $return ) ;
	}

}

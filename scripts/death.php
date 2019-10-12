<?php

class death
{

	public function __construct ( $socket , $dir )
	{
		// INFO - https://gswiki.play.net/Death%27s_Sting#Death_Messaging

		// Elmental Confluence
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> has gone to feed the fishes in the Elemental Confluence!' ] = "Elemental Confluence / River's Rest / Citadel" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is dust in the winds of the Elemental Confluence!' ] = "Elemental Confluence / Four Winds Isle" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is going home from the Elemental Confluence on <a exist=".*" noun=".*">.*<\/a> shield!' ] = "Elemental Confluence / Ta'Vaalor" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is six hundred feet under the Elemental Confluence!' ] = "Elemental Confluence / Zul Logoth" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just bit the dust in the Elemental Confluence!' ] = "Elemental Confluence / Wehnimer's Landing" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just turned <a exist=".*" noun=".*">.*<\/a> last page in the Elemental Confluence!' ] = "Elemental Confluence / Ta'Illistim / OTF" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just punched a one-way ticket to the Elemental Confluence!' ] = "Elemental Confluence / Teras Isle / Ruined Temple" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just took a long walk off of a short pier in the Elemental Confluence!' ] = "Elemental Confluence / Solhaven" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> was just put on ice in the Elemental Confluence!' ] = "Elemental Confluence / Icemule Trace" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> in the Elemental Confluence!' ] = "Elemental Confluence" ;

		// Towns
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> has gone to feed the fishes!' ] = "River's Rest / Citadel" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is dust in the wind!' ] = "Four Winds Isle" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is going home on <a exist=".*" noun=".*">.*<\/a> shield!' ] = "Ta'Vaalor" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is six hundred feet under!' ] = "Zul Logoth" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just bit the dust!' ] = "Wehnimer's Landing" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just punched a one-way ticket!' ] = "Teras Isle / Ruined Temple" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just took a long walk off of a short pier!' ] = "Solhaven" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just turned <a exist=".*" noun=".*">.*<\/a> last page!' ] = "Ta'Illistim / OTF" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> was just put on ice!' ] = "Icemule Trace" ;

		// Quests / Events
		$this -> { 'location' } [ 'The death cry of <a exist=".*" noun="(.*)">.*<\/a> echoes in your mind!' ] = "The Rift" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> failed to bring a shrubbery to the Night at the Academy!' ] = "Night at the Academy" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> failed within the Bank at Bloodriven!' ] = "Duskruin Bank Heist" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> flame just burnt out in the Sea of Fire!' ] = "Sanctum of Scales" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is now fish food for the fauna of Caligos Isle!' ] = "Ebon Gate Festival - Caligos Isle" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just became plant food!' ] = "Circle of Trees, A Midsummer Night's Festival" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just bit the dust... in Black Swan Castle!' ] = "Black Swan Castle" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just bit the dust... somewhere around Bloodriven Village!' ] = "Bloodriven Village" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> was just defeated in Duskruin Arena!' ] = "Duskruin Arena" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just died on the Great Western Sea!' ] = "Troubled Waters" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just got squashed!' ] = "Cysaegir" ;	
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just got trampled in the Talondown Arena!' ] = "Talondown Arena" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just gave up the ghost!' ] = "Castle Varunar / Trail to Solhaven / Trail to Icemule" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just lost <a exist=".*" noun=".*">.*<\/a> way somewhere in the Settlement of Reim!' ] = "Reim" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just perished defending a fortress within Reim!' ] = "Reim Fortress Defense" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just perished underneath Bloodriven Village!' ] = "Duskruin Arena Sewers" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just perished within the Reim Base Camp!' ] = "Reim Base Camp" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> may just be going home on <a exist=".*" noun=".*">.*<\/a> shield!' ] = "Aradhul Road / Displaced Red Forest" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> was just reunited with <a exist=".*" noun=".*">.*<\/a> ancestors!' ] = "Ebon Gate Festival - Feywrot Mire" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> was just defeated in the Arena of the Abyss!' ] = "Arena of the Abyss" ;

		// Holiday - April Fool's
		$this -> { 'location' } [ 'Alas, poor <a exist=".*" noun="(.*)">.*<\/a>.  I knew <a exist=".*" noun=".*">him<\/a>, Horatio.' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ 'Hmm hmm hmm... \*yawn\*  Oh yeah, <a exist=".*" noun="(.*)">.*<\/a> just died.' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ 'To be... or not to be...  Guess <a exist=".*" noun="(.*)">.*<\/a> chose the latter.' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> forgot to duck.  Ouch!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is dead!  Long live <a exist=".*" noun=".*">.*<\/a>!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is feeding the worms!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is pining for the fjords' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is pushing up daisies!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> is still alive.  Not!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just ate some dust!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just became an ex-adventurer!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just became living impaired!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just became one with the ground.  Ohmmm...' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just bit the dust... but it bit harder!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just bought the farm!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just croaked!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just died.  Typical.' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just kicked the bucket!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just met <a exist=".*" noun=".*">.*<\/a> maker!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> sleeps with the fishes!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> isn\'t dead, <a exist=".*" noun=".*">.*<\/a>\'s resting!' ] = "Elanthia / April Fool's" ;
		$this -> { 'location' } [ 'DING DONG Ol\' <a exist=".*" noun="(.*)">.*<\/a> is dead!  La la la la la!' ] = "Elanthia / April Fool's" ;

		// Holiday - Halloween
		$this -> { 'location' } [ 'A black cat just crossed <a exist=".*" noun="(.*)">.*<\/a> path!' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ 'A mournful wail fills the air.  Oh wait, it\'s just <a exist=".*" noun="(.*)">.*<\/a> dying.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ 'Knocking on the wrong door, <a exist=".*" noun="(.*)">.*<\/a> got a special treat!' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ 'Leg bone connected to the knee bone.  Knee bone..  Oh wait, <a exist=".*" noun="(.*)">.*<\/a> just died.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ 'Looks like <a exist=".*" noun="(.*)">.*<\/a> won\'t be breaking any mirrors anytime soon.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ 'Quit your moaning, <a exist=".*" noun="(.*)">.*<\/a>.  Being dead is fun!' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ 'While trying to fly like a bat, <a exist=".*" noun="(.*)">.*<\/a> meets the ground.  Messy.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ 'Will someone tell <a exist=".*" noun="(.*)">.*<\/a> to stop pretending to be a ghost?' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> became dead.  Guess the trick went bad.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> death cry sounds like <a exist=".*" noun=".*">.*<\/a> stepped on a cat.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> does the zombie-shuffle.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> gets into the spirit of things.  Literally.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> gorged on too much candy and exploded.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just became one of the recently deceased.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just bit the dust.  Would someone give <a exist=".*" noun=".*">.*<\/a> some treats?' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just crawled into <a exist=".*" noun=".*">.*<\/a> grave.  Weirdo.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just drowned while bobbing for apples.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just found <a exist=".*" noun=".*">.*<\/a> a six-foot deep hole.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> just tried turning into a pumpkin.  Must be midnight.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> lets out a scream that would make a banshee whine.  Earplugs, anyone?' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> looks like <a exist=".*" noun=".*">.*<\/a> just crawled out of a grave.  Get the shovel!' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> looks like <a exist=".*" noun=".*">.*<\/a> saw a ghost!  Never mind, <a exist=".*" noun=".*">.*<\/a> is a ghost!' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> makes an appointment for the Ebon Gate.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> takes the costume contest just a lil\' too far.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> tripped over a pumpkin and found a squash.' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> was just scared to death!' ] = "Elanthia / Halloween" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a>, table for two\?  Er... never mind, make that table for one.' ] = "Elanthia / Halloween" ;

		// Other - Custom
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> has just returned to Gosaena!' ] = "Unknown / Custom" ;

		// Other
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> has been incinerated!' ] = "Unknown" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> has been vaporized!' ] = "Unknown" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> was just incinerated!' ] = "Unknown" ;
		$this -> { 'location' } [ '<a exist=".*" noun="(.*)">.*<\/a> was just vaporized!' ] = "Unknown" ;

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

			$death_xml = "<pushStream id=\"death\"\/> * " ;

			$death_list = preg_split ( "/" . $death_xml . "/i" , $local_buf ) ;
			if ( count ( $death_list ) < 2 )
			{
				return ( TRUE ) ;
			}

			foreach ( $death_list as $death_no => $death_text )
			{
				if ( empty ( $death_text ) )
				{
					continue ;
				}
				if ( ! ( isset ( $output ) ) )
				{
					$output = '' ;
				}
				unset ( $character_name ) ;
				unset ( $location_name ) ;
				foreach ( $this -> { 'location' } as $death_message => $location )
				{
					if ( preg_match_all ( '/' . $death_message . '/i' , $death_text , $matches3 ) )
					{
						$character_name = $matches3 [ 1 ] [ 0 ] ;
						$death_location = $location ;
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
				print '[' . __CLASS__ . ' @ ' . date ( "Ymd-His" ) . ']: ' . $character_name . ' has died near ' . $death_location . "\n" ;
				$output .= '[' . __CLASS__ . ' @ ' . date ( "Ymd-His" ) . ']: ' . $character_name . ' has died near ' . $death_location . "\n" ;
				file_put_contents ( $this -> { 'log' } , date ( "Ymd-His" ) . ": " . $gameArray [ 'local' ] [ 'game_code' ] . ": " . $character_name . ": " . $death_location . ": " . $buf . "\n" , FILE_APPEND ) ;
				$found = TRUE ;
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

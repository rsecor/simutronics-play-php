#!/usr/bin/env php
<?php

/*
   Started By: Richard A Secor <rsecor@rsecor.com>
   Started On: (around) 2018-07-01
   Current Version: 0.0.356

   Description: This script is to enable a basic connection to various text-based games from Simutronics.

   $game_code can be set in advance to ignore the prompt to choose a game.
   $char_code can be set in advance to ignore the prompt to choose a character.

 */

set_error_handler ( 'play_error_handler' ) ;
set_exception_handler ( 'play_exception_handler' ) ;

$dir [ 'base' ] = __DIR__ . "/" ;
$dir [ 'logs' ] = $dir [ 'base' ] . "logs/" ;
$dir [ 'scripts' ] = $dir [ 'base' ] . "scripts/" ;

// $username = '' ;
// $password = '' ;
// $game_code = '' ;
// $character_code = '' ;

if ( ! ( isset ( $username ) ) )
{
	$username = '' ;
}

if ( ! ( isset ( $password ) ) )
{
	$password = '' ;
}

if ( ! ( isset ( $game_code ) ) )
{
	$game_code = '' ;
}

if ( ! ( isset ( $character_code ) ) )
{
	$character_code = '' ;
}

// Clear screen -- where available on platform
print chr ( 27 ) . chr ( 91 ) . 'H' . chr ( 27 ) . chr ( 91 ) . 'J' ;

$play = 'tcp://eaccess.play.net:7900' ;

$hashpass = '' ;
if ( $fp = stream_socket_client ( $play , $errno , $errstr , 30 ) )
{
	if ( isset ( $fp ) )
	{
		fwrite ( $fp , "K\n" ) ;
		$hashkey = fread ( $fp , 1024 ) ;
		while ( empty ( $username ) )
		{
			if ( ! ( $username = trim ( readline ( "Username: " ) ) ) )
			{
				print "You have chosen to stop this script.\n" ;
				fclose ( $fp ) ;
				exit ;
			}
		}
		while ( empty ( $password ) )
		{
			if ( ! ( $password = readline ( "Password: " ) ) )
			{
				// Clear screen -- where available on platform
				print chr ( 27 ) . chr ( 91 ) . 'H' . chr ( 27 ) . chr ( 91 ) . 'J' ;
				print "You have chosen to stop this script.\n" ;
				fclose ( $fp ) ;
				exit ;
			}
			// Clear screen -- where available on platform
			print chr ( 27 ) . chr ( 91 ) . 'H' . chr ( 27 ) . chr ( 91 ) . 'J' ;
		}
		for ( $i = 0 ; $i < ( strlen ( $password ) ) ; $i ++ )
		{
			$ordhk = ord ( $hashkey [ $i ] ) ;
			$ordpw = ord ( $password [ $i ] ) ;
			$hashpass .= chr ( ( ( $ordpw - 32 ) ^ $ordhk ) + 32 ) ;
		}
		unset ( $password ) ;
		fwrite ( $fp , "A\t" . $username . "\t" . $hashpass . "\n" ) ;
		$loginkey = preg_split ( "/\t/" , fread ( $fp , 1024 ) ) ;
		if ( isset ( $loginkey [ 2 ] ) )
		{
			if ( trim ( $loginkey [ 2 ] ) == 'PASSWORD' )
			{
				print "Bad Password\n" ;
				fclose ( $fp ) ;
				exit ;
			}
		}
		else
		{
			print "Bad Password\n" ;
			fclose ( $fp ) ;
			exit ;
		}
	}
}
else
{
	print __FILE__ . ": " . __LINE__ . ": errno: " . $errno . "\n" ;
	print __FILE__ . ": " . __LINE__ . ": errstr: " . $errstr . "\n" ;
	exit ;
}

if ( empty ( $loginkey ) )
{
	print "FATAL ERROR: How did we get here?\n" ;
}
else
{
	unset ( $loginkey ) ;
	$hashpass = '' ;
	fwrite ( $fp , "M\n" ) ;
	$games = preg_split ( "/\t/ " , fread ( $fp , 1024 ) ) ;
	$game_no = 0 ;
	foreach ( $games as $games_no => $game_info )
	{
		if ( $games_no )
		{
			if ( ! ( $games_no % 2 ) )
			{
				$game_no ++ ;
				$game_list [ $game_no ] [ 'code' ] = $games [ $games_no - 1 ] ;
				$game_list [ $game_no ] [ 'name' ] = $games [ $games_no ] ;
			}
		}
	}
	if ( ! ( isset ( $game_list ) ) )
	{
		print "No games found.\n" ;
		exit ;
	}
	foreach ( $game_list as $game_no => $game_info )
	{
		print $game_no . ": " . $game_info [ 'name' ] . "\n" ;
	}
	while ( empty ( $game_code ) )
	{
		if ( ! ( $game_no = trim ( readline ( "Enter Game #: " ) ) ) )
		{
			print "You have chosen to stop this script.\n" ;
			exit ;
		}
		if ( isset ( $game_list [ $game_no ] ) )
		{
			if ( isset ( $game_list [ $game_no ] [ 'code' ] ) )
			{
				$game_code = $game_list [ $game_no ] [ 'code' ] ;
				$game_name = $game_list [ $game_no ] [ 'name' ] ;
			}
		}
	}
	// print "Entering " . $game_name . "\n" ;
	fwrite ( $fp , "G\t" . $game_code . "\n" ) ;
	$stub = preg_split ( "/\t/ " , fread ( $fp , 1024 ) ) ;
	// print "stub: " . print_r ( $stub , TRUE ) . "\n" ;
	fwrite ( $fp , "P\t" . $game_code . "\n" ) ;
	$stub = preg_split ( "/\t/ " , fread ( $fp , 1024 ) ) ;
	// print "stub: " . print_r ( $stub , TRUE ) . "\n" ;
	fwrite ( $fp , "C\n" ) ;
	$characters = preg_split ( "/\t/ " , fread ( $fp , 1024 ) ) ;
	$character_no = 0 ;

	foreach ( $characters as $characters_no => $character_info )
	{
		if ( $characters_no > 4 )
		{
			if ( ! ( $characters_no % 2 ) )
			{
				$character_no ++ ;
				$character_list [ $character_no ] [ 'code' ] = $characters [ $characters_no - 1 ] ;
				$character_list [ $character_no ] [ 'name' ] = $characters [ $characters_no ] ;
			}
		}
	}
	if ( ! ( isset ( $character_list ) ) )
	{
		print "No characters found for " . $game_name . "\n" ;
		exit ;
	}
	foreach ( $character_list as $character_no => $character_info )
	{
		print $character_no . ": " . $character_info [ 'name' ] . "\n" ;
	}
	while ( empty ( $character_code ) )
	{
		if ( ! ( $charactere_no = trim ( readline ( "Enter Character #: " ) ) ) )
		{
			print "You have chosen to stop this script.\n" ;
			exit ;
		}
		if ( isset ( $character_list [ $character_no ] ) )
		{
			if ( isset ( $character_list [ $character_no ] [ 'code' ] ) )
			{
				$character_code = $character_list [ $character_no ] [ 'code' ] ;
				$character_name = $character_list [ $character_no ] [ 'name' ] ;
			}
		}
	}
	print "Entering " . $game_name . " as " . $character_name . "\n" ;
	fwrite ( $fp , "L\t" . $character_code . "\tSTORM\n" ) ;
	$launch = preg_split ( "/\t/ " , fread ( $fp , 1024 ) ) ;
	// print "launch: " . print_r ( $launch , TRUE ) . "\n" ;
	if ( $launch [ 0 ] == 'L' )
	{
		if ( isset ( $launch [ 1 ] ) )
		{
			if ( $launch [ 1 ] == 'PROBLEM' )
			{
				print "Subscription Failure...\n" ;
				fclose ( $fp ) ;
				exit ;
			}
		}	
	}
	else
	{
		print "Login Failure...\n" ;
		fclose ( $fp ) ;
		exit ;
	}
	$sal_file = '' ;
	for ( $line_no = 2 ; $line_no < count ( $launch ) ; $line_no ++ )
	{
		if ( preg_match ( "/^FULLGAMENAME=/" , $launch [ $line_no ] ) )
		{
			// $launch [ $line_no ] = "FULLGAMENAME=Wizard Front End" ;
		}
		elseif ( preg_match ( "/^GAME=/" , $launch [ $line_no ] ) )
		{
			// $launch [ $line_no ] = "GAME=WIZ" ;
		}
		elseif ( preg_match ( "/^GAMEFILE=/" , $launch [ $line_no ] ) )
		{
			// $launch [ $line_no ] = "GAMEFILE=WIZARD.EXE" ;
			//$launch [ $line_no ] = "GAMEFILE=/Applications/Avalon4.3.5.app/Contents/MacOS/Avalon" ;
		}
		elseif ( preg_match ( "/^GAMEHOST=/" , $launch [ $line_no ] ) )
		{
			// $launch [ $line_no ] = "GAMEHOST=chimera.simutronics.com" ;
			$line_split = preg_split ( "/=/" , $launch [ $line_no ] ) ;
			$game [ 'host' ] = $line_split [ 1 ] ;
		}
		elseif ( preg_match ( "/^GAMEPORT=/" , $launch [ $line_no ] ) )
		{
			// $launch [ $line_no ] = "GAMEPORT=10024" ;
			$line_split = preg_split ( "/=/" , $launch [ $line_no ] ) ;
			$game [ 'port' ] = $line_split [ 1 ] ;
		}
		elseif ( preg_match ( "/^KEY=/" , $launch [ $line_no ] ) )
		{
			$line_split = preg_split ( "/=/" , $launch [ $line_no ] ) ;
			$game [ 'key' ] = $line_split [ 1 ] ;
		}
		$sal_file .= $launch [ $line_no ] . "\n" ;
	}
	// print $sal_file ;
	// file_put_contents ( "./" . $game_code . "." . $char_code . ".sal" , $sal_file ) ;
	fclose ( $fp ) ;
}

if ( ! ( isset ( $game [ 'host' ] ) ) )
{
	print __FILE__ . ": " . __LINE__ . ": Missing game host\n" ;
	exit ;
}

if ( ! ( isset ( $game [ 'port' ] ) ) )
{
	print __FILE__ . ": " . __LINE__ . ": Missing game port\n" ;
	exit ;
}


$socket = socket_create ( AF_INET , SOCK_STREAM , SOL_TCP ) ;
if ( $socket === FALSE )
{
	print "socket_create failure\n" ;
	exit ;
}

$play = 'tcp://' . $game [ 'host' ] . ':' . $game [ 'port' ] ;
print "Connecting to " . $play . "\n" ;
$result = socket_connect ( $socket , $game [ 'host' ] , $game [ 'port' ] ) ;
if ( $result === FALSE )
{
	print "socket_connect failure\n" ;
	exit ;
}

print "Connected...\n" ;
socket_write ( $socket , $game [ 'key' ] , ( strlen ( $game [ 'key' ] ) ) )  ;
$buf = socket_read ( $socket , 2048 ) ;
print "================================================================================\n" ;
print $buf . "\n" ;

$client_announce = "/FE:WIZARD /VERSION:1.0.1.22 /P:i386-mingw32 /XML\n" ;
socket_write ( $socket , $client_announce , strlen ( $client_announce ) ) ;
$buf = socket_read ( $socket , 2048 ) ;
print "================================================================================\n" ;
print $buf . "\n" ;

$wait = "<c>\r\n" ;
socket_write ( $socket , $wait , strlen ( $wait ) ) ;
sleep ( 1 ) ;
socket_write ( $socket , $wait , strlen ( $wait ) ) ;

socket_set_nonblock ( $socket ) ;
stream_set_blocking ( STDIN , 0 ) ;

$gameArray = array ( ) ;

while ( TRUE )
{
	$input_stream = fgetcsv ( STDIN ) ;
	if ( is_array ( $input_stream ) )
	{
		print "--------------------------------------------------------------------------------\n" ;
		if ( preg_match ( "/^;/" , $input_stream [ 0 ] ) )
		{
			$input_split = preg_split ( "/\ /" , $input_stream [ 0 ] ) ;
			if ( strtoupper ( $input_split [ 0 ] ) == 'SHOW' )
			{
				if ( strtoupper ( $input_split [ 1 ] ) == 'RUNNING' )
				{
					print "Scripts Running: " . print_r ( $class_list , TRUE ) ;
				}
			}
			else
			{
				print "RUNNING SCRIPT: '" . $input_stream [ 0 ] . "'\n"  ;
				$script_name = preg_split ( "/\ / " , preg_replace ( "/^;/" , "" , $input_stream [ 0 ] ) ) ;
				if ( isset ( $script_name [ 0 ] ) )
				{
					if ( ! ( empty ( $script_name [ 0 ] ) ) )
					{
						$script = $dir [ 'scripts' ] . $script_name [ 0 ] . ".php" ;
						if ( ! ( file_exists ( $script ) ) )
						{
							print "SCRIPT NOT AVAILABLE: " . $script . "\n" ;
						}
						elseif ( ! ( include_once ( $script ) ) )
						{
							print "SCRIPT NOT INCLUDED: " . $script . "\n" ;
						}
						else
						{
							if ( isset ( $class_list [ $script_name [ 0 ] ] ) )
							{
									print "SCRIPT ALREADY RUNNING: " . $script . "\n" ;
							}
							else
							{
								if ( ! ( $class_list [ $script_name [ 0 ] ] = new $script_name [ 0 ] ( $dir ) ) )
								{
									print "SCRIPT NOT INITIALIZED: " . $script . "\n" ;
									unset ( $class_list [ $script_name [ 0 ] ] ) ;
								}
							}
						}
					}
				}
			}
		}
		else
		{
			print "COMMAND: '" . $input_stream [ 0 ] . "'\n"  ;
			$input = "<c>" . $input_stream [ 0 ] . "\r\n" ;
			if ( isset ( $class_list ) )
			{
				foreach ( $class_list as $class => $class_info )
				{
					if ( class_exists ( $class ) )
					{
						if ( is_callable ( array ( $class , 'socket_write' ) ) )
						{
							$buf = $class_list [ $class ] -> socket_write ( $input ) ;
						}
					}
				}
			}
			if ( socket_write ( $socket , $input , strlen ( $input ) ) )
			{
				$input_history [ ] = $input ;
			}
			switch ( strtoupper ( $input_stream [ 0 ] ) )
			{
				case 'EXIT' :
					break 2 ;
					break ;
				default :
			}
		}
	}
	if ( $buf = socket_read ( $socket , 9999999 ) )
	{
		print "================================================================================\n" ;
		if ( isset ( $class_list ) )
		{
			foreach ( $class_list as $class => $class_info )
			{
				if ( class_exists ( $class ) )
				{
					if ( is_callable ( array ( $class , 'socket_read' ) ) )
					{
						$class_return = $class_list [ $class ] -> socket_read ( $gameArray , $buf ) ;
						$gameArray = $class_return [ 'gameArray' ] ;
						$buf = $class_return [ 'buf' ] ;
					}
				}
			}
		}
		print $buf . "\n" ;
	}
}

socket_close ( $socket ) ;

exit ;

function play_error_handler ( $error_no , $error_string , $error_file , $error_line )
{
	print "ERROR: " . $error_no . ": " . $error_string . "\n" ;
	return ( TRUE ) ;
}

function play_exception_handler ( $exception )
{
	print "ERROR: " . $exception -> getMessage ( ) ;
	return ( TRUE ) ;
}


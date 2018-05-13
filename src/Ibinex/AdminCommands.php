<?php
namespace Bot\Ibinex;
use Bot\Ibinex\Game;
use Bot\Ibinex\User;


class AdminCommands {

	private $accessLevel="user";
   


	public static function startgame(string $uid) {
		
		$game = new Game($uid);

		if(!$game->create()) {
			
			return "Cannot start a new session. A game is currently ongoing. Type `@Ibinex Bot cancelgame` to cancel.";

		} else {
			
			return "<!everyone>, New CodingGame session started by <@". $uid . ">. Registration is open for 10mins. type `@Ibinex Bot register CODING_GAME_USERNAME TEAM_NUMBER` to join. Example: `@Ibinex Bot register AnsellC 1`";

		}
	}
	

	public static function cancelgame(string $uid) {
		
		$game = new Game($uid);
	
		if(!$game->cancel()) {
			
			return "There is no on-going CodingGame session.";

		} else { 

			return "<!everyone>, CodingGame session cancelled by <@". $uid . ">.";

		}
	}
	
	public static function testclash($uid) {

		$game = new Game($uid);
		$clash = $game->testclash();


		if(!$clash) 
			return "*Error*: Cannot start a test clash.";

		else 
			
			return "*Private clash generated!* https://www.codingame.com/clashofcode/clash/". $clash['success']['publicHandle'];

		

		

	}


	public static function listplayers($uid) {

		$game = new Game($uid);

		if(!$game->isOngoing())
			return "There are no on-going CodingGame sessions.";


		$result = $game->players();
	
		if(empty($result))
			return "There are no players in the game right now.";


		else
			return "there are *". count($result) ."* players in the game: ".implode(", ", $result);
	}


}




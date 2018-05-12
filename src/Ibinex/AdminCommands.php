<?php
namespace Bot\Ibinex;
use Bot\Ibinex\Game;
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


}




<?php
namespace Bot\Ibinex;
use Bot\Ibinex\Game;
class AdminCommands {

	private $accessLevel="user";



	public static function startgame($uid) {
		
		$game = new Game($uid);
		var_dump($game);
		var_dump($game->create());
		var_dump($game);
		if(!$game->create()) {

			return "Cannot start a new session. A game is currently ongoing. Type `@Ibinex Bot cancelgame` to cancel.";

		} else { 

			return "<!everyone>, New CodingGame session started by <@". $game->uid . ">. Registration is open for 10mins. type `@Ibinex Bot register` to join.";

		}
	}
	

	public static function cancelgame($uid) {
		
		$game = new Game($uid);

		if(!$game->cancel()) {

			return "There is no on-going CodingGame session.";

		} else { 

			return "<!everyone>,CodingGame session cancelled by <@". $game->uid . ">.";

		}
	}
	



}




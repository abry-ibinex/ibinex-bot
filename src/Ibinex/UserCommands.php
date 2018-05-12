<?php
namespace Bot\Ibinex;
use Bot\Ibinex\Game;

class UserCommands {

	private $accessLevel="user";
   


	public static function register(string $handle, int $team, string $uid) {
		
		$game = new Game($uid);
		if(!$game->isOngoing()) {

			return "There are no CodingGame sessions right now.";

		}
		elseif($game->register($handle, $team)) {

			$result = $game->players();
			
			return '<@'. $uid . "> joined the game! (there are *". count($result) ."* players in the game: ".implode(", ", $result).")";

		}
	}




	public static function unregister($uid) {
		
		$game = new Game($uid);

		if(!$game->isOngoing()) {

			return "There are no CodingGame sessions right now.";

		}
		elseif($game->unregister()) {
			
			return '<@'. $uid . "> is fucking scared and left the game.";

		}
	}

}




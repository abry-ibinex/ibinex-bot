<?php
namespace Bot\Ibinex;
use Bot\Ibinex\Game;
use Bot\Ibinex\User;

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
    
    public static function status($uid){
        
        
        $user = new User($uid);
        $game = new Game($uid);
        

		if(!$game->isOngoing())
			return "There are no on-going CodingGame sessions.";
        
        
        $statusMessage = "<@". $uid . ">";
        
        $isJoined= $user->isJoined();

        if ($isJoined){
            
            $statusMessage .= " has joined the game";
            
            $clashOfCodeHandler = $user->$getHandler();
            
            $statusMessage .= " with *" . $clashOfCodeHandler . "* clash of code name."
            
        } else {
            $statusMessage.= " has *not* registered in any clash of code games."
        }
        
        return $statusMessage;
        
    }

}




<?php
namespace Bot\Ibinex;
use Bot\Ibinex\Game;
use Bot\Ibinex\User;
use Khill\Duration\Duration;

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


	public static function sysinfo($uid) {

		global $UPTIME;
		global $BOT_VERSION;
		$duration = new DUration(time() - $UPTIME);

	    exec('git describe --always',$version_mini_hash);
	    exec('git rev-list HEAD | wc -l',$version_number);
	    exec('git log -1',$line);
	    $version = "v".$BOT_VERSION.".".trim($version_number[0]).".".$version_mini_hash[0];
	    


		$msg = "*Bot Uptime:* ".$duration->humanize(). "\n";
		$msg .= "*Up Since:* <!date^". $UPTIME ."^{date_long} {time_secs}|". date("F j, Y g:i:s a") .">\n";
		$msg .= "*Server Info*: ".php_uname()."\n";
		$msg .= "*Git Revision:* ".$version;


		return $msg;

	}


	public static function shufflegame($uid) {

		$game = new Game($uid);
		$players = $game->shufflegame();

		if(!$players)
				return "Cannot shuffle players. (Not enough players or no games started).";

		

		//generate rooms
		//players

		$msg = "";
		$r = 1;
		foreach($players AS $player) {
			$room = $game->testclash();

			$msg  .= "*Room #". $r ."*\n";
			$msg .= "```";
			$msg .= "Room: https://www.codingame.com/clashofcode/clash/". $room['success']['publicHandle']."\n\n";
			foreach($player AS $handle => $slack_uid) {
			
				$msg .= $slack_uid . " - ". $handle ."\n";
			}

			$msg .= "```\n\n";
			$r++;

		}


		return $msg;


	}

}




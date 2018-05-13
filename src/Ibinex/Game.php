<?php
namespace Bot\Ibinex;
use MongoDB\Client AS MongoDB;
use Bot\Ibinex\User;

class Game {

	private $database		= "test";
	public $game_id			= null;
	private $contestants 	= [];
	protected $ongoing 		= false;
	private $timestamp;
	private $uid;
	public $playercount;

	public function __construct($uid = null) {
		
		$this->uid = $uid;

	}
	

	
	public function create() {

		$collection = (new MongoDB)->{$this->database}->game;


		//Check if a game is open (started=true)
		if(!$collection->findOne(['started' => true])) {

			$result = $collection->insertOne([

			    'started' 	=> true,
			    'by' 		=> $this->uid,
			    'timestamp' => ($started=time())


			]);

			$this->game_id = $result->getInsertedId();
			$this->ongoing = true;
			$this->timestamp=$started;
			
			return true;

		}


		return false;





	}


	public function isOngoing() {

		$collection = (new MongoDB)->{$this->database}->game;


		//Check if a game is open (started=true)
		if(!$collection->findOne(['started' => true])) 

			return false;

		return true; 
		

	}


	public function cancel() {

		$collection = (new MongoDB)->{$this->database}->game;
		
		$result = $collection->deleteOne(['started' => true]);
		
		if($result->getDeletedCount() > 0) {
			

			//remove all players who joined

			$user = new User($this->uid);
			$user->resetjoined();
			return true;

		
		}

		return false;

	}	




	public function register(string $handle, int $team) {
		

		$user = new User($this->uid, $handle, $team);
		
		if(!$user->find()) {
			
			if(!$user->add())
				return false;

		} else {
			
			if(!$user->join())
				return false;
		}
		
		return true;


	}


	public function unregister() {

		$user = new User($this->uid);

		if(!$user->unjoin())
			return false;

		return true;

	}


	public function players() {

		$p = [];
		$collection = (new MongoDB)->{$this->database}->user;

		$players = $collection->find(['joined' => true]);

		foreach($players AS $player)
			$p[] = '<@' . $player['uid'] .'>';

		return $p;


	}


	public function shufflegame() {

		/* Import global variables */
		global $MIN_PLAYERS;
		global $MAX_PLAYERS_PER_ROOM;
		global $TOTAL_TEAMS;

		$collection = (new MongoDB)->{$this->database}->user; // Fetches collection data from the user table

		$total_players = 0; // Initiates the total number of players registered.

		$team_players = []; // Initiates the array to hold all players per team.

		for ($i=0;$i<$TOTAL_TEAMS;$i++){

			$team_players[$i] = iterator_to_array($collection->find([
				'joined' => true,	// If the player has joined the game.
				'team'	=> ($i+1)	// If the player is a member of the current team.
			]));

			$total_players += count(($team_players[$i])); 
			// Counts the number of result of the current team and adds it to the total number of players.
		}

		$team_players = array_filter($team_players); // Removes all empty elements
		$total_teams_joined = count($team_players);

		if(
			$total_players < $MIN_PLAYERS ||	// Total registered players does not meet the minimum players required
			!$this->isOngoing()	// No ongoing games
		)
			return false;


		// Computes the total rooms to allocate the amount of registered players based on the max players per room.
		$total_rooms = ceil($total_players/$MAX_PLAYERS_PER_ROOM);

		// Computes how many players per room evenly depending on how much players have registered and how much rooms to take.
		$total_players_per_room = ceil($total_players/$total_rooms);


		$current_team_index = 0; // Starts from the first team.

		$players = []; // Array handler of all the players.

		// Runs while there is still a player unassigned from the teams
		while ($total_players>0){

			// If team index goes over the total number of teams, sets it back to 0
			if ($current_team_index==$TOTAL_TEAMS)
				$current_team_index = 0;

			// If the current team still has a player unassigned
			if (isset($team_players[$current_team_index]))
			{
				// Shuffles the players inside the team to give a random distribution to rooms.
				shuffle($team_players[$current_team_index]);

				// Assigns a random player from a team
				$players[] = array_pop($team_players[$current_team_index]);

				// Total players left to be assigned has been decreased by 1.
				$total_players--;
			}

			// Goes to the next team to check for unassigned players.
			// This gives the shuffle an even distribution of team players to rooms.
			$current_team_index++;
		}

		// Splits players evenly to rooms
		return array_chunk($players, $total_players_per_room, true);

	}



	public function testclash() {

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://www.codingame.com/services/ClashOfCodeRemoteService/createPrivateClash");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "[2605280,{\"SHORT\":true}]");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

		$headers = array();
		$headers[] = "Origin: https://www.codingame.com";
		$headers[] = "Accept-Encoding: gzip, deflate, br";
		$headers[] = "Accept-Language: en-PH,en;q=0.9,fil-PH;q=0.8,fil;q=0.7,en-US;q=0.6";
		$headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.170 Mobile Safari/537.36";
		$headers[] = "Content-Type: application/json;charset=UTF-8";
		$headers[] = "Accept: application/json, text/plain, */*";
		$headers[] = "Referer: https://www.codingame.com/multiplayer/clashofcode";
		$headers[] = "Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F59F73419623A44E177941787F58BDA0E675E43E34204B81EE768BE3C09239272971C9CEFC4B3A7E0DAE61A3D151D73B1D; remcg=NTBwphIyPtf/pmbMrAGpNN/6PjhvDdEeim+1cxsvY8zDY2rIi0LJIwiPr3wBhPB6l2AH5NxwhnSAXlnR+Qu2kcfbNnberXdSk94jgowyVAMI39juo625l+86CaUDe47jp/GzCj3vK+lzzs2HaMAN3NOqjP3f0gkzv/9Cnvq2u9WDH+S1/KYatNhXzfI/BSg3Qoj+UM/wwd5/K259XADSCpqenO1jekZkUa/hbIxyZy/8svmsQvk+a5cnnli0peRcrISiITpe+i4XEr8LNBCZxUNIUNXfGs6G7xsFdKwTXWjRfQYIzy2eQfRjHNKMZeJAMnbq7Rt0lPvcQ3eVI5PZMaY3X96rTLomSMYfQmjvEAqhjW60+lynmU2Vsw95Y1Khb15QzvxQtFeVpu4G8zkX9GVyzx4ZG4AHDMYIuqRfKcmvid5FZGqkQEwhetwsa5YtArW+iW9cBBdSTZm+XJ38ZU7F3NIkOJcFhEL7dxcOhwcDizNRcHEHXPWgeDM5WHBxUA/MFdBCcmS9NNepYMV4vRPTbs90GBlmuMOt//zUltBZESqbbz+BqU1KWrHwIO7r2nCVvM3fxhpMnwigrmPcug==; JSESSIONID=2F241139554797EFFCE05C28CC6F78C0; _gid=GA1.1.1989885660.1525959261; _gat=1";
		$headers[] = "Connection: keep-alive";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) 
		    return false;

		$data = json_decode($result, true);

		
		curl_close ($ch);

		return $data;

	}

}




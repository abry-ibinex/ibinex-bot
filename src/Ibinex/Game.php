<?php
namespace Bot\Ibinex;
use MongoDB\Client AS MongoDB;
use Bot\Ibinex\User;
use Bot\Ibinex\BotAccounts;


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
			if (isset($team_players[$current_team_index]) && count($team_players[$current_team_index])>0)
			{
				// Shuffles the players inside the team to give a random distribution to rooms.
				shuffle($team_players[$current_team_index]);

				// Assigns a random player from a team
				$players[] = array_shift($team_players[$current_team_index]);

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



	public function generateclash(int $room_count = 1) {


		$bots = new BotAccounts;
		$urls = $bots->deploy($room_count);
		$collection = (new MongoDB)->{$this->database}->clash;
		foreach($urls AS $url) {
			$collection->insertOne([
				'url'	=> $url,
				'timestamp'	=> time(),
				'finished'	=> false

			]);
		
		}


		return $urls;

	}

}




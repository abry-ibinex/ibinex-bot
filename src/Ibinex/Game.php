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



}




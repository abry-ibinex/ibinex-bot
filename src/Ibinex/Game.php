<?php
namespace Bot\Ibinex;
use MongoDB\Client AS MongoDB;

class Game {

	private $database		= "test";
	public $game_id			= null;
	private $contestants 	= [];
	protected $ongoing 		= false;
	private $timestamp;
	private $uid;

	public function __construct($uid) {
		
		$this->uid = $uid;

	}
	

	
	public function create(): boolean {

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




	public function cancel(): boolean {

		$collection = (new MongoDB)->{$this->database}->game;
		
		$result = $collection->deleteOne(['started' => true]);
		
		if($result->getDeletedCount() > 0) {
			
			return true;
		
		}

		return false;

	}	



}




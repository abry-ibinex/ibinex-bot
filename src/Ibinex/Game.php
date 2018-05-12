<?php
namespace Bot\Ibinex;
//use MongoDB\Client AS MongoDB;
use Bot\Ibinex\GameInstance;

class Game {

	public $game_id			= null;
	private $contestants 	= [];
	protected $ongoing 		= false;
	private $timestamp;
	private $uid;

	public function __construct(string $uid) {
		
		$this->uid = $uid;

	}
	
	public function test() {

		return true;
	}
	
	public function create() {

		echo "O";
		if(GameInstance::$started) {
			echo "X";
			return false;

		} else {	
		
			GameInstance::GetInstance($this->uid);
			return true;

		}


	}




	public function cancel() {

		if(!GameInstance::$started) {

			return false;

		} else {

			GameInstance::$instance = null;
			return true;
		}
	}	



}




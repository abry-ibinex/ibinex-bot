<?php
namespace Bot\Ibinex;
use MongoDB\Client AS MongoDB;

class User {

	private $database		= "test";
	private $uid;
	public $userinfo;
	private $handle;
	private $team;


	public function __construct(string $uid, string $handle="", int $team=0) {
		

		$this->uid 		= $uid;
		$this->handle 	= $handle;
		$this->team 	= $team;
	}

	public function add() {

		$collection = (new MongoDB)->{$this->database}->user;
		
	
		$result = $collection->insertOne([

		    'uid' 		=> $this->uid,
		    'timestamp' => time(),
		    'score'		=>	0,
		    'handle'	=> $this->handle,
		    'team'		=>	$this->team,
		    'joined'	=> true


		]);

		if($result->getInsertedCount() == 0)
			return false;

		return true;

		

	}	



	public function find() {

		
		$collection = (new MongoDB)->{$this->database}->user;
		
		//Check if a user exist
		$this->userinfo = $collection->findOne(['uid' => $this->uid]);
		
		
		if(!$this->userinfo)
			return false;

		return true;

	}



	public function join() {
		
		$collection = (new MongoDB)->{$this->database}->user;
		
		$result = $collection->updateOne(

		    ['uid' => $this->uid, 'joined' => false],
		    ['$set' => [
                'joined' => true,
                'team' => $this->team,
                'handle' => $this->handle,
                'timestamp' => time()
            ]]

		);
		
		if($result->getMatchedCount() == 0)
			return false;
		
		return true;

	}

	public function unjoin() {
		
		$collection = (new MongoDB)->{$this->database}->user;
		
		$result = $collection->updateOne(

		    ['uid' => $this->uid, 'joined' => true],
		    ['$set' => ['joined' => false]]

		);
		
		if($result->getMatchedCount() == 0)
			return false;
		
		return true;

	}



	public function resetjoined() {


		$collection = (new MongoDB)->{$this->database}->user;
		$result = $collection->updateMany(
		    ['joined' => true],
		    ['$set' => ['joined' => false]]
		);


	}
    
    public function hasJoined(){
        
        $collection = (new MongoDB)->{$this->database}->user;
        
        $result = $collection->findOne(
		    ['uid' => $this->uid, 'joined' => true]
		);
        
        if(!$result)
			return false;
		
		return true;
    }
    
    public function getHandler(){
        $collection = (new MongoDB)->{$this->database}->user;
        
        $result = $collection->findOne(
            ['uid'  => $this->uid]
		);
        
        return ($result['handle']);
    }
    
    public function getTeam(){
        $collection = (new MongoDB)->{$this->database}->user;
        
        $result = $collection->findOne(
            ['uid'  => $this->uid]
		);
        
        return ($result['team']);
    }

}
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

		$collection = (new MongoDB)->{$this->database}->user;

		$players = $collection->find(['joined' => true]);

		foreach($players AS $player)
			$p[] = '<@' . $player['uid'] .'>';

		return $p;


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




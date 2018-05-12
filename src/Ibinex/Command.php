<?php
namespace Bot\Ibinex;
use Bot\Ibinex\Auth;
class Command {

	private $commands = [

		'startgame'		=>	'admin',
		'cancelgame'	=>	'admin',
		'mystats'		=>	'user',


	];


	private $commands_map = [

		'startgame'		=>	'AdminCommands',
		'cancelgame'	=>	'AdminCommands',


	];

	private $commandType="user";
	private $command;
	public $message;
	private $uid;
	private $parameters=[];

	public function parseCommand($command, $uid) {

		$params = explode(" ", $command);

		$maincommand = $params[0];
			
		if(!array_key_exists($maincommand, $this->commands)) {
		
			$this->message="*Error*: Invalid command.";
			return false;

		}

		if($this->commands[$maincommand] == "admin") {

			if(!Auth::isAdmin($uid)) {

				$this->message="*Error*: Unathorized access.";
				return false;
			}
		} 


		$this->command=$maincommand;
		$this->commandType=$this->commands[$maincommand];
		$this->uid=$uid;
		$this->parameters = $params;
		array_shift($this->parameters);		
		$this->parameters['uid'] = $uid;

		return true;
		
			
		
	}





	public function run() {
		


	
		if(method_exists('Bot\\Ibinex\\'. $this->commands_map[$this->command],  $this->command)) {

			$this->message = forward_static_call_array('Bot\\Ibinex\\'. $this->commands_map[$this->command] . '::'. $this->command, $this->parameters);
			return true;

		} else {

			$this->message="*Error*: Invalid command.";
			return false;
		}



	}




}




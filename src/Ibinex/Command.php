<?php
namespace Ibinex;
use Ibinex\Auth;
class Command {

	private $commands = [

		'startgame'		=>	'admin',
		'endgame'		=>	'admin',
		'mystats'		=>	'user',


	];

	private $commandType="user";
	private $command="";
	private $message="";
	private $uid="";


		public function parseCommand($command,$uid) {

				
			if(!array_key_exists($command,$this->commands)) {
				
				return false;

			}

			if($this->commands[$command] == "admin") {

				if(!Auth::isAdmin($uid)) {

					$this->message="Unathorized access.";
					return false;
				}

			} 



			$this->command=$command;
			$this->commandType=$this->commands[$command];
			$this->uid=$uid;
			$this->message="OK";
			return true;
		
			
			
		}




}




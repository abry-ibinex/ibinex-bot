<?php
namespace Ibinex\Commands;
class AdminCommands {

	private $accessLevel="user";



	public static function startgame($uid) {


		return "<!everyone>, New CodingGame session started by <@". $uid . ">. Registration is open for 10mins. type `@Ibinex Bot register` to join.";
	}
	



}




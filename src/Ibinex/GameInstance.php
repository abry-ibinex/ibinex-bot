<?php
namespace Bot\Ibinex;

class GameInstance {
	

	public static $timestamp;
	public static $instance;
	public static $started = false;
	public static $uid;

	private function __construct() {
		
		
	}

	public static function GetInstance($uid) {  

		if (self::$instance==null) {

			self::$instance = new GameInstance();
			self::$started = true;
			self::$uid = $uid;

		}
		return self::$instance;
	}


}
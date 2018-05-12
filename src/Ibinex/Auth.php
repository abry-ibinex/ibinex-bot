<?php
namespace Bot\Ibinex;
class Auth {

	private static $admins = [

		'U9ZF62T2P', //ace
		'UA1LJL47Q', //ansell
		'U9ZB324KE', //gab
		'UA1SZP8TH', //jovi
		'UA1SWDZ39' // izza

	];

	public static function isAdmin($uid) {


		if(!in_array($uid, self::$admins))
			return false;

		return true;

	}




}




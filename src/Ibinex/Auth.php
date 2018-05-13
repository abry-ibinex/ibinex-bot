<?php
namespace Bot\Ibinex;
class Auth {

	private static $admins = [

		/* Team Leaders */
		'U9ZF62T2P', // ace
		'UA1LJL47Q', // ansell
		'U9ZB324KE', // gab
		'UA1SZP8TH', // jovi
		'UA1SWDZ39', // izza

		/* iBinex Bot Developers */
		'UA09CQS0H' // abry

	];

	public static function isAdmin($uid) {


		if(!in_array($uid, self::$admins))
			return false;

		return true;

	}




}




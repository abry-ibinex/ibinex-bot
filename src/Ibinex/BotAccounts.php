<?php
namespace Bot\Ibinex;

class BotAccounts {


	public $bots = [


		'2605280' => 'Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F59F73419623A44E177941787F58BDA0E675E43E34204B81EE768BE3C09239272971C9CEFC4B3A7E0DAE61A3D151D73B1D; remcg=NTBwphIyPtf/pmbMrAGpNN/6PjhvDdEeim+1cxsvY8zDY2rIi0LJIwiPr3wBhPB6l2AH5NxwhnSAXlnR+Qu2kcfbNnberXdSk94jgowyVAMI39juo625l+86CaUDe47jp/GzCj3vK+lzzs2HaMAN3NOqjP3f0gkzv/9Cnvq2u9WDH+S1/KYatNhXzfI/BSg3Qoj+UM/wwd5/K259XADSCpqenO1jekZkUa/hbIxyZy/8svmsQvk+a5cnnli0peRcrISiITpe+i4XEr8LNBCZxUNIUNXfGs6G7xsFdKwTXWjRfQYIzy2eQfRjHNKMZeJAMnbq7Rt0lPvcQ3eVI5PZMaY3X96rTLomSMYfQmjvEAqhjW60+lynmU2Vsw95Y1Khb15QzvxQtFeVpu4G8zkX9GVyzx4ZG4AHDMYIuqRfKcmvid5FZGqkQEwhetwsa5YtArW+iW9cBBdSTZm+XJ38ZU7F3NIkOJcFhEL7dxcOhwcDizNRcHEHXPWgeDM5WHBxUA/MFdBCcmS9NNepYMV4vRPTbs90GBlmuMOt//zUltBZESqbbz+BqU1KWrHwIO7r2nCVvM3fxhpMnwigrmPcug==; JSESSIONID=2F241139554797EFFCE05C28CC6F78C0; _gid=GA1.1.1989885660.1525959261; _gat=1',

		'2613488' => 'Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F59F73419623A44E177941787F58BDA0E675E43E34204B81EE768BE3C09239272971C9CEFC4B3A7E0DAE61A3D151D73B1D; _gid=GA1.1.1989885660.1525959261; JSESSIONID=120FCE1E65A352915123C95B3472CBD1; remcg=Zwv96T/nAQqzjY8uHXMm64tnHWYcPa/yTTCb2OzV1k/jST2bCvMbS6/9MaZMZD7NfMg9KZB8tb4lY24UPR2d9z260pfKv1JVl0/uhsq8ojfvuPhn9XdNJXYfhbKDiGXWYP0UFSQ4Yjl02SNCZgBRH1zf5sW48uoQl6uJ6Vw/XuoYES4iF175WH77GuuXlwG+NwTJ8G4ow+7+sjnGL5USRJNNqyoYa28RF8tztc2FWHDlQxz86Zd5deK6/q+5l14GLEsia3TjscY505ifJ6VNxVpoHDSeEi2SzFhbR4W132huECP7oqbVtlTlrbN88L3G39v1JrI1nWkRxt2WMTvyCyfOky/Yjx6esbbxP9stbBsNspQ36IgExmaG9/fYQR5YjLYoqSvSzcX1MLeFMNvJU4VimtPIhPiJcVL55MIjuuKwxbTdw/GIXXEAX4sFP0kojw7Hw0BPELb577/2fC7QZlly5WS9HA55MBFzihKDZevknpHZxUedJ2FQkTTtwx6Fj2bDvxvtHIfvDLfz6gySb7Zcp2z2KpToHiQTlAxELSQq7n6jZtQEhJi+I1/llNGaSF/mjKuW7jbC3fAaPvBHmw==; _gat=1',


		'2613492' => 'Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F59F73419623A44E177941787F58BDA0E675E43E34204B81EE768BE3C09239272971C9CEFC4B3A7E0DAE61A3D151D73B1D; _gid=GA1.1.1989885660.1525959261; JSESSIONID=2FDDDFB3A6E649E943F4C0000D59D550; _gat=1; remcg=aYon0fQj5i7Dcxu2Ckzb1HPAKk67P65ToS/5JLVkMmVMK64zM7O3mRTiJB4788T9ysuWeU2aUfVz+v6gKQQzbpU2XdtryLGqH3NQwyF05xT10kIedQH/H+EJYTOeGTUlHXrxF9Ui5kN79Mipn0Fr5pqu20THpOw3rrJm6+9w4K0/46J7fIgFV7UDZx3JD6SmFOxNIqPRSvV+huy04OWyqrym78BHPRKJk4Cwv1EfewBqW0zijqskHbHz7xUCta4uOLhofwA9W+5MuqRz+R45IcDH9FrEB5cZ1Rr4k/cQJUZEr/YAfzsBHXnoK59xjr0D3W0IYib2r4iPGdGOvaUWAwXPvnGo8zW1+Fux27YMDqalxquhe527SM45aW+kLq6NmgBDXhNFMkt5Ozat204agI9nZ0w3FHV7bxWhWtb0Q7fgBlY40b8ydgk/qItpsdwco/yMt8jfeNdIXqYBCYOwvFUoCzrgaTjIutYQnXzwOfBWUSANu8tucHNuzvybtF7rvdliZJAR2/YmrG0vU4ZWfcZFWLt+3Wnki/uG8a2+yz97WMRV8nnl8eXfW0rjduiP9jazhnigw1j2ibWEQbRpjg==',

		'2613697' => 'Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F59F73419623A44E177941787F58BDA0E675E43E34204B81EE768BE3C09239272971C9CEFC4B3A7E0DAE61A3D151D73B1D; _gid=GA1.1.1989885660.1525959261; JSESSIONID=CB324BA0E3EB54391EFAEB27106C6EA0; _gat=1; remcg=YV9i/JSUheByKZwx0YMC9SjKxFwXR/1HwwQRPjlVwKsGiaqiqzKTTLGfVD1fZFj4YhC8Ws/ru+TPr+URsFqX6WNZlNJWnhBTAruyemC2Wm/MBFROIw31URQEh8zJK6C+b1ZVBWc00CrUHVN+7GzZF+wXA7Qv0HpvU2rUAp2VZFsQo5cdetd6I7cJrw/OdCF3MMRCnNIxyjBCTmBvSDiWU8XJOQup+NSlW/enI0PjcstmICROxiB1g62KLfH80Vhj3JkknyHhmiHKazyYmxapllNB75jCHMUGCvTGBjjebqvOk55dUBFDrwaIn/wFyZE6X4kNaOi127zp7skzi9MrEmrvdrfHJ5gX8IXownHxzRpBfCnMJUXxqovTnHStmeTnSjIswnC2KG+EqMqm9v55lFB5xLOiRuF2K6v/dF9jt7v6hC6E63iiqfmeoLXWJ8KfR0+S7R2KOYtD7jfJkJPS8/TNAH6GeAxIzAlJSJvnXpRCv9SGpSOcTGdwDoI/MY3eLGnis15p9DGqHvjB2fvqJKegenlFJqPy+2okxp6a+dp3JbjAkNANG7et+Qh462Ld6NJP1z0P+MQHiEP/M2HWFA==',

		'2613702' => 'Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F59F73419623A44E177941787F58BDA0E675E43E34204B81EE768BE3C09239272971C9CEFC4B3A7E0DAE61A3D151D73B1D; _gid=GA1.1.1989885660.1525959261; JSESSIONID=A37FC042B2D60D8A3ED22A72798706CB; remcg=eXc2Js30yFt+DPZ3QXDzhwQuNE/AGlSUX46VA1YmEwHwm+Wrtix6S/ALWARyVHMj9eH0w61Hp34bOWQeyjnB37tEOJsTF2U3NWiN1nlr8uqUZ40oZvsyT8YjT3auaqoXVz4mjEbhgIegiI55VqV6qreT8AM9dWfy4Waz05ZKxcr03HmfHpR8bqdVGE3imD6PYEknbg4aNwmwcLQk0sbJGpowdUosnX37MK7S/5i5vGJDHITxZqdVkSWBLYRSa9Ko6Y4mSKkIxg6omdvuroibwmZ3IZZnMCwIDV1GI2P2J9pDcRbpy6xm8nHw9ILy9RR5DQcMpcOQTkE+EtCPOWW19Fqn2sdPfC2bxppezm9Da4mOZL5HvoIzv9p/AauvCJk+PIYA1ZVc0BC9OrVRZUtk0XytPirdiVz6ef8vD4vB4txg8LNBCR19ZasSBCD8nKxOkDDs7E+ZzuR9tUhYiHadAduzoD7E51RBW2m7Q1xG/cjq7+WPU9Cjk80XJNqysAKRqlhrh+KRo32Yv1Mp16tm2Zz8pNgXnozmnqDqGYfJhvhID9cS5dgyvc8N5p9Sza8lNEyXFLL4r9Qt5bF/kmDzHA==; _gat=1',

		'2613707' => 'Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F59F73419623A44E177941787F58BDA0E675E43E34204B81EE768BE3C09239272971C9CEFC4B3A7E0DAE61A3D151D73B1D; _gid=GA1.1.1989885660.1525959261; JSESSIONID=384F47111548023077FC1C97707D8513; remcg=uiNuDqOwsDo5pxSX0nc8mX+HKiA1aOw3Y8UVoNGtMYJPzlk+IOB98vkP4TaJ2cbIcZt5jzihgy0VJY+dc0Whnw9M+qScnC7UieMT1i8ii2TAiyQsD74gkWuzH19ocskf81+09AlNHhudzXEpJYWA8Xbqie/T7cT1FzP3iu0ct+ZE8RCHAe/kf7FVt9uc52v+Vg/XigZGAd30trdAab8xxpIl8rBcrKHu0tKXFv7YFnw3JYGBD7rPWjbYFATzhWyxwkjT62g/ppxW0P9aSu5FcKIJlJyx1XiPvUYdyvkXgxaLOWANaIjR92L92ewyqKntDx82WGwlAVrrWqHQ/Ky7EWk4UxvWfIm1Oo7Pa3PSx5i2oOR6YYSJEEbMlozkeNayv38NR5JB/yg5FU55BgMFnfuoPKDvQsdI7GcXxXXfwygLvladTX4YB9iov0TWyRG4oWKnvSQsabsb7TSwo8GDG9uYcyg3G/yUPv+8z0qX9nkpDgt4sKnwWTktI5gN7t/3oDxY8r6EjmD2qy6KB6k2Lv5pJgL20mZ6LVURz/wXzzBavv8ZI3ue+3IeQNfBVhRgVcwWuoPwHPOqCLBEnm2gYQ==; _gat=1',

		'2613712' => 'Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F59F73419623A44E177941787F58BDA0E675E43E34204B81EE768BE3C09239272971C9CEFC4B3A7E0DAE61A3D151D73B1D; _gid=GA1.1.1989885660.1525959261; JSESSIONID=524DC42F0BCD3CBD784BA137FB9AD613; remcg=Bm1laeN8ej/y7adzAl9bwDAJ9MULZB1FYBk+jKIhiyffAt+nmj4zuOJwlZjYBz9l2fa/bsqNytf4Y7N+yCDnHepJknwtAZnb0XdAqT7Q8mwixg7pcCjtVLOpZOW7vbsFZTXpaNMORZiIKEky1HHMoUuVfs7Evezi8KnJQMHo0LMLYnCyf3A/lNrOSgN4fCkdf/H646nRyBzq3d8z4VOZCKywmEPN5aNuqgrNtj2/gE+nrXuodCwJx1fhp6oeu11twfhGH/mg6I9yR3Brf5m1xfA9x/5uKk4C14G62sIVOauA1IpPJIvKeWMaey8hsLlLrsrVpTVQ+uaPgu47qkdauM/SoUyoMWmiUKMEL86U0Mg55nQstzALlt3cQ2byV/z49n6iKQfXMS/T/u0UwQAffLGZvtQXDlytIOSTT00ApMz8FimKrEcP6xUf2R/0uA0WVvFGe5d5dnQ7k8y6cvU4Rz6IjFM4nt1Ox3gNaVIj/TpjXt1JHrDvqygGx/GmShl2yuRkY3a1bIlwD1B36P15jwb2aq0m4Rkv4GHW2H6Y9qPi6qed44agFcbmsBzUyr1KDrMJkHlwSjqGi8COxosT8Q==; _gat=1'
	];

	public function report($url) {

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://www.codingame.com/services/ClashOfCodeRemoteService/findClashReportInfoByHandle");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "[\"".$url."\"]");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

		$headers = array();
		$headers[] = "Origin: https://www.codingame.com";
		$headers[] = "Accept-Encoding: gzip, deflate, br";
		$headers[] = "Accept-Language: en-PH,en;q=0.9,fil-PH;q=0.8,fil;q=0.7,en-US;q=0.6";
		$headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Mobile Safari/537.36";
		$headers[] = "Content-Type: application/json;charset=UTF-8";
		$headers[] = "Accept: application/json, text/plain, */*";
		$headers[] = "Referer: https://www.codingame.com/clashofcode/clash/report/".$url;
		$headers[] = "Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; remcg=Bm1laeN8ej/y7adzAl9bwDAJ9MULZB1FYBk+jKIhiyffAt+nmj4zuOJwlZjYBz9l2fa/bsqNytf4Y7N+yCDnHepJknwtAZnb0XdAqT7Q8mwixg7pcCjtVLOpZOW7vbsFZTXpaNMORZiIKEky1HHMoUuVfs7Evezi8KnJQMHo0LMLYnCyf3A/lNrOSgN4fCkdf/H646nRyBzq3d8z4VOZCKywmEPN5aNuqgrNtj2/gE+nrXuodCwJx1fhp6oeu11twfhGH/mg6I9yR3Brf5m1xfA9x/5uKk4C14G62sIVOauA1IpPJIvKeWMaey8hsLlLrsrVpTVQ+uaPgu47qkdauM/SoUyoMWmiUKMEL86U0Mg55nQstzALlt3cQ2byV/z49n6iKQfXMS/T/u0UwQAffLGZvtQXDlytIOSTT00ApMz8FimKrEcP6xUf2R/0uA0WVvFGe5d5dnQ7k8y6cvU4Rz6IjFM4nt1Ox3gNaVIj/TpjXt1JHrDvqygGx/GmShl2yuRkY3a1bIlwD1B36P15jwb2aq0m4Rkv4GHW2H6Y9qPi6qed44agFcbmsBzUyr1KDrMJkHlwSjqGi8COxosT8Q==; JSESSIONID=7C98B09A6182C453CC6F42AB0412F1B8; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F52D7EC3ECFAA1E6AA700CBF4C60998E39C00821947CF1FA2E5BD52D009DB24B7505F7FC879AB5278DA598E810400AD487; _gid=GA1.1.279304610.1526477122; _gat=1";
		$headers[] = "Connection: keep-alive";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		   	return false;
		}

		curl_close ($ch);
		return json_decode($result, true);

		
		

	}

	public function deploy(int $bot_count) {


		$ch = curl_init();


		if(count($this->bots) == 0 OR count($this->bots) < $bot_count)
			return false;

		$clashes = [];
		$counter = 1;

  		$keys = array_keys($this->bots);

        shuffle($keys);

        foreach($keys as $key) {
            $new[$key] = $this->bots[$key];
        }

        $this->bots = $new;


		foreach($this->bots AS $id => $cookie) {

			
			curl_setopt($ch, CURLOPT_URL, "https://www.codingame.com/services/ClashOfCodeRemoteService/createPrivateClash");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "[". $id .",{\"SHORT\":true}]");
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
			$headers[] = $cookie;
			$headers[] = "Connection: keep-alive";
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) 
			    return false;

			$data = json_decode($result, true);
			$clashes[] = $data['success']['publicHandle'];

			if($counter >= $bot_count)
				break;

			$counter++;

		}
		

		
		curl_close ($ch);
		
		return $clashes;
	}

}




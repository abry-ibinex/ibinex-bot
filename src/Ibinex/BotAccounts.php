<?php
namespace Bot\Ibinex;

class BotAccounts {


	public $bots = [


		'2605280' => 'Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F59F73419623A44E177941787F58BDA0E675E43E34204B81EE768BE3C09239272971C9CEFC4B3A7E0DAE61A3D151D73B1D; remcg=NTBwphIyPtf/pmbMrAGpNN/6PjhvDdEeim+1cxsvY8zDY2rIi0LJIwiPr3wBhPB6l2AH5NxwhnSAXlnR+Qu2kcfbNnberXdSk94jgowyVAMI39juo625l+86CaUDe47jp/GzCj3vK+lzzs2HaMAN3NOqjP3f0gkzv/9Cnvq2u9WDH+S1/KYatNhXzfI/BSg3Qoj+UM/wwd5/K259XADSCpqenO1jekZkUa/hbIxyZy/8svmsQvk+a5cnnli0peRcrISiITpe+i4XEr8LNBCZxUNIUNXfGs6G7xsFdKwTXWjRfQYIzy2eQfRjHNKMZeJAMnbq7Rt0lPvcQ3eVI5PZMaY3X96rTLomSMYfQmjvEAqhjW60+lynmU2Vsw95Y1Khb15QzvxQtFeVpu4G8zkX9GVyzx4ZG4AHDMYIuqRfKcmvid5FZGqkQEwhetwsa5YtArW+iW9cBBdSTZm+XJ38ZU7F3NIkOJcFhEL7dxcOhwcDizNRcHEHXPWgeDM5WHBxUA/MFdBCcmS9NNepYMV4vRPTbs90GBlmuMOt//zUltBZESqbbz+BqU1KWrHwIO7r2nCVvM3fxhpMnwigrmPcug==; JSESSIONID=2F241139554797EFFCE05C28CC6F78C0; _gid=GA1.1.1989885660.1525959261; _gat=1',

		'2613488' => 'Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F59F73419623A44E177941787F58BDA0E675E43E34204B81EE768BE3C09239272971C9CEFC4B3A7E0DAE61A3D151D73B1D; _gid=GA1.1.1989885660.1525959261; JSESSIONID=120FCE1E65A352915123C95B3472CBD1; remcg=Zwv96T/nAQqzjY8uHXMm64tnHWYcPa/yTTCb2OzV1k/jST2bCvMbS6/9MaZMZD7NfMg9KZB8tb4lY24UPR2d9z260pfKv1JVl0/uhsq8ojfvuPhn9XdNJXYfhbKDiGXWYP0UFSQ4Yjl02SNCZgBRH1zf5sW48uoQl6uJ6Vw/XuoYES4iF175WH77GuuXlwG+NwTJ8G4ow+7+sjnGL5USRJNNqyoYa28RF8tztc2FWHDlQxz86Zd5deK6/q+5l14GLEsia3TjscY505ifJ6VNxVpoHDSeEi2SzFhbR4W132huECP7oqbVtlTlrbN88L3G39v1JrI1nWkRxt2WMTvyCyfOky/Yjx6esbbxP9stbBsNspQ36IgExmaG9/fYQR5YjLYoqSvSzcX1MLeFMNvJU4VimtPIhPiJcVL55MIjuuKwxbTdw/GIXXEAX4sFP0kojw7Hw0BPELb577/2fC7QZlly5WS9HA55MBFzihKDZevknpHZxUedJ2FQkTTtwx6Fj2bDvxvtHIfvDLfz6gySb7Zcp2z2KpToHiQTlAxELSQq7n6jZtQEhJi+I1/llNGaSF/mjKuW7jbC3fAaPvBHmw==; _gat=1',


		'2613492' => 'Cookie: _ga=GA1.1.160939669.1522740689; _ga=GA1.2.160939669.1522740689; driftt_aid=977a9041-a86f-40d5-aec3-8d0a3d160d53; __qca=P0-119117809-1525103756904; ubvs=54.237.217.1711527858052860136; AWSELB=B795119B02CD9A215A5DE011B19A0ABDD25F4768F59F73419623A44E177941787F58BDA0E675E43E34204B81EE768BE3C09239272971C9CEFC4B3A7E0DAE61A3D151D73B1D; _gid=GA1.1.1989885660.1525959261; JSESSIONID=2FDDDFB3A6E649E943F4C0000D59D550; _gat=1; remcg=aYon0fQj5i7Dcxu2Ckzb1HPAKk67P65ToS/5JLVkMmVMK64zM7O3mRTiJB4788T9ysuWeU2aUfVz+v6gKQQzbpU2XdtryLGqH3NQwyF05xT10kIedQH/H+EJYTOeGTUlHXrxF9Ui5kN79Mipn0Fr5pqu20THpOw3rrJm6+9w4K0/46J7fIgFV7UDZx3JD6SmFOxNIqPRSvV+huy04OWyqrym78BHPRKJk4Cwv1EfewBqW0zijqskHbHz7xUCta4uOLhofwA9W+5MuqRz+R45IcDH9FrEB5cZ1Rr4k/cQJUZEr/YAfzsBHXnoK59xjr0D3W0IYib2r4iPGdGOvaUWAwXPvnGo8zW1+Fux27YMDqalxquhe527SM45aW+kLq6NmgBDXhNFMkt5Ozat204agI9nZ0w3FHV7bxWhWtb0Q7fgBlY40b8ydgk/qItpsdwco/yMt8jfeNdIXqYBCYOwvFUoCzrgaTjIutYQnXzwOfBWUSANu8tucHNuzvybtF7rvdliZJAR2/YmrG0vU4ZWfcZFWLt+3Wnki/uG8a2+yz97WMRV8nnl8eXfW0rjduiP9jazhnigw1j2ibWEQbRpjg==',


	];


	public function deploy(int $bot_count) {


		$ch = curl_init();


		if(count($this->bots) == 0 OR count($this->bots) < $bot_count)
			return false;

		$clashes = [];
		$counter = 1;
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




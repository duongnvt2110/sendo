<?php
	
	include 'Curl.php';

	
	$user='0967488581';
	$pass=urlencode('12345678@');
	loginSendo($user, $pass);

	function loginSendo($user,$pass)
	{

		// create handle Curl;
		$http=new mycurl('');
		// Create Cookie
		$_url='https://ban.sendo.vn/mo-shop';
		$http->createCurl($_url);
		// print_r($page);
		// Sample code post sendo
		// __RequestVerificationToken=Scqh9uTHw5hpuZ5931dq2IDlL0mFeC7uL-3nWqxJUhm6b_NXxKbaUCfwBqsLdzhqYfRgCb1KD05R-Bko16TgGft8a5M1&username=0967488581&password=123456789%40
		$_RequestVerificationToken=getCookie();
		$_dataSend='__RequestVerificationToken='.$_RequestVerificationToken.'&username='.$user.'&password='.$pass;
			// print_r($_dataSend);
		// setPost data send
		$http->setPost($_dataSend);
		// setReferer
		$http->setReferer('https://ban.sendo.vn/mo-shop');
		// connect Login
		$http->createCurl('https://ban.sendo.vn/Home/LoginAjax');
		// text Load Login
		$s=$http->createCurl('https://ban.sendo.vn/shop#dashboard');
		echo $s;
	}
	function getCookie()
	{
		$myfile = fopen("cookie.txt",'r');
		$myfile=fread($myfile,filesize("cookie.txt"));
		preg_match('/__RequestVerificationToken\s(.*?)\s/',$myfile,$result);
		return $result[1];
	}
?>


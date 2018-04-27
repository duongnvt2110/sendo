<?php

	include 'Curl.php';


	$user='0967488581';
	$pass=urlencode('12345678@');

	loginSendo($user, $pass);
	$name="Khăn tắm";
	$Code_Model="12321";
	$Prices="5000000";
	$UnitId='Single';
	$Weight='490';
	$StockQuantity='1';
	$Description='Sáº£n pháº©m khÄn tá»t';
	postProduct($name,$Code_Model,$Prices,$UnitId,$Weight,$StockQuantity,$Description);
	deleteCookie();
	function loginSendo($user,$pass)
	{
		$GLOBALS['http']=new mycurl('');
			// create handle Curl;
			// $GLOBALS['http'] =new mycurl('');
			// Create Cookie
		$GLOBALS['http']->setContentType('Content-Type: application/x-www-form-urlencoded');
		$_url='https://ban.sendo.vn/mo-shop';
		$GLOBALS['http']->createCurl($_url);
			// print_r($page);
			// Sample code post sendo
			// __RequestVerificationToken=Scqh9uTHw5hpuZ5931dq2IDlL0mFeC7uL-3nWqxJUhm6b_NXxKbaUCfwBqsLdzhqYfRgCb1KD05R-Bko16TgGft8a5M1&username=0967488581&password=123456789%40
		$_RequestVerificationToken=getCookie();
		$_dataSend='__RequestVerificationToken='.$_RequestVerificationToken.'&username='.$user.'&password='.$pass;
				// print_r($_dataSend);
			// setPost data send
		$GLOBALS['http']->setPost($_dataSend);
			// setReferer
		$GLOBALS['http']->setReferer('https://ban.sendo.vn/mo-shop');
			// connect Login
		$GLOBALS['http']->createCurl('https://ban.sendo.vn/Home/LoginAjax');
			// text Load Login
		$GLOBALS['http']->createCurl('https://ban.sendo.vn/shop');

	}

	function postProduct($name,$Code_Model,$Prices,$UnitId,$Weight,$StockQuantity,$Description)
	{

		$_dataSend='{"Name":"'.$name.'","StoreSku":"'.$Code_Model.'","Price":'.$Prices.',"UnitId":"'.$UnitId.'","Weight":'.$Weight.',"StockAvailability":true,"StockQuantity":'.$StockQuantity.',"IsManageStock":true,"ProductStatus":0,"Description":"<p>'.$Description.'<br data-mce-bogus=\"1\"></p>","DescriptionChange":true,"Cat2Id":999,"Cat3Id":1046,"Cat4Id":"1047","attributeCollections":[{"ID":888,"Name":"kÃ­ch thÆ°á»c","ControlType":"TextBox","attributeValues":[{"ID":-11282,"Value":"40x40","AttributeImg":null,"DisplayOrder":0,"IsDisplay":true,"IsSelected":false,"IsSuggestion":false,"IsOther":false,"ExtensionData":{},"__ko_mapping__":{"ignore":[],"include":["_destroy"],"copy":[],"observe":[],"mappedProperties":{"ExtensionData":true,"AttributeImg":true,"DisplayOrder":true,"ID":true,"IsSelected":true,"IsSuggestion":true,"Value":true},"copiedProperties":{}},"__moduleId__":"services/Shared/m.attributevalue"}],"DisplayOrder":1,"IsRequired":true},{"ID":333,"Name":"Xuáº¥t xá»©","ControlType":"ComboBox","attributeValues":[{"ID":24278,"Value":"England","AttributeImg":null,"DisplayOrder":0,"IsDisplay":true,"IsSelected":true,"IsSuggestion":false,"IsOther":false,"ExtensionData":{},"__ko_mapping__":{"ignore":[],"include":["_destroy"],"copy":[],"observe":[],"mappedProperties":{"ExtensionData":true,"AttributeImg":true,"DisplayOrder":true,"ID":true,"IsSelected":true,"IsSuggestion":true,"Value":true},"copiedProperties":{}},"__moduleId__":"services/Shared/m.attributevalue"}],"DisplayOrder":2,"IsRequired":true},{"ID":284,"Name":"MÃ u sáº¯c","ControlType":"CheckBox","attributeValues":[{"ID":603,"Value":"#ffff00,VÃ ng","AttributeImg":null,"DisplayOrder":1,"IsDisplay":true,"IsSelected":true,"IsSuggestion":false,"IsOther":false,"ExtensionData":{},"__ko_mapping__":{"ignore":[],"include":["_destroy"],"copy":[],"observe":[],"mappedProperties":{"ExtensionData":true,"AttributeImg":true,"DisplayOrder":true,"ID":true,"IsSelected":true,"IsSuggestion":true,"Value":true},"copiedProperties":{}},"__moduleId__":"services/Shared/m.attributevalue"}],"DisplayOrder":3,"IsRequired":true}],"productPictures":[{"Id":37984018,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/Yzh7CO.jpg","AlbumId":249200},{"Id":37984906,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/0whQhJ.jpg","AlbumId":249200},{"Id":37974332,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/ws8smA.jpg","AlbumId":249200},{"Id":37973698,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/rJYowl.jpg","AlbumId":249200}],"ProductTags":"khan tam,khan tam ao tam,khan tam cao cap,khan tam giac,khan ao tam","PictureId":37984018,"ProductRelateds":[],"SEOScore":19,"SEOKeyWord":"khÄn"}';
		print_r($_dataSend);
		$GLOBALS['http']->setPost($_dataSend);
		$GLOBALS['http']->setContentType('Content-Type: application/json; charset=utf-8');
		$GLOBALS['http']->setReferer('https://ban.sendo.vn/shop');

		$GLOBALS['http']->createCurl('https://ban.sendo.vn/Product/SendProductSubmit');
		print_r($GLOBALS['http']);
	}	
	function getCookie()
	{
		$myfile = fopen("cookie.txt",'r');
		$myfile=fread($myfile,filesize("cookie.txt"));
		preg_match('/__RequestVerificationToken\s(.*?)\s/',$myfile,$result);
		return $result[1];
	}
	function deleteCookie()
	{
		unlink('cookie.txt');
	}
?>


<?php

include 'Curl.php';
// $user='0967488581';
// $pass=urlencode('12345678@');

// loginSendo($user, $pass);
// // showInfomationProduct();
// // createDataForm('123');
// // postImage();
// // deleteImage();
// $name=$_POST['name'];
// $Code_Model=$_POST['sku'];
// $Prices=$_POST['prices'];
// $UnitId='Single';
// $Weight=$_POST['volume'];
// $StockQuantity=$_POST['amount'];
// $Description=htmlspecialchars($_POST['contact_list']);
// postProduct($name,$Code_Model,$Prices,$UnitId,$Weight,$StockQuantity,$Description);
class sendo
{

	public function loginSendo($user,$pass,$getCookie)
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
		$_RequestVerificationToken=$getCookie;
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
	// print_r($GLOBALS['http']);

	}

	public function postProduct($name,$Code_Model,$Prices,$UnitId,$Weight,$StockQuantity,$Description)
	{
	// Data Post Product
		$_dataSend='{"Name":"'.$name.'","StoreSku":"'.$Code_Model.'","Price":'.$Prices.',"UnitId":"'.$UnitId.'","Weight":'.$Weight.',"StockAvailability":true,"StockQuantity":'.$StockQuantity.',"IsManageStock":true,"ProductStatus":0,"Description":"<p>'.$Description.'<br data-mce-bogus=\"1\"></p>","DescriptionChange":true,"Cat2Id":999,"Cat3Id":1046,"Cat4Id":"1047","attributeCollections":[{"ID":888,"Name":"kÃ­ch thÆ°á»c","ControlType":"TextBox","attributeValues":[{"ID":-11282,"Value":"40x40","AttributeImg":null,"DisplayOrder":0,"IsDisplay":true,"IsSelected":false,"IsSuggestion":false,"IsOther":false,"ExtensionData":{},"__ko_mapping__":{"ignore":[],"include":["_destroy"],"copy":[],"observe":[],"mappedProperties":{"ExtensionData":true,"AttributeImg":true,"DisplayOrder":true,"ID":true,"IsSelected":true,"IsSuggestion":true,"Value":true},"copiedProperties":{}},"__moduleId__":"services/Shared/m.attributevalue"}],"DisplayOrder":1,"IsRequired":true},{"ID":333,"Name":"Xuáº¥t xá»©","ControlType":"ComboBox","attributeValues":[{"ID":24278,"Value":"England","AttributeImg":null,"DisplayOrder":0,"IsDisplay":true,"IsSelected":true,"IsSuggestion":false,"IsOther":false,"ExtensionData":{},"__ko_mapping__":{"ignore":[],"include":["_destroy"],"copy":[],"observe":[],"mappedProperties":{"ExtensionData":true,"AttributeImg":true,"DisplayOrder":true,"ID":true,"IsSelected":true,"IsSuggestion":true,"Value":true},"copiedProperties":{}},"__moduleId__":"services/Shared/m.attributevalue"}],"DisplayOrder":2,"IsRequired":true},{"ID":284,"Name":"MÃ u sáº¯c","ControlType":"CheckBox","attributeValues":[{"ID":603,"Value":"#ffff00,VÃ ng","AttributeImg":null,"DisplayOrder":1,"IsDisplay":true,"IsSelected":true,"IsSuggestion":false,"IsOther":false,"ExtensionData":{},"__ko_mapping__":{"ignore":[],"include":["_destroy"],"copy":[],"observe":[],"mappedProperties":{"ExtensionData":true,"AttributeImg":true,"DisplayOrder":true,"ID":true,"IsSelected":true,"IsSuggestion":true,"Value":true},"copiedProperties":{}},"__moduleId__":"services/Shared/m.attributevalue"}],"DisplayOrder":3,"IsRequired":true}],"productPictures":[{"Id":37984018,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/Yzh7CO.jpg","AlbumId":249200},{"Id":37984906,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/0whQhJ.jpg","AlbumId":249200},{"Id":37974332,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/ws8smA.jpg","AlbumId":249200},{"Id":37973698,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/rJYowl.jpg","AlbumId":249200}],"ProductTags":"khan tam,khan tam ao tam,khan tam cao cap,khan tam giac,khan ao tam","PictureId":37984018,"ProductRelateds":[],"SEOScore":19,"SEOKeyWord":"khÄn"}';
	// print_r($_dataSend);
	//  setPost data send
		$GLOBALS['http']->setPost($_dataSend);
	//  set type header
		$GLOBALS['http']->setContentType('Content-Type: application/json; charset=utf-8');
	//  setReferer
		$GLOBALS['http']->setReferer('https://ban.sendo.vn/shop');
	//  Connect
		$GLOBALS['http']->createCurl('https://ban.sendo.vn/Product/SendProductSubmit');
	// print_r($GLOBALS['http']);
	}	

	// Function to get Id album
	public function getIdAlbum() 
	{
		// https://ban.sendo.vn/Gallery/GetAlbums
		$GLOBALS['http']->setContentType('Content-Type:application/json;charset=utf-8');
		$_url='https://ban.sendo.vn/Gallery/GetAlbums';
		$GLOBALS['http']->setReferer('https://ban.sendo.vn/shop');
		$GLOBALS['http']->createCurl($_url);
	$data=json_decode($GLOBALS['http'],true);// handle json
		// Array ( [Data] => Array ( [0] => Array ( [Id] => 249200 [Name] => Sản Phẩm [StoreId] => 357076 [DisplayOrder] => 0 [CreatedUser] => 2019520554 [VersionNo] => AAAAAdtAayQ= ) ) [IsError] => [Message] => )
		// print_r($data['Data'][0]['Id']);
	$_IdAlbum=$data['Data'][0]['Id'];
		// print_r($_IdAlbum);
	return $_IdAlbum;
	}
// function to get infomation image such as name,url,so on.
public function getInfomationImage()
{
	$_IdAlbum=getIdAlbum(); // get Id
	$_dataSend='albumId='.$_IdAlbum.'&pageSize=20&pageIndex=0'; // content to post
		// print_r($_dataSend);
	$GLOBALS['http']->setContentType('Content-Type:application/x-www-form-urlencoded;charset=utf-8'); //set content type
	$GLOBALS['http']->setPost($_dataSend);
	$_url='https://ban.sendo.vn/Gallery/GetImagesByAlbumId';
	$GLOBALS['http']->setReferer('https://ban.sendo.vn/shop');
	$GLOBALS['http']->createCurl($_url);
	$_urlImage=json_decode($GLOBALS['http'],true);// handle json
	// print_r($_urlImage);
	// Handle Array
	$_in=array();
	$_inImage=array();
	foreach ($_urlImage as $value) {
		$_in[]=$value;
	}
	foreach ($_in[0] as $value) {
		$_inImage[]=$value;	
	}
	//  return array contain [0] infomation image [1] amount of array
	return $_inImage;
}
public function deleteImage()
{
	$s=getInfomationImage();
	$Id=$s[0][0]['Id'];
	$VersionNo=$s[0][0]['VersionNo'];
	$GLOBALS['http']->setContentType('Content-Type: application/json; charset=utf-8'); //set content type
	$_dataSend='[{"Id":'.$Id.',"VersionNo":"'.$VersionNo.'="}]';
	$GLOBALS['http']->setPost($_dataSend);
	$_url='https://ban.sendo.vn/Gallery/DeleteImage';
	$GLOBALS['http']->setReferer('https://ban.sendo.vn/shop');
	$GLOBALS['http']->createCurl($_url);
}
public function gettime_stamp()
{
	$time_stamp = round(microtime(true)*1000);
	return $time_stamp;
}
public function createDataForm($boundary)
{
	
	$name='1.jpg';
	$CDFAN='Content-Disposition: form-data; name='; 
	$image='1.jpg';
	$data = fopen ($image, 'r+b');
	$size=filesize ($image);
	$contents= fread ($data, $size);
	print_r($contents);
	// $s=imagecreatefromstring($s);
	// print_r($s);
	// $_dataSend=$boundary.PHP_EOL;
	// $_dataSend.=$CDFAN.'"name"'.PHP_EOL.PHP_EOL.$name.PHP_EOL;
	// $_dataSend.=$boundary.PHP_EOL;
	// $_dataSend.=$CDFAN.'"chuck"'.PHP_EOL.PHP_EOL.'0'.PHP_EOL;
	// $_dataSend.=$boundary.PHP_EOL;
	// $_dataSend.=$CDFAN.'"chunks"'.PHP_EOL.PHP_EOL.'1'.PHP_EOL;
	// $_dataSend.=$boundary.PHP_EOL;
	// $_dataSend.=$CDFAN.'"albumid"'.PHP_EOL.PHP_EOL.'-1'.PHP_EOL;
	// $_dataSend.=$boundary.PHP_EOL;
	// $_dataSend.=$CDFAN.'"file";'." ".'filename='.'"'.$name.'"'.PHP_EOL;
	// $_dataSend.='Content-Type: image/jpeg'.PHP_EOL.PHP_EOL;
	// $_dataSend.=file_get_contents('1.jpg').PHP_EOL;
	// $_dataSend.=$boundary.'--';
	// return $_dataSend;

}
// function textBinASCII($text){
// 	$bin = array();
//     for($i=0; strlen($text)>$i; $i++)
//     	$bin[] = decbin(ord($text[$i]));
//     return implode(' ',$bin);
// }
// function ASCIIBinText($bin){
// 	$text = array();
// 	$bin = explode(" ", $bin);
// 	for($i=0; count($bin)>$i; $i++)
// 		$text[] = chr(bindec($bin[$i]));

// 	return implode($text);
// }

public function postImage()
{
	$boundary='------moxieboundary'.gettime_stamp();
	$_dataSend=createDataForm($boundary);
	print_r($_dataSend);
		// print_r($_dataSend);
	// Content-Type: multipart/form-data; boundary=----moxieboundary1526891696552
	// Content-Type: multipart/form-data; boundary=----moxieboundary1526913128459

	$GLOBALS['http']->setContentType('Content-Type:multipart/form-data;'.'boundary=----moxieboundary'.gettime_stamp()); //set content type
	$GLOBALS['http']->setPost($_dataSend);
	$_url='https://ban.sendo.vn/Gallery/UploadImageProduct';
	$GLOBALS['http']->setReferer('https://ban.sendo.vn/shop');
	$GLOBALS['http']->createCurl($_url);
	print_r($GLOBALS['http']);
}
public function showInfomationProduct()
{
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$today = date("d/m/Y"); 
	print_r($today);
	$GLOBALS['http']->setContentType('Content-Type: application/json; charset=utf-8'); //set content type
	$_dataSend='{"Page":{"CurrentPage":1,"PageSize":10},"SortName":"Id","SortDesc":"-DESC","OrderBy":"Id-DESC","UpdatedDate":"15/09/2012 -'.$today.'","UpScore":0,"AutoUpScore":2,"Alert":false,"ScoreLimitKeyword":0,"UpdatedDateFrom":"15/09/2012 ","UpdatedDateTo":"' .$today.'","ProductKeywordOrderBy":"undefined-DESC","ReasonComment":"","errors":[],"__moduleId__":"models/product/m.productsearch"}';
	$GLOBALS['http']->setPost($_dataSend);
	$_url='https://ban.sendo.vn/Product/SearchProduct';
	$GLOBALS['http']->setReferer('https://ban.sendo.vn/shop');
	$GLOBALS['http']->createCurl($_url);
	$s=json_decode($GLOBALS['http'],true);
	$_inProduct=array();
	foreach ($s as $value) {
		$_inProduct[]=$value;
	}
	
	return $_inProduct;
}
public function updateProduct()
{
	// Data Post Product
	$s=showInfomationProduct();
	$Id=$s['Products'][0]['id'];// thay o bằng biến I
	$_dataSend='{"Id":'.$Id.',"Name":"'.$name.'","StoreSku":"'.$Code_Model.'","Price":'.$Prices.',"UnitId":"'.$UnitId.'","Weight":'.$Weight.',"StockAvailability":true,"StockQuantity":'.$StockQuantity.',"IsManageStock":true,"ProductStatus":0,"Description":"<p>'.$Description.'<br data-mce-bogus=\"1\"></p>","DescriptionChange":true,"Cat2Id":999,"Cat3Id":1046,"Cat4Id":"1047","attributeCollections":[{"ID":888,"Name":"kÃ­ch thÆ°á»c","ControlType":"TextBox","attributeValues":[{"ID":-11282,"Value":"40x40","AttributeImg":null,"DisplayOrder":0,"IsDisplay":true,"IsSelected":false,"IsSuggestion":false,"IsOther":false,"ExtensionData":{},"__ko_mapping__":{"ignore":[],"include":["_destroy"],"copy":[],"observe":[],"mappedProperties":{"ExtensionData":true,"AttributeImg":true,"DisplayOrder":true,"ID":true,"IsSelected":true,"IsSuggestion":true,"Value":true},"copiedProperties":{}},"__moduleId__":"services/Shared/m.attributevalue"}],"DisplayOrder":1,"IsRequired":true},{"ID":333,"Name":"Xuáº¥t xá»©","ControlType":"ComboBox","attributeValues":[{"ID":24278,"Value":"England","AttributeImg":null,"DisplayOrder":0,"IsDisplay":true,"IsSelected":true,"IsSuggestion":false,"IsOther":false,"ExtensionData":{},"__ko_mapping__":{"ignore":[],"include":["_destroy"],"copy":[],"observe":[],"mappedProperties":{"ExtensionData":true,"AttributeImg":true,"DisplayOrder":true,"ID":true,"IsSelected":true,"IsSuggestion":true,"Value":true},"copiedProperties":{}},"__moduleId__":"services/Shared/m.attributevalue"}],"DisplayOrder":2,"IsRequired":true},{"ID":284,"Name":"MÃ u sáº¯c","ControlType":"CheckBox","attributeValues":[{"ID":603,"Value":"#ffff00,VÃ ng","AttributeImg":null,"DisplayOrder":1,"IsDisplay":true,"IsSelected":true,"IsSuggestion":false,"IsOther":false,"ExtensionData":{},"__ko_mapping__":{"ignore":[],"include":["_destroy"],"copy":[],"observe":[],"mappedProperties":{"ExtensionData":true,"AttributeImg":true,"DisplayOrder":true,"ID":true,"IsSelected":true,"IsSuggestion":true,"Value":true},"copiedProperties":{}},"__moduleId__":"services/Shared/m.attributevalue"}],"DisplayOrder":3,"IsRequired":true}],"productPictures":[{"Id":37984018,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/Yzh7CO.jpg","AlbumId":249200},{"Id":37984906,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/0whQhJ.jpg","AlbumId":249200},{"Id":37974332,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/ws8smA.jpg","AlbumId":249200},{"Id":37973698,"Name":"91741EngW6L._SX522_.jpg","SeoFileName":null,"PictureURL":"http://media3.scdn.vn/img2/2018/4_27/rJYowl.jpg","AlbumId":249200}],"ProductTags":"khan tam,khan tam ao tam,khan tam cao cap,khan tam giac,khan ao tam","PictureId":37984018,"ProductRelateds":[],"SEOScore":19,"SEOKeyWord":"khÄn"}';
		// print_r($_dataSend);
		//  setPost data send
	$GLOBALS['http']->setPost($_dataSend);
		//  set type header
	$GLOBALS['http']->setContentType('Content-Type: application/json; charset=utf-8');
		//  setReferer
	$GLOBALS['http']->setReferer('https://ban.sendo.vn/shop');
		//  Connect
	$GLOBALS['http']->createCurl('https://ban.sendo.vn/Product/SendProductSubmit');
		// print_r($GLOBALS['http']);
}

public function changeStock()
{
// 	https://ban.sendo.vn/Product/ChangeStock
// het hàng
// [{"Id":9827323,"VersionNo":"AAAAAeG8/TA=","ProductStock":false,"IsCabineted":false}]

// còn hàng

// [{"Id":9827323,"VersionNo":"AAAAAeIxchE=","ProductStock":true,"IsCabineted":false}]
	$s=showInfomationProduct();
	$Id=$s['Products'][0]['id'];
	$VersionNo=$s['Products'][0]['VersionNo'];
	$GLOBALS['http']->setContentType('Content-Type: application/json; charset=utf-8'); //set content type
	$_dataSend='[{"Id":'.$Id.',"VersionNo":"'.$VersionNo.'=","ProductStock":false","IsCabineted":false}]';
	$GLOBALS['http']->setPost($_dataSend);
	$_url='	https://ban.sendo.vn/Product/ChangeStock';
	$GLOBALS['http']->setReferer('https://ban.sendo.vn/shop');
	$GLOBALS['http']->createCurl($_url);
}

public function deleteProduct()
{
	$s=showInfomationProduct();
	$Id=$s['Products'][0]['id'];
	$GLOBALS['http']->setContentType('Content-Type: application/json; charset=utf-8'); //set content type
	$_dataSend='['.$Id.']';
	$GLOBALS['http']->setPost($_dataSend);
	$_url='https://ban.sendo.vn/Product/DeleteProduct';
	$GLOBALS['http']->setReferer('https://ban.sendo.vn/shop');
	$GLOBALS['http']->createCurl($_url);
}

public function getCookie()
{
	$myfile = fopen("C:\/xampp\/htdocs\/Sendo\/php\/cookie.txt",'r');
	$myfile=fread($myfile,filesize("C:\/xampp\/htdocs\/Sendo\/php\/cookie.txt"));
	preg_match('/__RequestVerificationToken\s(.*?)\s/',$myfile,$result);
	return $result[1];
}
public function deleteCookie()
{
	unlink('cookie.txt');
}

}
?>


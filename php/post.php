<?php
include 'product.php';
$info_product=new sendo();
$user='0967488581';
$pass=urlencode('12345678@');
$getcookie=$info_product->getcookie();
$info_product->loginSendo($user, $pass,$getcookie);
$name=$_POST['name'];
$Code_Model=$_POST['sku'];
$Prices=$_POST['prices'];
$UnitId='Single';
$Weight=$_POST['volume'];
$StockQuantity=$_POST['amount'];
$Description=htmlspecialchars($_POST['contact_list']);
$info_product->postProduct($name,$Code_Model,$Prices,$UnitId,$Weight,$StockQuantity,$Description);

header('../viewproduct.php');
?>
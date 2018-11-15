<?php
$name = $_POST['name']??'';
$age = $_POST['age']??'';
$sex = $_POST['sex']??'';
$id = $_POST['id']??'';
$mem = new Memcache();
$mem->connect('127.0.0.1',11211);
$mes = $mem->get('ree');
if(!empty($id)){
	$conn = mysqli_connect('127.0.0.1','root','root');
	mysqli_query($conn, 'use php13');
	mysqli_query($conn, 'set names utf8');
	$sql = "SELECT * from user where id = $id";
	$send = mysqli_query($conn,$sql);
	$nd = mysqli_fetch_assoc($send);
	$res = $mem->set('ree',$nd);
	$mes = $mem->get('ree');
	var_dump($mes);
	exit();
}
echo "<pre>";
var_dump($mes);
/*$sql = "INSERT INTO user(username,pwd,age) VALUES('$name','$sex','$age')";
$send = mysqli_query($conn,$sql);
$res = $mem->set('ree',$nd);
$mes = $mem->get('ree');
var_dump($mes);*/
?>
<?php

$host = 'localhost';
$db_name = 'test';
$username = 'root';
$password = '';

try{
	$pdo = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOEXception $e){
	  die("connection failed".$e->getMessage());

}










?>
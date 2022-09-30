<?php 
$host = "127.0.0.1";
$port = 8889;
$database = "miscTuanDau";
$mk = "hibi";
$ten = "quang";

$pdo = new PDO("mysql:host=$host;port=$port;dbname=$database",$ten , $mk);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
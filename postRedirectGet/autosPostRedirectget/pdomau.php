<?php
$tennhap = "quangthong";
$mk = 'hibi';
$host = 'localhost';
$port = 3306;
$tendulieu = 'khoahoc';

$maupdo = new PDO("mysql:host=$host;port=$port;dbname=$tendulieu", $tennhap,$mk);
$maupdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

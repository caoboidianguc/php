<?php 
$host = "127.0.0.1"; //windows: localhost
$port = 8889; 
$database = "misctuandau";
$mk = "hibi";
$ten = "quang";

$pdo = new PDO("mysql:host=$host;port=$port;dbname=$database",$ten , $mk);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// cac chuc nang phu

function validatePosi() {
    for ($i=1; $i <=9; $i++){
        if ( ! isset($_POST['nam'.$i]) ) continue;
        if ( ! isset($_POST['chitiet'.$i]) ) continue;
        $year = $_POST['nam'.$i];
        $desc = $_POST['chitiet'.$i];
        if ( strlen($year) == 0 || strlen($desc) == 0 ) {
            return "Khung Position  va year can duoc dien! ";
        }
        if ( ! is_numeric($year) ) {
            return "Khung Year phai la so";
        }
    }
    return true;
}

function dienO (){
    if (strlen($_POST['ten']) < 1 || strlen($_POST['tenho']) < 1 || strlen($_POST['mail']) < 1
    || strlen($_POST['head']) < 1 || strlen($_POST['sum']) < 1 ){
        return "Tất cả các ô cần phải điền !";
    } else {
        if (strpos($_POST['mail'], "@") === false){
            return "Email phải có @ !";
        }
    }
    return true;
}


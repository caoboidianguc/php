<?php
require "pdomau.php";
$state = $pdo->prepare('select name from institution where name like :prefix');
$state->execute(array(":prefix" => $_REQUEST['term'].'%'));

$retriveData = array();
while ($row = $state->fetch(PDO::FETCH_ASSOC)){
    $retriveData[] = $row['name'];
}

echo(json_encode($retriveData, JSON_PRETTY_PRINT));



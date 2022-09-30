<?php
session_start();
//sleep(3);
header('content-type: application/json; charset=utf-8');
if ( ! isset($_SESSION['chat'])) $_SESSION['chat'] = array();
echo (json_encode($_SESSION['chat']));


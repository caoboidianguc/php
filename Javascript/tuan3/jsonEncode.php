<?php
sleep(1);
header('content-type: application/json; charset=utf-8');
$lungtung = array('muc1' => 'dau tien',
'muc2' => 'hai la day',
'muc3' => 'muc ba chua nghi den');

echo (json_encode($lungtung));

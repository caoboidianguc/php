<?php
require_once "pdomau.php";
$lenh = $maupdo->query('select * from hocsinh order by namhoc');
echo ('<ul>'.'<br>') ;
while ($row = $lenh->fetch(PDO::FETCH_ASSOC)){
    echo '<li>';
    echo ($row['hoten']." | ".$row['gioitinh']." | ".$row['nghanh']." | ".$row['namhoc']);
    echo '</li>'. '<br>';
} 


echo ('</ul>');
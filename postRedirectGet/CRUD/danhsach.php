<?php
require_once "pdomau.php";
$lenh = $maupdo->query('select * from hocsinh order by namhoc desc');
echo ('<ul>'.'<br>') ;
echo ('<b><li> Ho Ten - Gioi tinh - Nghanh - Nam Hoc </li></b> <br>');
while ($row = $lenh->fetch(PDO::FETCH_ASSOC)){
    echo '<li>';
    echo ($row['hoten']." | ".$row['gioitinh']." | ".$row['nghanh']." | ".$row['namhoc']);
    echo (" - "."<a href='sua.php?hs_id=".$row['hs_id']."'> Sua</a> ");
    echo (" - "."<a href='xoa.php?hs_id=".$row['hs_id']."'> Xoa</a> ");
    echo '</li>'. '<br>';
} 


echo ('</ul>');

<?php
#vi da required maupdo.php ben autos len khong can yeu cau ben nay
 
$caulenh = $maupdo->query("select * from autos order by make");
echo "<ol>"."<br>";
while ($row = $caulenh->fetch(PDO::FETCH_ASSOC)){
    echo ("<li>");
    echo ($row['make']. "  ".$row['year']. " / ".$row['mileage']);
    echo ('</li>');
    echo ("<br>");

}
echo "</ol>";
<?php 
echo "<pre><br>";
require_once "maupdo.php";
$statement = $mauPDO->query("select * from users");

echo "<table border='1'>". "<br>";
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr><td>";
    echo ($row['name']);
    echo ("</td><td>");
    echo ($row['email']);
    echo ("</td><td>");
    echo ($row['password']);
    echo "</td></tr>";
}
echo "</pre><br>";

echo "</table> <br>";

?>

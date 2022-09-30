<?php 

require_once "pdomau.php";

$sql = "select * from profile where user_id = :uid"; //Trung bay thong tin chi co nguoi dung nay them vao
$state = $pdo->prepare($sql);
$state->execute(array(
    ":uid" => $_SESSION['user_id']
));
echo "<table style='width:70%'>";
echo "<tr> <th>Ho Ten </th> <th>Loi Dau </th> <th>Hanh Dong </th> </tr>";
while ($row = $state->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
    echo ("<td>");

    echo ("<a href='view.php?profile_id=".$row['profile_id']."'>");
    echo (htmlentities($row['first_name']));
    echo (htmlentities($row['last_name']));
    echo ("</a>");

    echo ("</td>");
    echo ("<td>".htmlentities($row['headline'])."</td>");
    echo ("<td><a href='edit.php?profile_id=".$row['profile_id']."'>Sua</a>");
    echo (" <a href='delete.php?profile_id=".$row['profile_id']."'>Xoa</a> </td>");
    echo "</tr>";
}

echo "</table>";

/*
echo "<table style='width:70%'>";
echo "<tr> <th>Ho Ten </th> <th>Loi Dau </th> <th>Hanh Dong </th> </tr>";
while ($row = $state->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
    
    echo ("<td>".htmlentities($row['first_name'])." " .htmlentities($row['last_name'])."</td>");
    
    echo ("<td>".htmlentities($row['headline'])."</td>");
    echo ("<td><a href='edit.php?profile_id=".$row['profile_id']."'>Sua</a>");
    echo (" <a href='delete.php?profile_id=".$row['profile_id']."'>Xoa</a> </td>");
    echo "</tr>";
}

echo "</table>";
*/
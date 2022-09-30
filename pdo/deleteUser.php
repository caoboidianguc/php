<!--the Modle-->
<?php 
require_once "maupdo.php";
if (isset($_POST['id_nao']) && isset($_POST['xoaVoiId'])) {
    $sql = "Delete from users where user_id = :layid";
    $stmt = $mauPDO->prepare($sql);
    $stmt->execute(array(":layid" => $_POST['id_nao']));
}

?>


<!--the View -->
<!doctype html>
<html>
<head>
<title>Xoa Nguoi Dung</title></head>
<body>
    <h1>Xoa Nguoi Dung O Trang Nay</h1>
<a href="deleteUser.php">Lam Moi Lai</a>
<br><br>
<a href="dangki.php">Trang Dang Ki</a>
<!--can hien thi thong tin da xoa -->
<form method="post">
<p>ID Can Xoa: 
<input type="text" name="id_nao"></p>
<input type="submit" value="Xoa Ngay">

</form>
<table border="1">
<?php
$stmt=$mauPDO->query("select name, email, password, user_id from users");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr><td>";
    echo ($row['name']);
    echo ("</td><td>");
    echo ($row['email']);
    echo ("</td><td>");
    echo ($row['password']);
    echo ("</td><td>");

    
    echo('<form method="post"><input type= "hidden" ');
    echo ('name="id_nao" value="'.$row['user_id'].'" >'."<br>");
    echo ('<input type="submit" value="Xoa" name="xoaVoiId"> ');
    echo("<br></form><br>");

    echo "</td></tr>";
}
echo "</pre><br>";



?>
</table> <br>"





</body>

</html>
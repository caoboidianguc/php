<?php 
$md5 = "Chua Duoc Ma Hoa!";
if (isset($_GET['mabam'])){
    $md5 = hash("md5", $_GET['mabam']);
}
?>


<!DOCTYPE html>
<html>
<title>Ma hoa md5</title>
<body>
<h2>Ma Hoa Ki Tu</h2>
<p>
    MD5: <?= htmlentities($md5)?>
</p>
<form>
    Nhap Ki Tu Vao :
    <input type="text" name="mabam" size="50"><br><br>
    <input type="submit" value="Ma Hoa MD5">
</form>
<p>
    <a href="giaimaBam.php">Lam Moi Trang</a>
</p>




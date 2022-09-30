<?php session_start(); ?>

<!doctype html>
<html>
<head>
<title>
Dang ki thong tin</title></head>
<body>
<!-- chua dang nhap -->
    <?php if ( ! isset($_SESSION['name'])){?>
        <h1>
    Hibi - Vai net thong tin </h1><br><br>
    <a href="login.php">Please Log In</a><br><br> <?php } else {?>

<!--Dang nhap -->
          
<h1>HiBi Vu chao <?= $_SESSION['name'] ?></h1>
<?php if (isset($_SESSION['thongbao'])){
    echo ('<p style="color:green; text-indent:50px">' .$_SESSION['thongbao']. '</p>');
    unset($_SESSION['thongbao']);
} 
if (isset($_SESSION['error'])){
    echo ("<p style='color:red; text-indent:40px'><b>" .$_SESSION['error']."</b></p>");
    unset($_SESSION['error']);
} 
?>
        <a href="add.php">Them Nguoi moi</a><br><br>
   
<a href="logout.php">Thoat Khoi Tai Khoan</a><br><br>


<?php require_once "danhsach.php";

} ?>


</body>
</html>
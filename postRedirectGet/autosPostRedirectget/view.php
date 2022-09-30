<?php
session_start();

if (! isset($_SESSION['ten'])){
    die('Bạn cần đăng nhập trước đã!!!');
} else { ?>

<!doctype html>
<html>
<head>
<title>du lieu</title></head>
<body>
    <?php } ?>

<?php $ten = isset($_SESSION['ten']) ? $_SESSION['ten'] : " "; ?>

    <header><h1> Tracking Khóa Học Với <?php echo $ten ?> </h1></header>
    <?php if (isset($_SESSION['chaomung'])){
        echo ('<p style="color:green; text-indent:40px"><b>'.$_SESSION['chaomung'].'</b></p>');
        unset($_SESSION['chaomung']);
    } 
    if (isset($_SESSION['tinnhan'])){
        echo('<p style="color:green ; text-indent:70px">' .$_SESSION['tinnhan'].'</p>');
        unset($_SESSION['tinnhan']);
    } 
    ?>
    <h3>Sinh Viên</h3>

    <a href="add.php">Add New</a><span> | </span>
    <a href="logout.php"> Logout </a><br><br>

<?php require 'danhsach.php'; ?>
</body>
</html>
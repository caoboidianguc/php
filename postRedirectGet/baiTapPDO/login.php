<?php 
if (isset($_POST['cancel'])){
    header('location: index.php');
}
$chu_y = false;
$mk = '803eeed18c8f96b2a5002938cacd46b6';
$salt = 'AnBi-1';

if (isset($_POST['ten']) && isset($_POST['matkhau'])){
    if (strlen($_POST['ten']) < 1 || strlen($_POST['matkhau'])<1){
        $chu_y = 'Thieu Ten Dang Nhap Hoac Mat Khau!!!';
    }
    else {
        $kiemtra = hash('md5',$salt.$_POST['matkhau']);
        if($kiemtra == $mk){
            header('location: autos.php?ten='.urlencode($_POST['ten']));
            error_log("Dang Nhap thanh cong".$_POST['ten']);
        } else{
            $chu_y = 'Mat Khau khong dung!';
            error_log("Login fail".$_POST['ten']."$kiemtra");
        }
    }
}
?>


<!doctype html>
<html>
<head><title>
TQV-Trang Dang Nhap</title></head>
<body>
    <h1>Please Log In</h1>
    <?php if ($chu_y !== false){
        echo ('<p style="color:red ; text-indent:30px ;"><b>'.htmlentities($chu_y).'</b></p>');
    } ?>
<p>
<form method='post'>
User Name <input type="email" name="ten" size="40"><br><br>
Password <input type="password" name="matkhau" size="40"><br><br>
<input type="submit" value="Log In">
<input type="submit" value="Cancel" name="cancel">

</form>
</p>

</body>

</html>
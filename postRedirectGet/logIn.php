<?php session_start();?>
<?php
$bimat = 'hibi';
if (isset($_POST['ten']) && isset($_POST['mk'])){
    unset($_SESSION['ten']); //xoa tài khoản trước đó, nếu có
    if( $_POST['mk'] == $bimat ){
        $_SESSION['ten'] = $_POST['ten'];
        $_SESSION['chaomung'] = "Da Dang Nhap";
        header("location: trangUngDung.php");
        return;
    } else {
        $_SESSION['error'] = "Mat khau khong dung!";
        header("location: logIn.php"); //ko dc có khoảng trắng giữa location và dấu :
        return;
    }
}

?>

<!doctype html>
<html>
<head>
<title>
Mã đăng nhập
</title></head>
<header>
<h1>Please Log In </h1>
</header>
<?php if (isset($_SESSION['error'])) {
    echo ('<p style="color:red"> <strong>'.$_SESSION['error'].'</strong></p>');
    unset($_SESSION['error']);
}
?>
<body>

<form method="POST">

<label for="taikhoan"> Account : </label>
<input type="text" name="ten" placeholder="Nhap ten tai khoan" size="40" id="taikhoan"><br><br>

<label for="pass">Password : </label>
<input type="password" id="pass" name="mk" size="40"> <br><br>

<input type="submit" value="Dang Nhap">
<a href="trangUngDung.php"> --Huy-- </a>
</form>









</body>

</html>
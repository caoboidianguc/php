<?php
session_start();

if (isset($_POST['huy'])){
    header('location: logout.php');
    return; //neu ko logout thi doan ma nay ko hoat dong
}

$mk = '803eeed18c8f96b2a5002938cacd46b6';
$salt = 'AnBi-1';
if (isset($_POST['ten']) && isset($_POST['mk'])){
    unset($_SESSION['ten']);
    
    if (strpos($_POST['ten'],"@") === false ){
        $_SESSION['error'] = 'Email must have an at-sign (@)';
        header('location: login.php');
        return; //neu khong co return o day, dong code tiep tuc chay dong tiep theo va van dang nhap neu mk dung.
    }
    $kiemtra = hash('md5',$salt.$_POST['mk']);
    if ($kiemtra == $mk){
        $_SESSION['ten'] = $_POST['ten'];
        $_SESSION['chaomung'] = 'Dang nhap thanh cong';
        header("location: view.php");
        return;
    } else {
        $_SESSION['error'] = 'Mat khau khong dung!';
        header('location: login.php');
        return;
    }

}

?>


<!doctype html>
<html>
    <head> <title>
        Dang nhap
    </title></head>
    <body>
        <header>
            <h1>
                Please Log In
            </h1>
        </header>
        <?php if (isset($_SESSION['error'])){
            echo("<p style='color:red; text-indent:40px'><b>".htmlentities($_SESSION['error']).'</b></p>');
            unset($_SESSION['error']);
        } ?>

        <form method="post">
            <label for="k1">User Name </label>
            <input type="text" id="k1" name="ten", size="40" placeholder="Email cua ban" autofocus> <br><br>
            <label for="k2">Password </label>
            <input type="password" id="k2" name="mk" size="40"><br><br>
            <input type="submit" value=" Log In ">
            <input type="submit" name="huy" value=" Cancel ">
        </form><br><br>

        <div>
            Trang đăng nhập với mật khẩu <strong>"eight i be i"</strong>.
        </div>
    </body>
</html>
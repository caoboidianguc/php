<?php 
if(isset($_POST['cancel'])) {
    header("location: index.php");
}

$tinnhan = false;
$salt = 'AaZz-1';
$mauBam = 'fe10985bf72e0837b71b8800689dc44a'; //$salt.but

if (isset($_POST['ai']) && isset($_POST['matkhau'])) {
    if (strlen($_POST['ai']) < 1 || strlen($_POST['matkhau']) < 1){
        $tinnhan = "Vui Long Nhap Ten Hoac Mat Khau";
    } else {
        $kiemtra = hash('md5', $salt.$_POST['matkhau']);
        if ($kiemtra == $mauBam) {
            header("Location: choi.php?ten=".urlencode($_POST['ai']));
        } else {
            $tinnhan = 'Mat khau khong dung!';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Trang Dang Nhap</title>
</head>
<body>
    <h2>Vui Long Dang Nhap</h2>

    <?php if ($tinnhan !== false){
        echo('<p style="color: red; text-indent: 20px;">'.htmlentities($tinnhan)."</p>");
    } ?>

    <form method="POST">
    <label for="nguoichoi">Nhap Ten:</label>
    <input type="text" id="nguoichoi" name="ai" size=30><br><br>
    <label for="mk">Mat Khau:</label>
    <input type="password" id="mk" name="matkhau" size="30"><br><br>
    <input type="submit" value="Dang Nhap">
    <input type="submit" value="Huy" name="cancel">
    
    </form>

<footer><p>Quang Tap Lam Web</p>
    <p><a href="dangnhap.php">Lam Moi Trang</a>
</p>
</footer>
</body>

</html>
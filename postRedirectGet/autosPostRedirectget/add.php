<?php 
session_start();

if ( ! isset($_SESSION['ten'])){
    die('Ban Can Dang Nhap Truoc da!');
} else{ ?>

<?php 

 if (isset($_POST['huy'])){
    header('location: view.php');
} 
require_once 'pdomau.php';

if (isset($_POST['hoten']) && isset($_POST['nam']) && 
isset($_POST['gt']) && isset($_POST['nghanh'])) {
    if(strlen($_POST['hoten']) < 1 && strlen($_POST['nghanh']) < 1 ){
        $_SESSION['canhbao'] = "Yeu cau ho ten va Nghanh hoc.";
    } else{
        $sql = "insert into hocsinh (hoten, namhoc, gioitinh, nghanh) values (:ht, :nh, :gt, :ng )";
        $chuanbi = $maupdo->prepare($sql);
        try { $chuanbi->execute(array(
            ":ht"=>$_POST['hoten'],
            ":nh"=>$_POST['nam'],
            ":gt"=>$_POST['gt'],
            ":ng"=>$_POST['nghanh']));
            $_SESSION['tinnhan'] = "Da them thong tin.";
            header("location:view.php");
        } catch (Exception $ex) {
            echo('Loi he thong, hay lien he ho tro 800 262 8775');
            error_log("error4.php, SQL error=".$ex->getMessage());
            return;
        }
    }
}
?>

<!doctype html>
<html>
<head>
<title>them thong tin</title></head>
<body>
    <header><h1>
    Tracking Sinh Vien Voi <?php echo ($_SESSION['ten']); ?>
    </h1></header> 

<?php } ?> <!--duoi cua else phan tren -->

<form method='post'>
<label for="kh1">Ho Ten : </label>
<input type="text" id="kh1" name="hoten" size="40" autofocus placeholder="Ten day du"><br><br>
<label for="kh2">Nam Hoc : </label>
<input type="number" min='1990' max="2022" name="nam" id="kh2"><br>

<p> Gioi Tinh : <br>
<input type="radio" name="gt" value="Nam">Nam <br>
<input type="radio" name="gt" value="Nua Nam">Nửa Nam <br>
<input type="radio" name="gt" value="Nu">Nữ <br>
<input type="radio" name="gt" value="Nua Nu">Nửa Nữ <br>
</p>

<label for="khu3">Nghanh hoc : </label>
<input type="text" id="khu3" name="nghanh" size="40"><br><br>

<input type="submit" value="Them">
<input type="submit" value="Cancel" name="huy">

</form>



</body>

</html>
<?php session_start();
require_once "pdomau.php";
if (isset($_POST['huy'])){
    header("location: xem.php");
    return;
}
if ( isset($_POST['hoten']) && isset($_POST['nam']) && isset($_POST['gt']) && isset($_POST['nghanh']) ) {

    $sql = "UPDATE hocsinh SET hoten = :ht, namhoc = :na, gioitinh = :gt, nghanh = :ng WHERE hs_id = :hs";
    $chuanbi = $maupdo->prepare($sql);
        try { $chuanbi->execute(array(
            ":ht" => $_POST['hoten'],
            ":na" => $_POST['nam'],
            ":gt" => $_POST['gt'],
            ":ng" => $_POST['nghanh'],
            ":hs" => $_POST['hsid']));
            $_SESSION['tinnhan'] = "Thong Tin Da Duoc Sua Lai";
            header("location: xem.php");
            return;
        } catch (Exception $ex) {
            echo('Loi he thong, hay lien he ho tro 800 262 8775');
            error_log("error4.php, SQL error=".$ex->getMessage());
            return;
        }
    
}
?>

<!doctype html>
<html>
<head>
<title>Sua Thong tin</title></head>
<body>
    <header><h1>Sua Thong Tin</h1></header>
<?php 
$chuanbi = $maupdo->prepare("select * from hocsinh where hs_id = :hs");
$chuanbi->execute(array(":hs"=> $_GET['hs_id']));
$row = $chuanbi->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
    $_SESSION['error'] = "Khong tim thay thong tin !";
    header("location: xem.php");
    return;
}
$ten = htmlentities($row['hoten']);
$nam = htmlentities($row['namhoc']);
$gioit = htmlentities($row['gioitinh']);
$ngh = htmlentities($row['nghanh']);
$idhs = $row['hs_id'];

?>
    <form method='post'>
<label for="ten">Ho Ten : </label>
<input type="text" id="ten" name="hoten" size="40" value="<?php echo ($ten); ?>"><br><br>
<label for="kh2">Nam Hoc : </label>
<input type="number" name="nam" id="kh2" value="<?= $nam ?>"><br>

<p> Gioi Tinh : <br>
<input type="radio" name="gt" checked><?= $gioit ?> da duoc chon<br><br><br>
<input type="radio" name="gt" value="Nam">Nam <br>
<input type="radio" name="gt" value="Nua Nam">Nửa Nam <br>
<input type="radio" name="gt" value="Nu">Nữ <br>
<input type="radio" name="gt" value="Nua Nu">Nửa Nữ <br>
</p>

<label for="khu3">Nghanh hoc : </label>
<input type="text" id="khu3" name="nghanh" size="40" value="<?php echo $ngh ?>"><br><br>

<input type="hidden" name="hsid" value="<?= $idhs ?>">
<input type="submit" value="Sua">
<input type="submit" value="Cancel" name="huy">

</form>


</body>
</html>
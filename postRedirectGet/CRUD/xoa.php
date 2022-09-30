<?php session_start();
require_once "pdomau.php";
if(isset($_POST['cancel'])){
    header("location: xem.php");
}
if (isset($_POST['xoa']) && isset($_POST['hsid'])){
    $sql = "delete from hocsinh where hs_id = :id";
    $chuabi = $maupdo->prepare($sql);
    $chuabi->execute(array(":id" => $_POST['hsid']));
    $_SESSION['tinnhan'] = "Da Xoa Thong tin";
    header("location: xem.php");
    return;
}

?>
 
<!doctype html>
<html>
<head><title>Xoa ten</title></head>
<body>
    <header><h1>Ban chac chan muon xoa</h1></header>
    <?php
    $sql = "select hoten, hs_id from hocsinh where hs_id = :hs";
    $chenma = $maupdo->prepare($sql);
    $chenma->execute(array(":hs" => $_GET['hs_id']));
    $row = $chenma->fetch(PDO::FETCH_ASSOC);
    if ($row === false) {
        $_SESSION['error'] = "Khong tim thay thong tin";
        header("location: xem.php");
        return;
    }
    $id = $row['hs_id'];
    ?>
    <p>Xac nhan xoa :<?php echo(htmlentities($row['hoten'])); ?>
    <form method="post">
        <input type="hidden" name="hsid" value="<?= $id ?>">
        <input type="submit" value="Xoa Ngay" name="xoa">
        <input type="submit" name="cancel" value="Huy">
    </form>

    </p>
</body>
</html>
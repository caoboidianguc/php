<?php 
session_start();
if (isset($_POST['huy'])){
    header("location: index.php");
    return;
}
require_once "pdomau.php";

if (isset($_POST['xoa']) && isset($_POST['proid'])){
    $sql = "delete from profile where profile_id = :pro";
    $chuanbi = $pdo->prepare($sql);
    $chuanbi->execute(array(":pro" => $_POST['proid']));
    $_SESSION['thongbao'] = "Da xoa ho so";
    header("location: index.php");
    return;
}
?>

<!doctype html>
<html>
    <head>
        <title>
            Xoa Thong tin.
        </title>
    </head>
    <body>
        <h1>Xoa Ho So </h1>
<?php $laytt = $pdo->prepare("select first_name, last_name, profile_id from profile where profile_id = :id");
$laytt->execute(array(":id" => $_GET['profile_id']));
$row = $laytt->fetch(PDO::FETCH_ASSOC);
if($row === false){
    $_SESSION['error'] = "khong co thong tin";
    header("location: index.php");
    return;
}
$proid = $row['profile_id'];
$ten = $row['first_name'];
$ho = $row['last_name'];
?>
<p>
    First Name : <?= $ten ?> <br>
</p>
<p>Last Name : <?= $ho ?></p><br>
        <form method="post">
            <input type="submit" value="Xoa Ngay" name="xoa">
            <input type="submit" value="Khong Xoa" name="huy">
            <input type="hidden" name="proid" value="<?= $proid ?>">
        </form>
    </body>
</html>

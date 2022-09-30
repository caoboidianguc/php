<?php session_start();
if ( ! isset($_SESSION['name'])){
    die("Khong The Truy Cap!");
}
require_once "pdomau.php";

if (isset($_GET['xong'])){
    header("location: index.php");
    return;
}
?>

<!doctype html>
<html>
    <title>Xem Thong Tin</title>
    <body>
        <h1>Xem Thong Tin Ho So Hoan Chinh</h1>
        <?php $chuanbi = $pdo->prepare("select * from profile where profile_id = :pro ");
        $chuanbi->execute(array(":pro" => $_GET['profile_id']));
        $row = $chuanbi->fetch(PDO::FETCH_ASSOC);
if ($row === false){
    header("location: index.php");
    return;
    }

$tengoi = htmlentities($row['first_name']);
$ho = htmlentities($row['last_name']);
$mail = htmlentities($row['email']);
$hea = htmlentities($row['headline']);
$su = htmlentities($row['summary']);
        ?>
        <p>First Name :<?=$tengoi ?></p>
        <p>Last Name :<?=$ho ?></p>
        <p>Email :<?=$mail ?></p>
        <p>Headline : <br><?=$hea ?></p>
        <p>Summary : <br><?=$su ?></p> <br>
        <form method="get">
            <input type="submit" value="Xem Xong" name="done">
        </form>
    </body>
</html>
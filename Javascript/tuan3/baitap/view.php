<?php session_start();
if ( ! isset($_SESSION['name'])){
    die("Khong The Truy Cap!");
}
require_once "pdomau.php";

if (isset($_GET['done'])){
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
//lay du lieu cho position
$lenh = $pdo->prepare("select * from position where profile_id = :pro");
$lenh->execute(array(":pro" => $_GET['profile_id']));
//lay du lieu cho education
$lenhEdu = $pdo->prepare('select education.year, institution.name from education join institution
                        on education.institution_id = institution.institution_id 
                        where education.profile_id = :pro');
$lenhEdu->execute(array(':pro' => $_GET['profile_id']));

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
<p>Summary : <br><?=$su ?></p>
<p>Position: </p>
<?php echo('<ul>');
while ($lietke = $lenh->fetch(PDO::FETCH_ASSOC)){
    echo ('<li>');
    echo ($lietke['year'].': ');
    echo ($lietke['description']);
    echo ('</li>');
    } 
echo ('</ul>'); ?>
<p>
    Education :
</p>
<?php echo('<ul>');
while ($dsach = $lenhEdu->fetch(PDO::FETCH_ASSOC)){
    echo ('<li>');
    echo ($dsach['year'].': ');
    echo ($dsach['name']);
    echo ('</li>');
    } 
echo ('</ul>'); ?>
<br>
<form method="get">
<input type="submit" value="Xem Xong" name="done">
</form>

</body>
</html>
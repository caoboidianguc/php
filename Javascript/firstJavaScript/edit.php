<?php session_start();

if ( ! isset($_SESSION['name'])){
    die("Khong The Truy Cap!");
}
if (isset($_POST['huy'])){
    header("location: index.php");
    return;
}
require_once "pdomau.php";

if (isset($_POST['ten']) && isset($_POST['tenho'])
&& isset($_POST['mail']) && isset($_POST['head']) && isset($_POST['sum']) && isset($_POST['proid'])){
    if (strlen($_POST['ten']) < 1 || strlen($_POST['tenho']) < 1 || strlen($_POST['mail']) < 1
    || strlen($_POST['head']) < 1 || strlen($_POST['sum']) < 1 ) {
        $_SESSION['error'] = "Tat ca O trong can phai dien";
        header("location: edit.php?profile_id=" . $_GET['profile_id']);
        return;
    } else {
        if (strpos($_POST['mail'], "@") === false){
            $_SESSION['error'] = "Email phai co ki hieu @ !";
            header("location: edit.php?profile_id=" . $_GET['profile_id']);
            return;
        }
        $sql = "update profile set first_name = :fir, 
        last_name = :las, email = :ema, headline = :hea, summary = :summ where profile_id = :pro";
        $state = $pdo->prepare($sql);
        try { $state->execute(array(
            ":fir" => $_POST['ten'],
            ":las" => $_POST['tenho'],
            ":ema" => $_POST['mail'],
            ":hea" => $_POST['head'],
            ":summ" => $_POST['sum'],
            ":pro" => $_POST['proid']
        ));
        $_SESSION['thongbao'] = "Thong Tin Da Sua Lai !";
        header("location: index.php");
        return; 
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
        <title>
            Sua Ho So
        </title>
    </head>
<?php
 $codelay = "select * from profile where profile_id = :pro";
$stamt = $pdo->prepare($codelay);
$stamt->execute(array(":pro" => $_GET['profile_id'] ));
$row = $stamt->fetch(PDO::FETCH_ASSOC);
if ($row === false){
    $_SESSION['error'] = "Khong co thong tin";
    header("location: index.php");
    return;
    }

$tengoi = htmlentities($row['first_name']);
$ho = htmlentities($row['last_name']);
$mail = htmlentities($row['email']);
$hea = htmlentities($row['headline']);
$su = htmlentities($row['summary']);
$id = $row['profile_id'];
    ?>
    <body>
        <header><h1>
        Sua Ho So Tu <?= $_SESSION['name'] ?>
        </h1></header>
        <?php if (isset($_SESSION['error'])){
        echo ("<p style='color:red; text-indent:40px'><b>" .$_SESSION['error']."</b></p>");
        unset($_SESSION['error']);
    } ?>
        <form method="post">
        <p>
            First Name :
            <input type="text" name="ten" size="50" value="<?= $tengoi ?>">
        </p>
        <p>
            Last Name :
            <input type="text" name="tenho" size="50" value="<?= $ho ?>">
        </p>
        <p>
            Email : <!--type="email"  la tot nhat-->
            <input type="text" name="mail" size="50" value="<?= $mail ?>">
        </p>
        <p>
            Headline : <br>
            <input type="text" name="head" size="80" value="<?= $hea ?>">
        </p>
        <p>
            Summary : <br>
            <textarea name="sum" cols="80" rows="10"><?= $su ?></textarea>
        </p> <br>
        <input type="submit" value="Sua Lai">
        <input type="submit" name="huy" value="Huy Bo">
        <input type="hidden" name="proid" value="<?= $id ?>">
    </form>
    </body>
</html>
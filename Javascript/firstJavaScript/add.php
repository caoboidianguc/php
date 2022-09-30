<?php session_start();

if ( ! isset($_SESSION['name'])){
    die("Ban Phai Dang Nhap Truoc Da.");
}
if (isset($_POST['huy'])){
    header("location: index.php");
    return;
}
require_once "pdomau.php";

if (isset($_POST['ten']) && isset($_POST['tenho'])
&& isset($_POST['mail']) && isset($_POST['head']) && isset($_POST['sum'])){
    if (strlen($_POST['ten']) < 1 || strlen($_POST['tenho']) < 1 || strlen($_POST['mail']) < 1
    || strlen($_POST['head']) < 1 || strlen($_POST['sum']) < 1 ) {
        $_SESSION['error'] = "Tat ca O trong can phai dien";
        header("location: add.php");
        return;
    } else {
        if (strpos($_POST['mail'], "@") === false){
            $_SESSION['error'] = "Email phai co ki hieu @ !";
            header("location: add.php");
            return;
        }
        //logic here
        $sql = "insert into profile (user_id, first_name, last_name, email, headline, summary)
         values ( :uid, :fir, :las, :ema, :hea, :sum )";
        $state = $pdo->prepare($sql);
        $state->execute(array(
            ":uid" => $_SESSION['user_id'],
            ":fir" => $_POST['ten'],
            ":las" => $_POST['tenho'],
            ":ema" => $_POST['mail'],
            ":hea" => $_POST['head'],
            ":sum" => $_POST['sum']
        ));
        $_SESSION['thongbao'] = "Da them vao ho so";
        header("location: index.php");
        return;
    }
    

} 

?>

<!DOCTYPE html>
<html>
<head>
<title>
Them nguoi dung</title></head>
<body>
    <header><h1>Them Ho So Tu <?= $_SESSION['name'] ?></h1></header>
    <?php if (isset($_SESSION['error'])) {
        echo ('<p style="color:red; text-indent:50px">'.$_SESSION['error']. "</p>");
        unset($_SESSION['error']);
    } ?>
    <form method="post">
        <p>
            First Name :
            <input type="text" name="ten" size="50" autofocus placeholder="Ten goi">
        </p>
        <p>
            Last Name :
            <input type="text" name="tenho" size="50" placeholder="Ten Ho">
        </p>
        <p>
            Email : <!--type="email"  la tot nhat-->
            <input type="text" name="mail" size="50" placeholder="Dia chi thu dien tu">
        </p>
        <p>
            Headline : <br>
            <input type="text" name="head" size="80">
        </p>
        <p>
            Summary : <br>
            <textarea name="sum" cols="80" rows="10"></textarea>
        </p> <br>
        <input type="submit" value="Them">
        <input type="submit" name="huy" value="Huy Bo">
    </form>
</body>

</html>
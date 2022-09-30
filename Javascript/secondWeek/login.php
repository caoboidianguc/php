<?php session_start();

if (isset($_POST['huy'])) {
    header("location: index.php");
    return;
}

$salt = 'AnBi-1';
require_once "pdomau.php";

if (isset($_POST['mail']) && isset($_POST['mk'])){

    if (strpos($_POST['mail'],'@') === false){
        $_SESSION['error'] = "Email chua hoan chinh";
        header("location: login.php");
        return;
    }
    $ktra = hash("md5",$salt.$_POST['mk']);
    $stmt = $pdo->prepare("select user_id, name from users where email = :em and password = :pw");
    $stmt->execute(array(":em" => $_POST['mail'],
                        ":pw" => $ktra));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row !== false){
        $_SESSION['name'] = $row['name'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['thongbao'] = "Da Dang Nhap !";
        header("location: index.php");
        return;
    } else {
        $_SESSION['error'] = "Mat Khau khong dung!";
        header("location: login.php");
        return;
    }

} 

?>

<!doctype html>
<html>
<head>
<title>Dang nhap</title></head>
<body>
    <header><h1>Dang Nhap Thong Tin</h1></header><br>
    <?php if (isset($_SESSION['error'])){
        echo ("<p style='color:red; text-indent:40px'><b>" .$_SESSION['error']."</b></p>");
        unset($_SESSION['error']);
    } ?>
    <form method="post">
    <p> Email :
    <input type="text" name="mail" size="40" autofocus  id="iddn"><br>
    </p>

    <p> Password :
    <input type="password" name="mk" size="40" id="idmk"><br><br>
    </p>
    
    <input type="submit" value="Dang Nhap" onclick="return nhacnho();">
    <input type="submit" value="Thoat" name="huy"> <br><br>
    
    </form>
<script type="text/javascript">
function nhacnho(){
    console.log('chuan bi nhac...');
    try {
        mk = document.getElementById("idmk").value;
        mail = document.getElementById("iddn").value;
        if (mk== null || mk == "" || mail == null || mail == ""){
            alert("Cả hai ô trống đều cần điền !");
            return false;
        }
        if( mail.indexOf('@') == -1) {
            alert("Email chưa đúng");
            return false;
        } return true;
    } catch { //(e) bi bo di, catch(e)
        return false;
    } return false;
}
</script>
</body>
</html>
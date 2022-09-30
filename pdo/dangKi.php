<?php 
require_once "maupdo.php";
if (isset($_POST['ten']) && isset($_POST['thudientu']) && isset($_POST['mk'])) {
    $sql = "insert into users (name, email, password) values (:nam, :ema, :pas)";
    echo("<pre><br>".$sql."<br></pre><br>");
    $statement = $mauPDO->prepare($sql);
    $statement->execute(array(
        ':nam' => $_POST['ten'],
        ':ema' => $_POST['thudientu'],
        ':pas' => $_POST['mk']
    ));


}



?>

<!Doctype html>
<html>
<head>
<title>Trang Dang Ki</title>
</head>
<body>
    <h2>Them Nguoi Dung!</h2>
    <a href="dangki.php" >Lam moi trang</a>
    
    <form method="post">
    <p>Ten: <input type="text" name = "ten" size="40">
    </p>
    <p>Email: <input type="text" name="thudientu" size='40'>
    </p>
    <p>Mat Khau: <input type="password" name="mk" size='40'>
    </p>
    <p><input type="submit" value="Them Moi">
    </p>
    </form>

<?php
require_once "chayThuPDO.php";?>






</body>
</html>

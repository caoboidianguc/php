<?php

if ( ! isset($_GET['ten']) || strlen($_GET['ten']) < 1 ) {
    die('Ban chua dang nhap');
}
if (isset($_POST['thoat']) ) {
    header("location: index.php");
    return;
}
$name = array("Da","Giay","Keo");
$nguoichoi = isset($_POST["nguoi"]) ? $_POST['nguoi']+0 : -1;
$maytinh = 0;
$maytinh = rand(0,2);

function check($nguoichoi, $maytinh) {
    if ( $nguoichoi == 0 && $maytinh == 0 || $nguoichoi == 1 && $maytinh == 1 || $nguoichoi == 2 && $maytinh == 2) {
        return "Hue lang";
    } else if ( $nguoichoi == 1 && $maytinh == 0 || $nguoichoi == 2 && $maytinh == 1 || $nguoichoi == 0 && $maytinh == 2) {
        return "Ban Thang";
    } else if ( $nguoichoi == 2 && $maytinh == 0 || $nguoichoi == 1 && $maytinh == 2 || $nguoichoi == 0 && $maytinh == 1) {
        return "Thua nhe ku";
    }
    return false;
}

$ketqua = check($nguoichoi, $maytinh);

?>

<!Doctype html>
<html>
    <head>
        <title>Choi Da-Giay-Keo</title>
    </head>
<body>
    <h1>-->Da vs Giay vs Keo --></h1>
    <?php
    if (isset($_REQUEST['ten'])) {
        echo '<p>Chao Ban: ';
        echo htmlentities($_REQUEST['ten']);
        echo '</p>';
    }
    ?>
    <form method="POST">
    <select name="nguoi">
    <option value="-1">---Xin Chon The---</option>
    <option value="0">Da</option>
    <option value="1">Giay</option>
    <option value="2">Keo</option>
    <option value="3">Kiem Tra</option>
    </select>
    <input type="submit" value="Choi">
    <input type="submit" name="thoat" value="Thoat">
    
    
    </form>
<?php 
if ($nguoichoi == -1) {
    echo "Vui Long chon dai dien.";
} else if ($nguoichoi == 3) {
    for ($n = 0; $n<3; $n++) {
        for ($m=0; $m>3; $m++) {
            $kt = check($n,$m);
            print "Nguoi choi: $name[$n] May Tinh: $name[$m] Ket Qua: $kt";
        }

    }
}
else {
    print "Ban chon: $name[$nguoichoi] <br> May tinh chon: $name[$maytinh] <br>Ket qua: $ketqua";
}
?>

</body>

</html>
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
    $loi = dienO();
    if(is_string($loi)){
        $_SESSION['error'] = $loi;
        header('location: add.php');
        return;
    }
    $loiposi = validatePosi();
    if (is_string($loiposi)){
        $_SESSION['error'] = $loiposi;
        header('location: add.php');
        return;
    }
    $loischool = validatetruonghoc();
    if (is_string($loischool)){
        $_SESSION['error'] = $loischool;
        header('location: add.php');
        return;
    }

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
        $profile_id = $pdo->lastInsertId();
        chenEducation($pdo,$profile_id);
        chenPosition($pdo, $profile_id);
        
    $_SESSION['thongbao'] = "Da them vao ho so";
    header("location: index.php");
    return;
} 

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet"
 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
 integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
 crossorigin="anonymous">
<link rel="stylesheet"
 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
 integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r"
 crossorigin="anonymous">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
<script
 src="https://code.jquery.com/jquery-3.2.1.js"
 integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
 crossorigin="anonymous"></script>
<script
 src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
 integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
 crossorigin="anonymous"></script>

<title>
Them nguoi dung</title>
</head>
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
        </p>
        <p> Education : <input type="submit" id="vanhoa" value="+">
        </p>
        <div id="idvh"></div>
        <p>
        Position : 
        <input type="submit" id="addposi" value="+">
        </p>
        <div id="khung_posi">
        </div>
        <input type="submit" value="Them">
        <input type="submit" name="huy" value="Huy Bo">
    </form>
    
    <script>
        lanthu = 0;
        $(document).ready(function() {
            $('#vanhoa').click(function(event) {
                event.preventDefault();
                if (lanthu >= 9) {
                    alert('Co chac la ban can them????');
                    //return;
                }
               
                lanthu++;
                $('#idvh').append(
                    '<div id="vh'+lanthu+'">\
        <p>Year : <input type="text" name="namhoc'+lanthu+'" value=""> \
        <input type="button" value="-" onclick="$(\'#vh'+lanthu+'\').remove(); return false;"></p> \
        <p>School : <input type="text" class="school" name="truong'+lanthu+'" value="" size="50"></p>  \
            </div>'
            );
            $( ".school" ).autocomplete({
                source: "school.php"
                }); // .school la css code duoc va di chung voi stylesheet trong cap <head>
            });
            
        });
    </script>
    
    <script>
    countposi = 0;
    $(document).ready(function() {
    $('#addposi').click(function(xayra) {
        xayra.preventDefault();
        if ( countposi >= 9 ){
            alert('Ban da them du so lan 9.');
            return;
        }
        countposi++;
        $('#khung_posi').append(
            '<div id="posi'+countposi+'"> \
            <p> Year : <input type="text" name="nam'+countposi+'" value="" /> \
            <input type="button" value="-" onclick="$(\'#posi'+countposi+'\').remove(); return false;" > </p> \
            <textarea name="chitiet'+countposi+'" cols="60" rows="5"></textarea> \
            </div>');
        });
    });
    </script>

</body>

</html>
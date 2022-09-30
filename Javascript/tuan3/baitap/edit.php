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
    $loi = dienO();
    if(is_string($loi)){
        $_SESSION['error'] = $loi;
        header("location: edit.php?profile_id=" . $_GET['profile_id']);
        return;
    }
    $loiposi = validatePosi();
    if (is_string($loiposi)){
        $_SESSION['error'] = $loiposi;
        header("location: edit.php?profile_id=" . $_GET['profile_id']);
        return;
    }
    $loiEdu = validatetruonghoc();
    if (is_string($loiEdu)){
        $_SESSION['error'] = $loiEdu;
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
        
        $profile_id = $_GET['profile_id'];
        
        $xoa = $pdo->prepare("delete from position where profile_id = :pro ");
        $xoa->execute(array(":pro" => $profile_id));

        $xoaedu = $pdo->prepare('delete from education where profile_id = :pro ');
        $xoaedu->execute(array(':pro' => $profile_id));
        
        
        chenPosition($pdo, $profile_id);
        chenEducation($pdo, $profile_id);

        $_SESSION['thongbao'] = "Thong Tin Da Sua Lai !";
        header("location: index.php");
        return; 
    } catch (Exception $ex) {
        echo('Loi he thong, hay lien he ho tro 800 262 8775');
        error_log("error4.php, SQL error=".$ex->getMessage());
        return;
    }
    
}
?>

<!doctype html>
<html>
    <head>
        <title>
            Sua Ho So
        </title> 

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

    </head>
<?php
 $codelay = "select * from profile where profile_id = :pro and user_id = :uid";
$stamt = $pdo->prepare($codelay);
$stamt->execute(array(":pro" => $_GET['profile_id'],
                    ':uid' => $_SESSION['user_id'] )); //chac chan la chi nhung profile cua nguoi dung nay duoc hien len
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
        </p>
        <p> Position : <input type="submit" id="them" value="+">
        </p>
        <div id="khung"></div>
<?php
$profile_id = $_GET['profile_id'];
$laypos = loadupPosition($pdo, $profile_id);

$posdem = 1; // neu $posdem gan la 0 thi sau moi lan edit se co 1 position bi mat di

if(count($laypos) > 0 ) {
    foreach($laypos as $muc) {
        echo ('<div id="khungtrong'.$posdem.'">
        <p>Year : <input type="text" name="nam'.$posdem.'" value="'.htmlentities($muc['year']).'">
         <input type="button" value="-" onclick="$(\'#khungtrong'.$posdem.').remove(); return false;"></p>
         <textarea name="chitiet'.$posdem.'" cols="30" rows="10">'.htmlentities($muc['description']).'</textarea>
    </div>');
        $posdem++;
    }
}
?>
        <p> Education : <input type="submit" id="vanhoa" value="+">
        </p>
        <div id="idvh"></div>
        <p><?php
        $rows = loadupEdu($pdo, $profile_id);
$Edulanthu = 0;
if(count($rows) > 0 ){
    foreach($rows as $row){
        echo('<div id="vh'.$Edulanthu.'">');
        echo ('<p>Year : <input type="text" name="namhoc'.$Edulanthu.'" value="'. htmlentities($row['year']) .'">');
        echo ('<input type="button" value="-" onclick="$(\'#vh'.$Edulanthu.'\').remove(); return false;"></p>');
        echo('<p>School : <input type="text" class="school" name="truong'.$Edulanthu.'" value="'.htmlentities($row['name']).'" size="50"></p> </div>');
        $Edulanthu++;
    }
}?>

        <input type="submit" value="Sua Lai">
        <input type="submit" name="huy" value="Huy Bo">
        <input type="hidden" name="proid" value="<?= $id ?>">
    </form>
    <script>
        lanthu = <?= $Edulanthu ?>;
        $(document).ready(function() {
            $('#vanhoa').click(function(event) {
                event.preventDefault();
                if (lanthu >= 9) {
                    alert('Co chac la ban can them????');
                    return;
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
    count = <?= $posdem ?>;
    $(document).ready(function(){
        $('#them').click(function(xayra){
            xayra.preventDefault();
            if (count >= 9){
                alert('Ban da them du 9 khung!!!');
                return;
            }
            count++;
            $('#khung').append(
                '<div id="khungtrong'+count+'"> \
    <p>Year : <input type="text" name="nam'+count+'" value=""> \
     <input type="button" value="-" onclick="$(\'#khungtrong'+count+'\').remove(); return false;"></p> \
     <textarea name="chitiet'+count+'" cols="60" rows="6"></textarea> \
     </div>');
        });
    });


</script>
<!-- lam mau div o ngoai SCRIPT truoc roi dua vao trong 

<div id="khungtrong">
    <p>Year : <input type="text" name="nam+" value="">
     <input type="button" value="-" onclick="$('#khungtrong').remove(); return false;"></p>
     <textarea name="chitiet" cols="30" rows="10"></textarea>
</div>
-->
    </body>
</html>
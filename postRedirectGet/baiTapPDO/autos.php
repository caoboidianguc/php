<?php
$tinnhan = false;
$Thbao = false;

if (! isset($_GET['ten']) || strlen($_GET['ten']) < 12){
    die('Ban chua dang nhap');
}
if (isset($_POST['thoat'])){
    header('location: index.php');
}
require_once ('maupdo.php');

if (isset($_POST['make']) && isset($_POST['nam']) && isset($_POST['cayso'])){
    if (strlen($_POST['make']) < 1){
        $tinnhan = "Make is require.";
    }
    if(! is_numeric($_POST['nam']) && ! is_numeric($_POST['cayso'])){
        $tinnhan = "Year and Mileage must be numeric!!";
    }
    else {
        $sql = "insert into autos (make, year, mileage) values (:ma, :ye, :mi) ";
        try {$state = $maupdo->prepare($sql); //doan nay bang voi htmlentities

            $state->execute(array(
                ":ma"=>$_POST['make'],
                ":ye"=>$_POST['nam'],
                ":mi"=>$_POST['cayso']));
            $Thbao = "Thong Tin Da Them.";


        } catch (Exception $ex){
            echo ("Loi he thong, xin lien lac ho tro!");
            error_log("error4.php, SQL error=".$ex->getMessage());
            return;
            }
    }

}


?>
<!-- ---------View--------- -->
<!doctype html>
<html>
<head>
<title>
Quang - them xe
</title>
<h1>Tracking Autos for <?php echo $_GET['ten'] ?> </h1>
</head>
<body>
<?php if ($tinnhan !== false || $Thbao !== false){
    echo ("<p style='color:red; text-indent:40px;'><b>".htmlentities($tinnhan)."</b></p>" );
    echo("<p style='color:green; text-indent:60px;'>" .htmlentities($Thbao)." </p>");
} ?>
    <form method="Post">
    <label for="doixe">Make: </label>
    <input type="text" id="doixe" name="make" size="40"><br><br>

    <label for="nhannam">Year: </label>
    <input type="text" id="nhannam" name="nam" size="20" min="1700" max="2022"><br><br>
<!--type cua year va Mileage co the chuyen thanh type=number -->
    <label for="dachay">Mileage: </label>
    <input type="text" id="dachay" name="cayso" size="25"><br><br>

    <input type="submit" value="Them">
    <input type="submit" value="Logout" name="thoat"> 
    
    </form>

<h2>Automobiles</h2>
<?php
require_once "selectDisplay.php"
?>


<style>
footer {
  text-align: center;
  padding: 3px;
  background-color: lightgreen;
  color: black;
}
</style>
</body>
<footer>Trang Cua Quang @2020</footer>
</html>
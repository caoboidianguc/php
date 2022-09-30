<?php 
if (isset($_POST['huy'])){
    header('location: index.php');
    return;
}
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Appointment - Top Nail</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="trangdiem.css">

</head>
<body>
    <h1>Welcome To Your Nail</h1>
    <h3>Client :</h3>
    <form method='post'>
    <p>Your Name: <input type="text" size="30%" name="tenkha"><br>
    Your Phone : <input type="text" name="sdtkha" size="30%"><br>
    </p>
    <div> <strong> Make schedule with --</strong></div><br>

    <div>Who : <br><input type="checkbox" name="tatca" id="chon" value="moinguoi">
        <label for="chon">Anyone Avalable</label><br>
        <input type="checkbox" name="nhanvien" id="chon1" value="quang">
        <label for="chon1">Quang</label><br>
        <input type="checkbox" name="nhanvien2" id="chon2" value="tuan">
        <label for="chon2">Tuan</label>
    </div><br>
<div>Want : <br>
    <input type="checkbox" name="tay" id="chon" value="bomoi">
    <label for="chon">Fullset</label><br>
    <input type="checkbox" name="taync" id="chon1" value="taynuoc">
    <label for="chon1">Manicure</label><br>
    <input type="checkbox" name="fill" id="chon2" value="fillin">
    <label for="chon2">Fill in</label><br>
    <input type="checkbox" name="chan" id="chon3" value="chan">
    <label for="chon3">Pedicure</label><br>
    <input type="checkbox" name="wax" id="chon4" value="nholong">
    <label for="chon4">Waxing</label><br>
    <input type="checkbox" name="son" id="chon5" value="doinuocson">
    <label for="chon5">Polish or Change color</label>
</div>
    <br> <!--co function tinh thoi gian khi khach chon muc nao -->
    <p>When: <input type="submit" name="vaoluc" value="+"></p>
    <div id="thoigian"></div>
    <input type="submit" value="Book">
    <input type="submit" name="huy" value="Cancel">
    </form>
    <div></div>
    <?php print_r($_POST) ?>
</body>
</html>
<?php
session_start();
if (isset($_POST['doan'])){
  $guess = $_POST['doan'] + 0; 
  $_SESSION['doan'] = $guess;
  if ($guess == 42) {
    $_SESSION['thongbao'] = 'Ban Doan Trung roai...';
  } else if ($guess > 42){
    $_SESSION['thongbao'] = 'Doan Cao Qua !!!';
  } else {
    $_SESSION['thongbao'] = 'Doan Con Thap !!!';
  }
  header("location: doanso_voiRedirect.php");
  return;
}
?>

<!Doctype html>
<html>
<head>
<title>Doan So voi Redirect </title>
</head>
<body>
<h1>Welcome to my guessing game</h1>
<h2>Post Redirect Get</h2>
<p>
Đoán số với redirect. khi nhấn refresh thông tin nhập vào không bị gửi đi 2 lần giống <a href="/doanso.php">Doan So</a>  trước.
</p>
<?php $landoantruoc = isset($_SESSION['doan']) ? $_SESSION['doan'] : ' ';
//dong 27 -- neu $_SESSION[doan] is set, put it in $landoantruoc, neu ko thi $landoantruoc= 'blank line' 
$tinnhan = isset($_SESSION['thongbao']) ? $_SESSION['thongbao'] : false;
//dong28 -- if $_SESSION[thongbao] is set, put it in $tinnhan otherwise it is false
if ($tinnhan !== false){
  echo("<p>$tinnhan</p>");
}
?>

<form method="post">
  <p>
    <label for="doan">Nhap So Doan</label>
    <input type="number" name="doan" id="doan" autofocus size="40">
  </p>
  <input type="submit" value="Doan">
</form>

<pre>
$_POST:
<?php
print_r($landoantruoc);
?>
</pre>

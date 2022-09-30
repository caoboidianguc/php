<html>
<head>
<title>Doan So voi Quang Vu</title>
</head>
<body>
<h1>Welcome to my guessing game</h1>

<form>
<p>
<label for="guess">Nhap So Doan</label>
<input type="text" name="guess" id="guess" />
</p>
<input type="submit"/>
</form>

<pre>
$_GET:
<?php
print_r($_GET);
?>
</pre>


<?php
  if ( ! isset($_GET['guess']) ) { 
    echo("Missing guess parameter");
  } else if ( strlen($_GET['guess']) < 1 ) {
    echo("Your guess is too short");
  } else if ( ! is_numeric($_GET['guess']) ) {
    echo("Your guess is not a number");
  } else if ( $_GET['guess'] < 42 ) {
    echo("Your guess is too low");
  } else if ( $_GET['guess'] > 42 ) {
    echo("Your guess is too high");
  } else {
    echo("Congratulations - You are right. What's the answer for this question?");
  }
?>
<h2>
  Tuan hoc thu 8!
</h2>
<?php $landoantruoc = isset($_POST['doan']) ? $_POST['doan'] : ' '; ?>

<p>Đang Đoán Số.....</p>
<!--
<p>với cách này người dùng nhập vào 1 đoạn mã nào đó để hack trang web</p>
<form method="post">
  <p>
    <label for="guess">Nhap So Doan</label>
    <input type="text" name="guess" id="guess" size="40" value="<?= $landoantruoc ?>">
  </p>
  <input type="submit">
</form>
-->


<h3>---a Better way---</h3>
<form method="post">
  <p>
    <label for="doan">Nhap So Doan</label>
    <input type="text" name="doan" id="doan" size="40" value="<?= htmlentities($landoantruoc) ?>">
  </p>
  <input type="submit">
</form>



<?php
  if ( ! isset($_POST['doan']) ) { 
    echo("Missing doan parameter");
  } else if ( strlen($_POST['doan']) < 1 ) {
    echo("Your doan is too short");
  } else if ( ! is_numeric($_POST['doan']) ) {
    echo("Your doan is not a number");
  } else if ( $_POST['doan'] < 42 ) {
    echo("Your doan is too low");
  } else if ( $_POST['doan'] > 42 ) {
    echo("Your doan is too high");
  } else {
    echo("Congratulations - You are right. What's the answer for this question?");
  }
?>
<br><br>
<?php 
print_r($_POST)
?>


</body>
</html>
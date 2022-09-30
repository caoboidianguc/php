<?php
session_start();
?>

<!doctype html>
<html>
<head><title>
Ung Dung trang nay
</title></head>
<header><h1>
Cool Application right here.
</h1></header>
<body>
    <?php if (isset($_SESSION['chaomung'])){
        echo("<p style='color:green; text-indent:40px'>" .$_SESSION['chaomung']. "</p>");
        unset($_SESSION['chaomung']);
        
    }
    ?>


<?php 

if ( ! isset($_SESSION['ten'])){ ?>

    <h3>Please <a href='logIn.php'>Log in</a> to start</h3>

<?php } else { ?>
    <h3>This is where cool application would be. </h3>
    <p>Please <a href="logout.php">log out</a> khi nao ban xong viec.</p>

<?php } ?>



</body>
</html>


<?php
$madagiai = "Khong Tim Thay!";
if (isset($_GET['md5'])) {
    $ma = $_GET['md5'];

    $chucai = "zxcvbnmlkjhgfdsaqwertyuiop0987654321";
    $solan = 15;

    for ($i=0; $i<strlen($chucai); $i++) {
        $chu1 = $chucai[$i];

        for ($j=0; $j<strlen($chucai); $j++) {
            $chu2 = $chucai[$j];

            for ($b=0; $b<strlen($chucai); $b++) {
                $chu3 = $chucai[$b];

                for ($c=0; $c<strlen($chucai); $c++) {
                    $chu4 = $chucai[$c];

                    $timchu = $chu1.$chu2.$chu3.$chu4;
                    $kiemtra = hash('md5', $timchu);

                    if ($kiemtra == $ma) {
                        $madagiai = $timchu;
                        break;                        
                    }


                }
            }
        }
    }

}

?>


<!-- --------------------------------------------- -->
<!DOCTYPE html>
<html>
<title>Giai Ma Bam</title>
<body>


<h2>Giai Ma Bam</h2>
<p>
    Cac Ki Tu la: <?= htmlentities($madagiai) ?>
</p>

<form>
Nhap Ma Vao Day :
<input type="text" name="md5" size="50"><br><br>
<input type="submit" value="Giai Ma"><br>
</form>
<p>
    <a href="giaimaBam.php">Lam Moi Trang</a>
</p>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title>O_O_P</title></head>
<body>
<?php

$now = new DateTime();
$tuantoi = new DateTime('today + 1 week');

echo 'Hien Tai: '. $now->format('Y-M-D') .'<br>';
echo 'Tuan toi: '. $tuantoi->format('y-m-d'). '<br>';

?>
<br><br><br>
    <?php 
    $caNhan = array('fullname'=> 'Pham Thi Ngoc Linh', 'room' => 'Phong Chinh');
    $caNhanKhac = array("tengoi" => "Hibi", "tenho" => "Vu", "room" => "Phong ME");
    
    function layten($ten){
        if (isset($ten['fullname'])){
            return $ten['fullname'];
        }
        if (isset($ten['tengoi']) && isset($ten['tenho'])){
            return $ten['tengoi'].' '.$ten['tenho'];
        }
        return false;
    }    
    
    echo layten($caNhan). '<br>';
    print layten($caNhanKhac);
    ?>
    <h3>Object Oriented Programming</h3>
<?php 
class canhan {
    public $hovaten = false;
    public $tenho = false;
    public $tengoi = false;
    public $room = false;

    function nhapTen() {
        if ($this ->hovaten !== false) return $this -> hovaten;
        if( $this ->tengoi !== false & $this->tengoi !== false)  {
            return $this->tengoi .' '. $this->tenho;
        }
        return false;
    }

}

$thong = new canhan();
$thong->hovaten = 'Vu Quang Thong';

$ngKhac = new canhan();
$ngKhac->tengoi = 'Hibi';
$ngKhac->tenho = 'Vu';

echo $thong->nhapTen(). "<br>";
echo $ngKhac->nhapTen();

?>
<br>
<p><strong> Object Life Cycle</strong> <br>
</p>
<?php
class partyAnimal {
    function __construct(){
        echo("Constructed <br>");
    }
   function something (){
       echo ("something here <br>");
   }
   function __destruct()
   {
       echo("Destructed <br>");
   }
}
echo ("--One <br>");
$x = new partyAnimal();
echo ("--Two <br>");
$y = new partyAnimal();
echo("--Three <br>");
$x->something();

print("--the End-- <br>")



?>

</body>

</html>


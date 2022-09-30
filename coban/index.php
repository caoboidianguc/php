<!DOCTYPE html>
<html>
<head>
    <title>Thong Quang Vu</title>
</head>

<body>
    <h1> Hello Thong Quang Vu PHP</h1>


<?php
$thu = 7*2;
echo "ket qua la ".$thu. "<br>";
echo "Doan chu viet thu trong         dau nhay kep \n\n";
echo 'Doan chu viet thu trong         dau nhay don \n';
echo("Dong chu trong ngoac don<br>");
echo("Hang xoung dong<br>");
echo '<br>';
$danMuc = array();
$danMuc['name'] = 'quang';
$danMuc['ho'] = 'Vu';
$danMuc['tuoi'] = 54;
$danMuc['nghe'] = 'chua du tuoi';

if (array_key_exists('ho',$danMuc)) {
    echo("Ban co ten ho<br>");
} else{
    echo("khong thay ten ban<br>");
}

echo isset($danMuc['name']) ? "Tu khoa name co trong danh muc<br>" : "Tu khoa name khong ton tai<br>";
echo isset($danMuc['ten']) ? "Tu khoa ten co trong danh muc<br>" : "Tu khoa ten khong co trong danh muc<br>";
echo '<br>';
echo '<br>';
echo "Xap xep danh muc theo Ksort(tu khoa):<br>";
ksort($danMuc);
print_r($danMuc);
echo '<br>';
echo '<br>';
echo'Xap xep danh muc theo asort(gia tri):<br>';
asort($danMuc);
print_r($danMuc);

echo '<br>';
echo '<br>';

$cauchu = "ma trong toan nhung cay de thuong, nao la hoa la rau la lua";
$bechu = explode(" ", $cauchu);
print_r($bechu);

echo '<br>';
echo '<br>';

?>

<pre>thu dong chu
dong chu da xuong dong.
va co    khoang trang
</pre>

</body>
</html>
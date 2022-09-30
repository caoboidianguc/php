<!DOCTYPE html>
<html>
<title>Some input Types</title>
<body>
    <h1>Vai Thong Tin Lay Tu Nguoi Dung</h1>

<p>

<h3>Many field types...</h3>
<form method="POST" action="inputTypes.php">
    <p>
        <label for="inp01">Tai Khoan:</label>
        <input type="text" name="taikhoan" id="inp01" size="40">
    </p>
    <p>
        <label for="inp02">Mat Khau:</label>
        <input type="password" name="mk" id="inp02" size="40">
    </p>
    <p>
        <label for="inp03">Danh Xung</label>
        <input type="text" name="nickname" id="inp03" size="40">
    </p>
<p>
    Preferred Time:<br/>
    <input type="radio" name="when" value="am">Sang<br>
    <input type="radio" name="when" value="pm" checked>Chieu<br>
    <input type="radio" name="when" value="khonggio">Khong Gio
</p>
<p>
    Classes taken:<br>
    <input type="checkbox" name="class1" value="chon1" checked>SI502 - Networked Tech<br>
    <input type="checkbox" name="class2" value="chon2">SI539 - App Engine<br>
    <input type="checkbox" name="class3" value="chon3">SI543 - Java<br>
</p>
<p>
    <label for="inp06">Giải Khát !!:
        <select name="soda" id="inp06">
            <option value="khongchon">---Please select---</option>
            <option value="1">Coke</option>
            <option value="2" selected>Pepsi</option>
            <option value="3">Nuoc Chanh</option>
            <option value="4">Nuoc Cam</option>
            <option value="5">Nuoc loc</option>
        </select>
    </label>
</p>
<p>
    <label for="inp07">An Vat !!
        <select name="doAnVat" id="inp07">
            <option value="chuachon">----Moi Chon Do An----</option>
            <option value="xoai">Xoai kho</option>
            <option value="me">Me Chua</option>
            <option value="dauphong">Dau Phong Rang</option>
            <option value="khoatay">Khoai Tay Chien</option>
        </select>
    </label>
</p>
<p>
    <label for="inp08">Giới Thiệu Tí về bản thân bạn:<br>
    <textarea name="khachGioThieu" id="inp08" cols="70" rows="10">
        Mììn thík ăn lung tung, hay nói ngu ngơ ơ ơ ....
    </textarea>
</p>
<p>
    <label for="inp09">Chon Lop Hoc Thich ??</label><br>
    <select name="code[]" id="inp09" multiple="multiple">
        <option value="python">Python</option>
        <option value="css">CSS</option>
        <option value="html">HTML</option>
        <option value="php">PHP</option>
    </select>
</p>

<p>
    <input type="submit" name="dopost" value="Gui Di"/>
    <input type="button" onclick="location.href='https://www.bing.com/' ; return false;" value="Thoat">
</p>
    
</form>

<form action="inputTypes.php" method="POST">
<p>
Select your favorite color:
<input type="color" name="favcolor" value="#5fec7b"><br><br>
Birthday:
<input type="date" name="sinhnhat" value=" "><br><br>
E-mail:
<input type="email" name="thudientu"><br><br>
Quantity (between 1 and 9):
<input type="number" name="soluong" min="1" max="9"><br><br>
Add your homepage:
<input type="url" name="trangchu"><br><br>
Transportation:
<input type="flying" name="traloi"><br><br>
</p>

<p>
    <input type="submit" name="dopost" value="Gui Them"/>
    <input type="button" onclick="location.href='https://www.bing.com/' ; return false;" value="Thoat Luon">
</p>


</form>


<pre>
    $_Post:
    Dữ Liệu thu nhập:
    [taikhoan] = ten nguoi dung nhap
    [mk]  =  mat khau nguoi dung nhap
    [nickname] = nguoi dung chon
    [when] = pm (mac dinh)
    [class] = si502 (nếu không có value thì khi người dùng chọn nó sẽ bật class3=on)
    [soda] = khongchon
    [doAnVat] = chuachon
    [khachGioThieu] = Mììn thík ăn lung tung, hay nói ngu ngơ ơ ơ ....
    [code] = array
        [0] = css
        [1] = html
    [dopost] = Gui Di
    onclick thuoc ve javascript, return false là không gửi tất cả những gì đã điền.

</pre>
<?php 
print_r($_POST)
?>














</p>
   
</body>

</html>
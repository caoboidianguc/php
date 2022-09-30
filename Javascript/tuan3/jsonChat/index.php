<?php
session_start();
if (isset($_POST['reset']) ) {
    $_SESSION['chat'] = array();
    header('location: index.php');
    return;
}

if (isset($_POST['tinnhan'])) {
    if ( ! isset($_SESSION['chat'])) $_SESSION['chat'] = array();
    $_SESSION['chat'] [] =array($_POST['tinnhan'], date(DATE_RFC850));
    header('location: index.php');
    return;
}

?>
 <!doctype html>
 <html>
 <head>
 <title>nhan tin</title>
 </head>
 <body>
     <h1>Buon Dua</h1>

<form method='post' action="index.php">

<p>
<input type="text" name="tinnhan" size="60">
<input type="submit" value="Buon"> </p> 
<p>
<input type="submit" name="reset" value="Lam lai">
</p>
</form>

<div id="noidungchat">
    <img src="vongquay.gif" alt="Dang tai...." height="25" width="25">
</div>

<script type="text/javascript" src="jquery.js">
</script>
<script type="text/javascript">
function updateTinNhan(){
    window.console && console.log('Dang yeu cau JSON');
    $.ajax({
        url: 'buondua.php', 
        cache: false,
        success: function(data) {
            window.console && console.log('Dang nhan json');
            window.console && console.log(data);
            $('#noidungchat').empty();
            for (var i = 0; i < data.length ; i++ ) {
                entry = data[i];
            $('#noidungchat').append('<p>'+entry[0] + '<br/>&nbsp;' + entry[1] + "</p>\n");
        }
        setTimeout('updateTinNhan()', 4000);
        }
    });
}
updateTinNhan();


</script>

 </body>
 </html>


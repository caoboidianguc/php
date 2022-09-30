<!DOCTYPE html>
<html>
<title>jquery va javascript</title>
<body>
<h1>thay doi chu trong khung va nhan chuot noi khac thi "khung" se duoc gui di</h1>
    <form id="target">
    <input type="text" name="one" value="Chao nhe " style="vertical-align: middle;">
    <img src="vongquay.gif" id="vong" height="25" style="vertical-align: middle; display:none;">
    </form><br>
    <div id="ketqua"></div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    $('#target').change(function(xayra) {
        xayra.preventDefault();
        $('#vong').show();
        var onhap = $('#target');
        var chu = onhap.find('input[name="one"]').val();
        window.console && console.log('Sending Post');
        $.post(
            'echo.php', {'noidung': chu }, function(data){
                window.console && console.log(data);
                $('#ketqua').empty().append(data);
                $('#vong').hide();
            }
        ) .error(function() {
            window.console && console.log('error');
        });
        return false;
    })
</script>


</body>
</html>
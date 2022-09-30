

<!doctype html>
<html>
<head>
<title>get json</title></head>
<body>
<h1>get json</h1>
<p id="back">
Thay the dong nay
</p>
<p id="dong2">
va dong nay nua</p>

<script type="text/javascript" src="jquery.js">

</script>

    <script type="text/javascript">
    $(document).ready(function () {
        $.getJSON('jsonEncode.php', function(data){
            $('#back').html(data.muc2);
            
            windows.console && console.log(data);
        })
    }
    );
    </script>
</body>
</html>
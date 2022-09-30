<?php

$mauPDO = new PDO('mysql:host="localhost";port=3306;dbname="misc"','fred','zap');

$mauPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>
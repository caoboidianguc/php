<?php  
    $dbHost="localhost";  
    $dbName="mysql";  
    $dbUser="root";      //by default root is user name.  
    $dbPassword="";     //password is blank by default  
    try{  
        $dbConn= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPassword);  
        Echo "Successfully connected with myDB database";  
    } catch(Exception $e){  
    Echo "Connection failed" . $e->getMessage();  
    }  
?>  
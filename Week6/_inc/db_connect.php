<?php
$servername = "localhost";
$username = "root";
$password = "123456a";

try {
    $mainDB = new PDO("mysql:host=$servername;dbname=employees", $username);
    // set the PDO error mode to exception
    $mainDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?> 
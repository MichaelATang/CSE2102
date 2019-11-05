<?php
require("constants.php");

try{
    $db = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME , DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>

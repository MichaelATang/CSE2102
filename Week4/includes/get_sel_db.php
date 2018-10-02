<?php
require("constants.php");

try{
    $db = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME , DB_USER, DB_PASSWORD);
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>

<?php
    //setting up the needed includes files  
    require_once("includes/functions.php");
    
    // $result = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1");
    $sql = "SELECT * FROM users ";
    $results = query($sql);
        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSE2102 Lab 1-3</title>
</head>
<body>

   <?php

        if (!empty($results)) {
            // has something returned
            foreach ($results as $row) {
                echo "<hr>";
                echo $row['name'];                 
            } 
            echo "<hr>";
        }else{
            // something went wrong

        }
        
   ?>

</body>
</html>

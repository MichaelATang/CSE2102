<?php

require_once("get_db.php");
 
    function query($query) {
        global $db;

        $st = $db->query($query);
        $success = $st->fetchAll(PDO::FETCH_ASSOC);
       
        return $success;
    }


    function addNewData($name, $username, $password, $type) {        
        global $db;
        $hashed_password = md5($password);

                $result = $db->prepare("INSERT INTO users( name, username, password, type ) 
                                        VALUES(:name, :username, :password, :type)");
                
                $result->execute(array(':name' => $name, ':username' => $username, 
                                       ':password' => $hashed_password, 'type' => $type));

                $result = $db->lastInsertId();
                
                return $result;		
    }


?>

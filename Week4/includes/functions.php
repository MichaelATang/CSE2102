<?php
    function query($query) {
        require_once("get_sel_db.php");
        $st = $db->query($query);
        $success = $st->fetchAll(PDO::FETCH_ASSOC);

        require_once("close_db.php");
        return $success;
    }
?>

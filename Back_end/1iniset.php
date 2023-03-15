<?php

    

    $ipUser = $_SERVER['REMOTE_ADDR'];

    if(isset($_POST)) {
        foreach($_POST as $key => $value) {
            $_POST[$key] = html_entities(strip_tags($value));
        }
    }

    if(isset($_GET)) {
        foreach($_GET as $key => $value) {
            $_POST[$key] = html_entities(strip_tags($value));
        }
    }
?>
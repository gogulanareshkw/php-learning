<?php
    session_start();

    if (!isset($_SESSION['lang'])){
        $_SESSION['lang'] = "en";
    }
    else if( isset($_GET['lang']) && ($_SESSION['lang']!=$_GET['lang']) && !empty($_GET['lang'])){
        $lang = $_GET['lang'];

        switch($lang){
            case "en": $_SESSION['lang']="en";break;
            case "fr": $_SESSION['lang']="fr";break;
            case "de": $_SESSION['lang']="de";break;
            case "es": $_SESSION['lang']="es";break;
            default: $_SESSION['lang']="en";
        }

    }

    require_once $_SESSION['lang'].".php";

?>
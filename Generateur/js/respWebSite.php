<?php

    require_once "../imagineyourwebsite.inc.php";

    // On vérifie si le login existe déjà dans la bdd
    if( $_GET['action'] == "replaceInfo" )
    {
        $info = isset($_GET['idinfo']) ? new IYWSInformation($_GET['idinfo']) : "";

        if( $info != "" )
        {
            echo    $info->getTitle() . "<split/>" 
                .   $info->getSection() . "<split/>"
                .   $info->getNav() . "<split/>"
                .   $info->getTagline() . "<split/>"
                .   $info->getFooter();
        }
        else 
        {
            echo "error";
        }
    }
?>

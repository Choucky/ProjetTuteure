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
    else if( $_GET['action'] == "saveInfos" )
    {
        $title = (isset( $_GET['title'] )) ? $_GET['title'] : ""; 
        $section = (isset( $_GET['section'] )) ? $_GET['section'] : ""; 
        $nav = (isset( $_GET['nav'] )) ? $_GET['nav'] : ""; 
        $tagline = (isset( $_GET['tagline'] )) ? $_GET['tagline'] : ""; 
        $footer = (isset( $_GET['footer'] )) ? $_GET['footer'] : ""; 
        $idInfo = (isset( $_GET['idInfo'] )) ? $_GET['idInfo'] : ""; 

        $info = new IYWSInformation( $idInfo );
        $confirm = $info    ->setTitle( $title )
                            ->setSection( $section )
                            ->setNav( $nav )
                            ->setTagline( $tagline )
                            ->setFooter( $footer )
                            ->store();

        if( $confirm )
        {
            echo "success";
        }
        else
        {
            echo "error";
        }

    }
?>

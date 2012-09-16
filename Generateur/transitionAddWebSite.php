<?php

    session_start();

    // Si l'utilisateur a bien démarré une session, on le redirige vers son wall
    if( !isset($_SESSION['user']) && !isset($_GET['design']) )
    {
        header("Location: index.php");   
    }

    require_once "imagineyourwebsite.inc.php";

    $design = isset( $_GET['design'] ) ? $_GET['design'] : 1;
    $user = new IYWSUser( $_SESSION['user'] );
    $info = $user->addInformations("", "", "", "", "", $design );

    header("Location: webSite.php?design=" . $design . "&info=" . $info->getId() );   

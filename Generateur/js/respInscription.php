<?php

    require_once "../imagineyourwebsite.inc.php";

    // On vérifie si le login existe déjà dans la bdd
    if( $_GET['action'] == "checkLogin" )
    {
        $login = isset($_GET['login']) ? $_GET['login'] : "";

        $user = new IYWSUser( $login );

        if( $user->getLogin() == $login )
        {
            echo "exists";
        }
        else 
        {
            echo "notExists";
        }
    }
    // On enregistre l'utilisateur dans la bdd
    else if( $_GET['action'] == "validInscription" )
    {
        $login = isset($_GET['login']) ? $_GET['login'] : "";
        $mail = isset($_GET['mail']) ? $_GET['mail'] : "";
        $pwd = isset($_GET['pwd']) ? $_GET['pwd'] : "";

        $user = IYWSDirectory::Instance()->addUser( $mail, $pwd, $login );

        if( $user == false )
        {
            echo "error";
        }
        else
        {
            echo "success";
        }
    }
?>

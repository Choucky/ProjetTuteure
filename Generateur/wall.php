<?php

    session_start();
    require_once "imagineyourwebsite.inc.php";

    $login = isset( $_POST['login'] ) ? $_POST['login'] : "";

    // Si l'utiisateur arrive sur cette page en se connectant alors on l'authentifie
    if( $login != "" )
    {
        $pwd = isset( $_POST['pwd'] ) ? $_POST['pwd'] : "";
        $user = IYWSDirectory::instance()->authentication( $login, $pwd );
        
        // Si l'authentification est un succès, on démarre une session
        if( $user != false )
        {
            $_SESSION['user'] = $login;
        }
    }
   
    // Si l'utilisateur n'a pas démarré de session, on redirige
    if( !isset( $_SESSION['user'] ) )
    {
        header("Location: index.php?error=1");   
    }


    // CONTENU DU WALL DE L'UTILISATEUR
    $user = new IYWSUser( $_SESSION['user'] );
    echo Layout::headerLogged('IYWS - Accueil');

    $infos = $user->getAllInfoOwned();
    $allDesign = IYWSDirectory::instance()->getAllDesign();
    
    //Affichage des icônes des sites crées
    echo '<main>';
    foreach( $infos as $i )
    {
        foreach( $allDesign as $d )
        {
            if( $i->getIdDesign() == $d->getId() )
            {
                echo    '<div class="abox">
                            <a href="webSite.php?design=' . $i->getIdDesign() . '&info=' .$i->getId() .'">
                                <img src="images/' . $d->getImage() . '" alt=' . $d->getImage() . ' width="289" height="175" class="wallImg" />
                            </a>
                            <b>	
                            	' . $i->getTitle() . ' 
                            </b>
                            &nbsp
                            &nbsp
                            <input type="submit" value="supprimer" style="color:red;" onClick="validDeleteWebsite('.$i->getId().');"/>                            
                        </div>';               
            }          
        }
                
    }
    echo '<div class="abox">
            <a href="addWebSite.php">
                <img src="images/newWebSite.png" alt="addWebSite" width="289" height="175" class="wallImg" />
            </a>
          </div></main>';
    
    echo '<script type="text/javascript" src="js/deleteWebsite.js"></script>';

    echo Layout::footer();

<?php

    session_start();

    // Si aucune session n'est démarrée, alors on redirige vers l'index
    if( !isset( $_SESSION['user'] ) )
    {
        header("Location: index.php");   
    }

    require_once "imagineyourwebsite.inc.php";
    echo Layout::headerLogged('IYWS - Creer un site web');

    echo "<h1 style='color:blue;text-align:center;'>Choisissez un design et créez votre site web !</h1>";

    // On récupère la liste de tous les designs
    $allDesign = IYWSDirectory::instance()->getAllDesign();

    //Affichage des icônes des designs
    echo '<main>';
    foreach( $allDesign as $d )
    {
        echo    '<div class="abox">
                    <a href="transitionAddWebSite.php?design=' . $d->getId() . '">
                        <img src="images/' . $d->getImage() . '" alt=' . $d->getImage() . ' width="289" height="175" class="wallImg" />
                    </a>
                    <b>	
                    	' . $d->getName() . ' 
                    </b>
                </div>';                         
    }

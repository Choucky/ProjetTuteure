<?php

    session_start();
    require_once "imagineyourwebsite.inc.php";

    $design = isset( $_GET['design'] ) ? new IYWSDesign($_GET['design']) : ""; 
    $info = isset( $_GET['info'] ) ? new IYWSInformation ($_GET['info']) : "";

    if( $design!="" && $info!="" && $design->getId()!=NULL && $info->getId()!=NULL )
    {
        echo '<input type="text" hidden="hidden" disabled="disabled" value="' . $info->getId() . '" id="idInfo" />';
        echo $design->getCode();
    }
    else
    {
        echo Layout::header('IYWS - Error');
        $retrn = '  <!-- Contenu du site -->
                    <middle>    
                        <div class="enter">
                            <p id="error">
                                <b>ATTENTION : Vous essayez d\'atteindre une page inexistante. Veuillez nous contacter si ce message n\'aurait pas dû s\'afficher, dans le cas contraire n\'hésitez pas à vous inscrire sur <a href="index.php">ImagineYourWebSite.com</a>.</b>
                            </p>
                            <div class="imgteaser">
                                <a href="index.php"><img src="images/inscription-img.png" alt="freehtml5templates.com" width="413" height="220" />
                                <span class="desc"><strong>imagineyourwebsite.com</strong>Inscrivez-vous puis créez vos propre sites gratuitement !</span>
                                </a>
                            </div>
                        </div>	
                    </middle>';

        echo $retrn;
        echo Layout::footer();

    }


    

?>

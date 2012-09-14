<?php

    session_start();
    require_once "imagineyourwebsite.inc.php";

    $design = isset( $_GET['design'] ) ? new IYWSDesign($_GET['design']) : ""; 
    $info = isset( $_GET['info'] ) ? new IYWSInformation ($_GET['info']) : "";

    if( $design!="" && $info!="" && $design->getId()!=NULL && $info->getId()!=NULL )
    {
        // Si l'utilisateur est connecté on affiche la console des modifications
        if( isset( $_SESSION['user'] ) )
        {
            $user = new IYWSUser( $_SESSION['user'] );
            $tabInfos = $user->getAllInfoOwned();

            foreach( $tabInfos as $t )
            {
                if( $t->getId() == $info->getId() )
                {
                    echo '  <div id="console" style="   
                                                        position : relative;
                                                        min-width : 940px;
                                                        margin : auto;
                                                        background-image: url(images/bg.png);
                                                        -webkit-border-bottom-right-radius: 150px;
                                                        -webkit-border-bottom-left-radius: 150px;
                                                        -moz-border-radius-bottomright: 150px;
                                                        -moz-border-radius-bottomleft: 150px;
                                                        border-bottom-right-radius: 150px;
                                                        border-bottom-left-radius: 150px;
                                                   "
                            >
                                <table style="  position : relative;
                                                width : 80%;
                                                margin-left : 10%;         

                                             "
                                >
                                    <tr>
                                        <td><label for="changeTitle">Titre :</label></td>
                                        <td><input type="text" id="changeTitle" onKeyUp="modifyField(0, this.value);" value="' . $info->getTitle() . '" size="25" /><br /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="changeTagline">Phrase perso :</label></td>
                                        <td><input type="text" id="changeTagline" onKeyUp="modifyField(1, this.value);" value="' . $info->getTagLine() . '" size="25" /><br /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="changeNav">Section :</label></td>
                                        <td><textarea id="changeNav" onKeyUp="modifyField(2, this.value);">' . $info->getNav() . '</textarea><br /></td>
                                        <td>
                                            <img src="images/console_icons/text_bold.png" alt="bold" id="boldNav"/>
                                            <img src="images/console_icons/text_italic.png" alt="italic" id="italicNav" />
                                            <img src="images/console_icons/text_underline.png" alt="underline" id="underlineNav"/>
                                            <img src="images/console_icons/image_add.png" alt="add image" id="imageNav"/>
                                            <img src="images/console_icons/film.png" alt="film" id="filmNav"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="changeSection">Corps du site :</label></td>
                                        <td><textarea id="changeSection" onKeyUp="modifyField(3, this.value);">' . $info->getSection() . '</textarea><br /></td>
                                        <td>
                                            <img src="images/console_icons/text_bold.png" alt="bold" id="boldSection" />
                                            <img src="images/console_icons/text_italic.png" alt="italic" id="italicSection" />
                                            <img src="images/console_icons/text_underline.png" alt="underline" id="underlineSection"/>
                                            <img src="images/console_icons/image_add.png" alt="add image" id="imageSection"/>
                                            <img src="images/console_icons/film.png" alt="film" id="filmSection"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="changeFooter">Pied de page :</label></td>
                                        <td><textarea id="changeFooter" onKeyUp="modifyField(4, this.value);">' . $info->getFooter() . '</textarea><br /></td>
                                        <td>
                                            <img src="images/console_icons/text_bold.png" alt="bold" id="boldFooter" />
                                            <img src="images/console_icons/text_italic.png" alt="italic" id="italicFooter" />
                                            <img src="images/console_icons/text_underline.png" alt="underline" id="underlineFooter"/>
                                            <img src="images/console_icons/image_add.png" alt="add image" id="imageSection"/>
                                            <img src="images/console_icons/film.png" alt="film" id="filmSection"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>';
                }
            }
        }

        echo '<input type="text" hidden="hidden" disabled="disabled" value="' . $info->getId() . '" id="idInfo" />';
        echo $design->getCode();
    }
    else
    {
        // Si un utilisateur modifie l'url par des valeurs inexistantes on affiche un message d'erreur
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

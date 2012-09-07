<?php

    session_start();
    require_once "imagineyourwebsite.inc.php";

    // Si l'utilisateur n'a pas démarré de session, on redirige
    if( !isset( $_SESSION['user'] ) )
    {
        header("Location: index.php?error=1");   
    }

    // CONTENU DE myAccount DE L'UTILISATEUR
    $user = new IYWSUser( $_SESSION['user'] );
    echo Layout::headerLogged('IYWS - Accueil');

?>
    <!-- Contenu de la page -->
    <middle>    
         <div id="enterMyAccount">
            
<?php

    //Si le champs oldPwd est bon, on applique les modifications
    $oldPwd = isset( $_POST['oldPwd'] ) ? $_POST['oldPwd'] : "";

    if( IYWSDirectory::instance()->authentication( $user->getLogin(), $oldPwd ) != false )
    {

        $mail = isset( $_POST['mail'] ) ? $_POST['mail'] : $user->getMail();
        $newPwd = isset( $_POST['pwd'] ) ? $_POST['pwd'] : "";
        $confirmPwd = isset( $_POST['confirmPwd'] ) ? $_POST['confirmPwd'] : "";

        $result = $user ->setMail( $mail )
                        ->store();
        
        $result2 = true;
        if( $newPwd != "" && $newPwd == $confirmPwd )
        {
            $result2 = $user->setPwd( $oldPwd, $newPwd );
        }
        
        if( $result && $result2 )
        {
            $msg = 1;
        }
        else
        {
            $msg = 2;
        }

        switch( $msg )
        {
            case 1 :
                echo '<p id="msg" style="color:green;">Les modifications on été enregistrées !</p>';
          
                break;

            case 2 : 
                echo '<p id="msg" style="color:red;">Le mot de passe entré n\'est pas valide.</p>';
                break;

            default : 
                break;
        }
    }
    //Si l'utilisateur ne rempli que le champs oldPwd
    else if( $oldPwd != "" )
    {
        echo '<p id="msg" style="color:red;">Le mot de passe entré n\'est pas valide.</p>';
    }

?>
            <div id="instructions">
                <b><u>Paramètres du compte :</u></b> <br /><br />
<?php
    //Création du formulaire
    $login = $user->getLogin();
    $mail = $user->getMail();
    
    $retrn = '  <form method="POST" action="myAccount.php">
                    <table id="tableMyAccount">
                        <tr>
                            <td><em>Login</em> :</td>
                            <td><input disabled=disabled value="' . $login . '" /></td>
                        </tr>
                        <tr>
                            <td><em>Mail :</td>
                            <td><input name="mail" value="' . $mail . '" /></td>
                        </tr>
                        <tr>
                            <td><em>Nouveau mot de passe : </td>
                            <td><input type="password" name="pwd" id="pwd" placeholder="Nouveau mot de passe" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="password" name="confirmPwd" placeholder="Confirmer le mot de passe" onKeyUp="checkPassword( this.value );" />&nbsp;<span id="pwdConfirmImg"></span></td>
                        </tr>
                        <tr>
                            <td>Mot de passe actuel<span id="attention">*</span> : </td>
                            <td><input type="password" name="oldPwd" placeholder="Mon mot de passe" /></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Enregistrer"/></td>
                        </tr>
                    </table>
                </form>

                <br /><br />
                <p id="attention">* Ce champ doit être saisi et valide pour pouvoir oppérer à toute modification.<p>';

    echo $retrn;    

?>               
            </div>
        </div>
    </middle>

    <script type="text/javascript" src="js/inscription.js"></script>

<?php

    echo Layout::footer();

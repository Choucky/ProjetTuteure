<?php

    session_start();

    // Si l'utilisateur a bien démarré une session, on le redirige vers son wall
    if( isset( $_SESSION['user'] ) )
    {
        header("Location: wall.php");   
    }

    require_once "imagineyourwebsite.inc.php";
    echo Layout::header('IYWS - Accueil');
    
    // On regarde si l'on doit afficher un message d'erreur
    $error = isset( $_GET['error'] ) ? $_GET['error'] : 0;

    switch( $error )
    {
        case 1 :
            echo "<h1 style='color:red;text-align:center;'>L'authentification a échoué. Veuillez recommencer.</h1>";
            break;
    }
?>
 
    <!-- IMAGES -->    
    <main>    
        <!-- Image 1 -->    
        <div class="abox">
            <h1>Inscrivez-vous...</h1>
            <img src="images/inscription-img.png" alt="I love graphic" width="289" height="175" />
        </div>

        <!-- Image 2 -->    
        <div class="abox">
             <h1>Connectez-vous...</h1>   
             <img src="images/connexion-img.png" alt="I love graphic" width="287" height="176" />
        </div>

        <!-- Image 3 -->    
        <div class="abox">
            <h1>... puis créez !</h1>
            <img src="images/nas.jpg" alt="I love graphic" width="289" height="178" />
        </div>   
    </main>

    <!-- Contenu du site -->
    <middle>    
        <div class="enter">
            <p>
                <b>Imagine Your Web Site</b> est un site gratuit vous permettant de créer vos propres sites web facilement et gratuitement.<br />
                Notre large panel de templates vous permettra forcément de trouver le site à votre image et de le personnaliser à votre façon.<br /><br />

                Grâce à <b>Imagine Your Web Site</b>, donnez libre cours à votre imagination !
            </p>
            <div class="imgteaser">
                <a href="http://freehtml5templates.com/template-portfolio/"><img src="images/p1.png" alt="freehtml5templates.com" width="413" height="220" />
                <span class="desc"><strong>freehtml5templates.com</strong>Téléchargez et utilisez des templates librement.</span>
                </a>
            </div>
        </div>	
      
        <div class="section_slogan">
            <span class="cursive">"L'inspiration est le désir par extension, n'est-ce pas ?"</span>
        </div>
    </middle>

<?php

    echo Layout::footer();


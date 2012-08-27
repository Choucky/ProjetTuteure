<?php

/**
 * \file        Layout.class.php
 * \author      Elodie POULIN
 * \version     1.0
 * \date        05 Juillet 2012
 * \brief       Génère le header et le footer de l'application          
 */


class Layout
{

    /**
     * \brief       Retourne le header de l'application
     * \details     Le retour prend en compte HTML5 avec Internet Explorer.
     *
     * \param       $title  Titre de la page web courante.
     * \return      \e String représentant le header de l'application.
     */
    public static function header( $title )
    {
        return '
                    <!DOCTYPE html>
                    <head>
                        <title>' . $title . '</title>
                        <meta charset="utf-8" />
                        <style type="text/css">
                            <!--
                            body {
                                background-image: url(images/bg.png);

                            }
                            -->
                        </style>
                         <link href="css/style.css" rel="stylesheet" type="text/css" />
                         <link rel="stylesheet" type="text/css" href="css/style9.css" />
                         <link rel="stylesheet" type="text/css" href="css/demo.css" />    
                         <link href="http://fonts.googleapis.com/css?family=Terminal+Dosis" rel="stylesheet" type="text/css" />
                         <style type="text/css">
                            <!--
                            .Stile1 {color: #333333}
                            -->
                        </style>
                    </head>
                    <body>
                        <!-- Start container -->
                        <div class="content">
                            <!-- DESSIN DES CERCLES -->
                            <ul class="ca-menu">
                                    <li>
                                        <a href=".">
                                            <span class="ca-icon">24</span>
                                            <div class="ca-content">
                                                <h2 class="ca-main"><span style="color:blue;">IMAGINE</span><br />Accueil</h2>
                                                <h3 class="ca-sub">Seule votre imagination vous arrêtera !</h3>
                                            </div>
                                        </a>                    </li>
                                    <li>
                                        <a href="mailto:elodie16.p@gmail.com">
                                            <span class="ca-icon">c</span>
                                            <div class="ca-content">
                                                <h2 class="ca-main"><span style="color:orange;">YOUR</span><br />Nous contacter</h2>
                                                <h3 class="ca-sub">Cliquez puis envoyez !</h3>
                                            </div>
                                        </a>                    </li>
                                    <li>
                                        <a href="inscription.php">
                                            <span class="ca-icon">wx</span>
                                            <div class="ca-content">
                                                <h2 class="ca-main"><span style="color:red;">WEB</span><br />S\'inscrire</h2>
                                                <h3 class="ca-sub">Pour s\'inscrire, c\'est par ici !</h3>
                                            </div>
                                        </a>                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="ca-icon">U</span>
                                            <div class="ca-content">
                                                <h2 class="ca-main"><span style="color:green;">SITE</span><br />Se connecter</h2>
                                                <h3 class="ca-sub">
                                                    <input type="text" placeholder="Pseudonyme" class="emptyField"/><br />
                                                    <input type="password" placeholder="Mot de passe" class="emptyField"/><br />
                                                    <input type="submit" value="Valider" id="authenticationSubmit"/>
                                                </h3>
                                            </div>
                                        </a>                    
                                    </li>
                                </ul>';
    }

    /**
     * \brief       Retourne le header de l'application lorsque l'utilisateur
     *              s'est connecté
     * \details     Le retour prend en compte HTML5 avec Internet Explorer.
     *
     * \param       $title  Titre de la page web courante.
     * \return      \e String représentant le header de l'application.
     */
    public static function headerLogged( $title )
    {
        return '
                    <!DOCTYPE html>
                    <head>
                        <title>' . $title . '</title>
                        <meta charset="utf-8" />
                        <style type="text/css">
                            <!--
                            body {
                                background-image: url(images/bg.png);

                            }
                            -->
                        </style>
                         <link href="css/style.css" rel="stylesheet" type="text/css" />
                         <link rel="stylesheet" type="text/css" href="css/style9.css" />
                         <link rel="stylesheet" type="text/css" href="css/demo.css" />    
                         <link href="http://fonts.googleapis.com/css?family=Terminal+Dosis" rel="stylesheet" type="text/css" />
                         <style type="text/css">
                            <!--
                            .Stile1 {color: #333333}
                            -->
                        </style>
                    </head>
                    <body>
                        <!-- Start container -->
                        <div class="content">';
    }

    /**
     * \brief       Retourne le footer de l'application
     *
     * \return      \e String représentant le footer de l'application.
     */
    public static function footer()
    {
        return '    </div>
                    <footer>  
                      <div id="footer">
                      <div id="footerleft">
                          <h2>SITES</h2>
                          <ul>
                            <li><a href="http://www.imediacreatives.it">imediacreatives</a></li>
                            <li><a href="http://freehtml5templates.com">freehtml5templates</a></li>
                            <li><a href="http://www.iut-bm.univ-fcomte.fr/"> IUT de Belfort-Montbéliard</a></li>
                          </ul>
                        </div>
                        <div id="footermiddle">
                          <h2>Créateurs & développeurs</h2>
                          <ul>
                            <li><a href="mailto:elodie16.p@gmail.com">Webmaster : Élodie POULIN</a></li>
                            <li><a href="...">Benoît STEIN</a></li>
                            <li><a href="...">Gaël MULLER</a></li>
                          </ul>
                        </div>
                        <div id="footerright">
                          <h2>Créateurs et développeurs</h2>
                          <ul>
                            <li><a href="...">Pierrick TYRODE</a></li>
                            <li><a href="...">Clément AUTUORI</a></li>
                            <li><a href="...">&nbsp;</a></li>
                          </ul>
                        </div>
                        <details>
                    <summary>Copyright &copy; imagineyourwebsite.com -2012.</p></summary>
                    </details>
                        </div>
                    </footer>
                    
                    </div>
                    <!--end container -->

                </body>
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
            </html>';
    }
}

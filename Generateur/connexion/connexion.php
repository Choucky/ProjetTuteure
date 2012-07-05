<?php

$host 	= "localhost"; 	// voir hébergeur
$user 	= "root"; 	// identifiant de votre BD (vide ou "root" en local)
$pass 	= ""; 	// mot de passe de votre BD (vide en local)
$bdd 	= "projetTut"; 	// nom de la BD

/*###################
  #### CONNEXION ####
  ###################*/
@mysql_connect($host,$user,$pass) or die("Impossible de se connecter: ".mysql_error());
?>
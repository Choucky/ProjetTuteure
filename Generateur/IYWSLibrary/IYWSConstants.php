<?php

/**
 * \file 	IYWSConstants.php
 * \author	Elodie POULIN
 * \date	07 Juillet 2012
 * \brief	Définit les constantes de la bibliothèques.
 */

/*! \e Int(0) Signifie un problème de connexion à la base de données. */
 define("IYWS_ERR_DB",0);

/*! \e Int(1) Signifie que l'élément recherché n'existe pas */
 define("IYWS_ERR_NOTEXISTS",1);

/*! \e Int(2) Signifie que tout s'est bien déroulé */
 define("IYWS_OK",2);

/*! \e Int(3) Signifie que tout l'insertion s'est mal déroulée */
 define("IYWS_ERR_INSERT",3);

/*! \e Int(4) Signifie que tout la suppression s'est mal déroulée */
 define("IYWS_ERR_DEL",4);
 
/*! \e Int(5) Signifie que l'enregistrement dans la base de données s'est mal déroulé */
 define("IYWS_ERR_ENR",5);
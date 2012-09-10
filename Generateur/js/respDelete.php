<?php	

	session_start();

	require_once "../imagineyourwebsite.inc.php";

	//On supprime les informations du site web de la bdd
	if( $_GET['action'] == "validDeleteWebsite" )
	{
		$user = new IYWSUser($_SESSION['user']);
		
		$information = new IYWSInformation($_GET["idInformation"]);
		
		$info =	$user->deleteInformations($information);
		
		if( $info == false )
		{
			echo "error";
		}
		else
		{
			echo "success";
		}
	}
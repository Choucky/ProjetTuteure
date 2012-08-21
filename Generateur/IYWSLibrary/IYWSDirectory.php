<?php

/**
 * \file 	IYWSDirectory.php
 * \author	Elodie POULIN
 * \date	21 août 2012
 * \brief 	Définit une structure de données sur les 
 * 			différentes actions rattachées au site web.
 */

require_once "IYWSConstants.php";

class IYWSDirectory extends IYWSDatabase {

	protected $database;
	
	/**
	 * \brief	Constructeur de la classe IYWSDirectory.
	 * \details	Permet d'appeler le constructeur parent.
	 */
	private function IYWSDirectory(){
		parent::IYWSDatabase();
	}
	
	/**
	 * \brief	Verification de l'authentification;
	 * \details	On verifie si le login et le mot de passe
	 * 			saisie existent dans la base de données.
	 * \return	\e boolean qui représentent soit l'echec
	 * 			ou la réussite de l'authenfication.
	 */
	public function Authentication ($login, $pwd){
		try{
			
		}catch (Exception $e){
			$this->error = IYWS_ERR_DB;
			return false;
		}
	}
}
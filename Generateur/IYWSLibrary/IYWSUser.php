<?php

/**
 * \file 	IYWSUser.php
 * \author	Elodie POULIN
 * \date	11 juillet 2012
 * \brief	Définit une structure de données pour les utilisateurs du site.
 */

require_once 'IYWSDatabase';

class IYWSUser
{
	private $login;
	private $mail;

	/**
	 * \brief	Constructeur de la classe IYWSUser
	 * \details	Récupération des informations stockées dans la base de données correspondant à la table USER.	
	 */
	public function IYWSUser($login){
		try {			
			$query = $this->db->query("SELECT * FROM USER WHERE login=".$login);
			$query->setFetchMode(PDO::FETCH_OBJ);
			$array = $query->fetch();

			$this->login = $array->login;
			$this->mail = $array->mail;
		} catch (Exception $e) {
			$this->error = IYWS_ERR_DB;
		}
	}
	
	/**
	 * \brief	Getter du login de l'utilisateur recensé.
	 * \return	\e String représentant le dernier login de l'utilisateur enregistré.
	 */
	public function getLogin(){
		return $this->login;
	}
	
	/**
	 * \brief	Getter du mail de l'utilisateur recensé.
	 * \return 	\e String représentant le dernier mail valide de l'utilisateur enregistré.
	 */
	public function getMail(){
		return $this->mail;
	}
	
	/**
	 * \brief	Getter de toutes les informations recensé.
	 * \return	\e String représentant les dernières informations valide enregistrées
	 */
	public function getAllInformations(){
		return $this->mail;
		return $this->login;
		return $this->pwd;
	}
	
	/**
	 * \brief	Setter du login de l'utilisateur recensé.
	 * \return	Void
	 * \details	Met à jour le login de l'utilisateur.
	 */
	public function setLogin($login){
		$this->login = $login;
	}
	
	/**
	 * \brief	Setter du mail de l'utilisateur recensé.
	 * \return 	Void
	 * \details Met à jour le mail de l'utilisateur.
	 */
	public function setMail($mail){
		$this->mail = $mail;
	}
	
	/**
	 * \brief 	Setter du mot de passe de l'utilisateur recensé.
	 * \return	Void
	 * \details	Met à jour le mot de passe de l'utilisateur.
	 */
	public function setPwd($oldpwd,$newpwd){
		$this->pwd = $oldpwd;
		$this->oldpwd = $newpwd;
	}
}
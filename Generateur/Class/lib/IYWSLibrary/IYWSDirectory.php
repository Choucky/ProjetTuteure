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
	
	private static $instance = NULL;
	private $database;
	
	/**
	 * \brief	Constructeur de la classe IYWSDirectory.
	 * \details	Permet d'appeler le constructeur parent.
	 */
	private function IYWSDirectory(){
		parent::IYWSDatabase();
	}
	
	/**
	 * \brief		Singleton d'instance d'IYWSDatabase
	 * \details    	Permet d'obtenir une instance d'IYWSDatabase de manière unique.
	 * \return    	\e IYWSDatabase représentant une instance de connexion à la
	 *				base de données.
	 */
	public static function instance(){
		if( is_null( self::$instance ) )
		{
			self::$instance = new IYWSDirectory(); 
		}
	
		return self::$instance ;
	}
	
	/**
	 * \brief	Verification de l'authentification;
	 * \details	On verifie si le login et le mot de passe
	 * 			saisie sont correctes.
	 * \param	\e $login 	Login de l'utilisateur.
	 * \param	\e $pwd		Mot de passe de l'utilisateur.
	 */
	public function authentication ($login, $pwd){
		try{
			$query = $this->db->query	("	SELECT id_user, login FROM USER WHERE login=".$this->db->quote($login).
																   "AND pwd=".$this->db->quote(md5($pwd)) 
										);
			$query->setFetchMode(PDO::FETCH_OBJ);
			$array = $query->fetch();
			
			if ($array != false && $array->login==$login){
				$user = new IYWSUser($array->login);
				
				$this->error = IYWS_OK;
				return $user;
			}else {
				$this->error = IYWS_ERR_NOTEXISTS;
				echo "false1";
				return false;
			}
		}catch (Exception $e){
			$this->error = IYWS_ERR_DB;
			echo "false2";
			return false;
		}
	}
	
	/**
	 * \brief	Getter de tous les utilisateurs recensés
	 * \return 	\e Array représentant tous les utilisateurs existants.
	 */
	public function getAllUser(){
		try{
			$query = $this->db->query	("	SELECT login FROM USER ");
			$query->setFetchMode(PDO::FETCH_OBJ);
			$array = $query->fetchAll();
	
			$tab = array();
	
			if ($array != false){
				foreach ($array as $a){
					$user = new IYWSUser($a->login);
					array_push($tab, $user);
				}
				$this->error = IYWS_OK;
				return $tab;
			}else{
				$this->error = IYWS_ERR_NOTEXISTS;
				return false;
			}
		}catch (Exception $e){
			$this->error = IYWS_ERR_DB;
			return false;
		}
	}
	
	/**
	 * \brief	Getter de toutes les informations rencensées.
	 * \return 	\e Array représentant toutes les informations existantes.
	 */
	public function getAllInformations(){
		try{
			$query = $this->db->query	("	SELECT id_info FROM INFORMATIONS ");
			$query->setFetchMode(PDO::FETCH_OBJ);
			$array = $query->fetchAll();
	
			$tab = array();
	
			if ($array != false){
				foreach ($array as $a){
					$info = new IYWSInformation($a->id_info);
					array_push($tab, $info);
				}
				$this->error = IYWS_OK;
				return $tab;
			}else{
				$this->error = IYWS_ERR_NOTEXISTS;
				return false;
			}
		}catch (Exception $e){
			$this->error = IYWS_ERR_DB;
			return false;
		}
	}
	
	/**
	 * \brief	Getter de tous les designs recensés
	 * \return 	\e Array représentant tous les designs existants.
	 */
	public function getAllDesign(){
		try{
			$query = $this->db->query	("	SELECT id_design FROM DESIGN ");
			$query->setFetchMode(PDO::FETCH_OBJ);
			$array = $query->fetchAll();
	
			$tab = array();
				
			if ($array != false){
				foreach ($array as $a){
					$design = new IYWSDesign($a->id_design);
					array_push($tab, $design);
				}
				$this->error = IYWS_OK;
				return $tab;
			}else{
				$this->error = IYWS_ERR_NOTEXISTS;
				return false;
			}
		}catch (Exception $e){
			$this->error = IYWS_ERR_DB;
			return false;
		}
	}
	
	/**
	 * \brief	Fonction ajout d'un utilisateur du site web.
	 * \return	IYWSUser
	 * \param	\e $mail  Mail de l'utilisateur.
	 * \param	\e $pwd   Mot de passe de l'utilisateur.
	 * \param	\e $login Login de l'utilisateur.
	 */
	public function addUser($mail,$pwd,$login){
		try{
			$donnees = $this->db->exec	("	INSERT INTO USER (mail, pwd, login) 
											VALUES ("	.$this->db->quote($mail).","
														.$this->db->quote(md5($pwd)).","
														.$this->db->quote($login).")"
										);
			 if ($donnees == 1){
			 	$query = $this->db->query("	SELECT login, MAX(id_user) AS id_user FROM USER");
			 	$query->setFetchMode(PDO::FETCH_OBJ);
			 	$array = $query->fetch();
			 		
			 	$user = new IYWSUser($array->login);
			 		
			 	$this->error = IYWS_OK;
			 	return $user;
			 }else {
					$this->error = IYWS_ERR_ENR;
					return false;
			 }
		}catch (Exception $e){
			$this->error = IYWS_ERR_DB;
			return false;
		}
	}
	
	/**
	 * \brief	Fonction d'ajout d'un design du site web.
	 * \return	IYWSDesign.
	 * \param	\e $name  Nom du design.
	 * \param	\e $image Lien de l'image du design.
	 * \param	\e $code  Code du design.
	 */
	public function addDesign ($name,$image,$code){
		try{
			$donnees = $this->db->exec	("	INSERT INTO DESIGN (name, image, code) 
											VALUES ("	.$this->db->quote($name).","
														.$this->db->quote($image).","
														.$this->db->quote($code).")"
										);
			
			if ($donnees == 1){
				$query = $this->db->query("	SELECT MAX(id_design) AS id_design FROM DESIGN ");
				$query->setFetchMode(PDO::FETCH_OBJ);
				$array = $query->fetch();
			
				$design = new IYWSDesign($array->id_design);
			
				$this->error = IYWS_OK;
				return $design;
			}else {
				$this->error = IYWS_ERR_ENR;
				return false;
			}
		}catch (Exception $e){
			$this->error = IYWS_ERR_DB;
			return false;
		}
	}
	
	/**
	 * \brief	Fonction suppression d'un utilisateur du site web.
	 * \return	IYWSUser.
	 * \param	\e $user instance d'utilisateur.
	 */
	public function deleteUser($user){
		try {
			if ( $user instanceof IYWSUser){
				$query = $this->db->exec(	"DELETE FROM USER WHERE id_user=".$this->db->quote($user->getId()));
	
				if ($query == 1){
					$this->error = IYWS_OK;
					return true;
				}else {
					$this->error = IYWS_ERR_DEL;
					return false;
				}
			}else {
				$this->error = IYWS_ERR_NOTEXISTS;
				return false;
			}
		} catch (Exception $e) {
			$this->error = IYWS_ERR_DB;
			return false;
		}
	}
	
	/**
	 * \brief	Fonction de suppression d'un design du site web.
	 * \return	IYWSDesign.
	 * \param 	\e $design Instance de design.
	 */
	public function deleteDesign($design){
		try {
			if ($design instanceof IYWSDesign){
				$query = $this->db->exec(	"DELETE FROM DESIGN WHERE id_design=".$this->db->quote($design->getId()));
	
				if ($query == 1){
					$this->error = IYWS_OK;
					return true;
				}else {
					$this->error = IYWS_ERR_DEL;
					echo "false1";
					return false;
				}
			}else {
				$this->error = IYWS_ERR_NOTEXISTS;
				echo "false2";
				return false;
			}
		} catch (Exception $e) {
			$this->error = IYWS_ERR_DB;
			echo "false3";
			return false;
		}
	}
}
<?php

/**
 * \file 	IYWSUser.php
 * \author	Elodie POULIN
 * \date	11 juillet 2012
 * \brief	Définit une structure de données pour les utilisateurs du site.
 */

require_once 'IYWSDatabase.php';

class IYWSUser extends IYWSDatabase
{
	private $login;
	private $mail;
	private $pwd;

	/**
	 * \brief	Constructeur de la classe IYWSUser
	 * \details	Récupération des informations stockées dans la base de données correspondant à la table USER.
	 * \param \e $login Login de l'utilisateur	
	 */
	public function IYWSUser($login){
		parent::IYWSDatabase();
		try {			
			$query = $this->db->query("SELECT id_user, login, mail FROM USER WHERE login=".$this->db->quote($login));
			$query->setFetchMode(PDO::FETCH_OBJ);
			$array = $query->fetch();

			if ( $array != false ){
				$this->id = $array->id_user;
				$this->login = $array->login;
				$this->mail = $array->mail;
				
				$this->error = IYWS_OK;
			}
			else {
				$this->error = IYWS_ERR_NOTEXISTS;
			}
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
	 * \brief	Setter du login de l'utilisateur recensé.
	 * \return	\e IYWSUser
	 * \details	Met à jour le login de l'utilisateur.
	 * \param 	\e $login login de l'utilisateur.
	 */
	public function setLogin($login){
		$this->login = $login;
		return $this;
	}
	
	/**
	 * \brief	Setter du mail de l'utilisateur recensé.
	 * \return 	\e IYWSUser
	 * \details Met à jour le mail de l'utilisateur.
	 * \param 	\e $mail Mail de l'utilisateur.
	 */
	public function setMail($mail){
		$this->mail = $mail;
		return $this;
	}
	
	/**
	 * \brief	Getter de toutes les informations rencensées d'un utilisateur donné.
	 * \return 	\e Array représentant toutes les informations existantes d'un utilisateur donné.
	 */
	public function getAllInfoOwned(){
		try{
			$query = $this->db->query	("	SELECT id_info FROM INFORMATIONS WHERE id_user=".$this->db->quote($this->id));
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
	 * \brief 	Setter du mot de passe de l'utilisateur recensé.
	 * \return	\e IYWSUser
	 * \details	Met à jour le mot de passe de l'utilisateur.
	 * \param	\e $oldpwd Ancien mot de passe de l'utilisateur.
	 * \param	\e $newpwd Nouveau mot de passe de l'utilisateur.
	 */
	public function setPwd($oldpwd,$newpwd){
		//requete pour verifier pwd = oldpwd
		//ne pas recuperer le pwd de la base de donnees
		//Si retourne les bons id alors on change les pwd
		try{
			$query = $this->db->query("SELECT id_user, login FROM USER WHERE pwd=".$this->db->quote(md5($oldpwd)).
																	   "AND login=".$this->db->quote($this->login));
			$query->setFetchMode(PDO::FETCH_OBJ);
			$array = $query->fetch();
			
			//si retourne quelque chose change le pwd sinon non 
			if ($array != false && $array->id_user == $this->id){
				$query = $this->db->exec("UPDATE USER SET pwd=".$this->db->quote(md5($newpwd))
													. "WHERE login=" . $this->db->quote($this->login)
										);
				
				$this->error = IYWS_OK;
			}else {
				$this->error = IYWS_ERR_NOTEXISTS;
			}
		} catch (Exception $e){
			$this->error = IYWS_ERR_DB;
		}
	}
	
	/**
	 * \brief	Storage
	 * \details	Ajout des informations dans la base de données.
	 * \return	true si la requête est exécuté sinon false
	 */
	public function store(){
		try {
			if( $this->login != NULL )
			{
				//On met à jour la base de données
				$query = $this->db->exec("UPDATE USER SET mail=" . $this->db->quote($this->mail)
														. "WHERE login=" . $this->db->quote($this->login)
										);
	
				var_dump($query);
				$this->error = IYWS_OK;
				return true;
			}
			else
			{
				$this->error = IYWS_ERR_NOTEXISTS;
				return false;
			}
		} catch (Exception $e) {
			$this->error = IYWS_ERR_DB;
			return false;
		}
	}
	
	/**
	 * \brief	Fonction ajout des informations	du site web.
	 * \return	IYWSInformation
	 * \param 	\e $title titre du site
	 * \param	\e $section	corps de texte du site
	 * \param	\e $nav menu de navigation du site
	 * \param 	\e $tagline slogan du site
	 * \param 	\e $footer pied de page du site
	 * \param 	\e $id_design id du design du site
	 */
	public function addInformations ($title,$section,$nav,$tagline,$footer,$id_design){
		try {
				$donnees = $this->db->exec("	INSERT INTO INFORMATIONS (title,section,nav,tagline,footer,id_user,id_design) 
												VALUES ("	.$this->db->quote($title).","
															.$this->db->quote($section).","
															.$this->db->quote($nav).","
															.$this->db->quote($tagline).","
															.$this->db->quote($footer).","
															.$this->db->quote($this->id).","
															.$this->db->quote($id_design).")"
											);
				
				if ($donnees == 1){
					$query = $this->db->query("	SELECT MAX(id_info) AS id_info FROM INFORMATIONS ");
					$query->setFetchMode(PDO::FETCH_OBJ);
					$array = $query->fetch();
					
					$information = new IYWSInformation($array->id_info);
					
					$this->error = IYWS_OK;
					return $information;
				}else {
					$this->error = IYWS_ERR_ENR;
					return false;
				}
		} catch (Exception $e) {
			$this->error = IYWS_ERR_DB;
			return false;
		}
	}
	
	/**
	 * \brief	Fonction suppression des informations du site web.
	 * \return	IYWSInformation
	 * \param	\e $information instance d'information
	 */
	public function deleteInformations ($information){
		try {
			if ($information instanceof IYWSInformation){
				$query = $this->db->exec(	"DELETE FROM INFORMATIONS WHERE id_info=".$this->db->quote($information->getId()));
				
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
		}
	}
}
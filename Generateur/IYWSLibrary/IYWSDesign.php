<?php
/**
 * \file 	IYWSDesign.php
 * \author	Elodie POULIN
 * \date	11 juillet 2012
 * \brief	Définit une structure de données pour les design du site.
 */

require_once 'IYWSDatabase';

class IYWSDesign
{
	private $code;
	private $name;
	private $image;

	/**
	 * \brief	Constructeur de la classe IYWSDesign
	 * \details	Récupération des informations stockées dans la base de données correspondant à la table DESIGN.
	 */
	public function IYWSUser($code){
		try {
			$query = $this->db->query("SELECT * FROM USER WHERE code=".$code);
			$query->setFetchMode(PDO::FETCH_OBJ);
			$array = $query->fetch();

			$this->code = $array->code;
			$this->name = $array->name;
			$this->image = $array->image;
		} catch (Exception $e) {
			$this->error = IYWS_ERR_DB;
		}
	}
	
	/**
	 * \brief 	Getter du code du site
	 * \return	\e text représentant les lignes de code pour construire le site internet de l'utilisateur
	 */
	public function getCode(){
		return $this->code;
	}
	
	/**
	 * \brief	Getter du name du site
	 * \return 	\e String représentant le nom du site qui va être créé.
	 */
	public function getName(){
		return $this->name;
	}
	
	/**
	 * \brief	Getter de l'image du site
	 * \return	\e String représentant le lien de l'image du site.
	 */
	public function getImage(){
		return $this->image;
	}
	
	/**
	 * \brief 	Setter du code
	 * \return	Void
	 * \details	Met à jour le code du site.
	 */
	public function setCode($code){
		$this->code = $code;
		return $this;
	}
	
	/**
	 * \brief 	Setter de name
	 * \return	Void
	 * \details	Met à jour le nom du site.
	 */
	public function setName($name){
		$this->name = $name;
		return $this;
	}
	
	/**
	 * \brief	Setter de Image
	 * \return	Void
	 * \details	Met à jour le lien de l'image du site.
	 */
	public function setImage($image){
		$this->image = $image;
		return $this;
	}
}
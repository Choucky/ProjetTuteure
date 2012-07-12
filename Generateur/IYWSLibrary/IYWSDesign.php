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
		parent::IYWSDatabase();
		try {
			//Récupération des informations dans la base de données
			$query = $this->db->query("SELECT * FROM USER WHERE code=".$code);
			$query->setFetchMode(PDO::FETCH_OBJ);
			$array = $query->fetch();

			//Si les infos existe alors on affecte les attributs sinon on retourne une erreur
			if( $array != false ){
				$this->code = $array->code;
				$this->name = $array->name;
				$this->image = $array->image;
				
				$this->error = IYWS_OK;
			}
			else{
				$this->error = IYWS_ERR_NOTEXISTS;
			}
			
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
	 * \return	\e IYWSDesign
	 * \details	Met à jour le code du site.
	 * \param 	\e $code Structure du code pour le design.
	 */
	public function setCode($code){
		$this->code = $code;
		return $this;
	}
	
	/**
	 * \brief 	Setter de name
	 * \return	\e IYWSDesign
	 * \details	Met à jour le nom du site.
	 * \param	\e $name Nom du design du site.
	 */
	public function setName($name){
		$this->name = $name;
		return $this;
	}
	
	/**
	 * \brief	Setter de Image
	 * \return	\e IYWSDesign
	 * \details	Met à jour le lien de l'image du site.
	 * \param	\e $image lien de l'image pour le design du site web.
	 */
	public function setImage($image){
		$this->image = $image;
		return $this;
	}
	
	/**
	 * \brief	Storage
	 * \details	Ajout des informations dans la base de données.
	 * \return	true si la requête est exécuté sinon false
	 */
	public function store(){
		try {
			if( $this->id != NULL )
			{
				//On met à jour la base de données
				$query = $this->db->exec("UPDATE DESIGN SET name=" . $this->db->quote($this->name) . ","
						. "image=" . $this->db->quote($this->image) . ","
						. "code=" . $this->db->quote($this->code)
						. "WHERE id_design=" . $this->db->quote($this->id)
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
}
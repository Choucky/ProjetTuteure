<?php

/**
 * \file 	IYWSInformation.php
 * \author	Elodie POULIN
 * \date	07 Juillet 2012
 * \brief	Définit une structure de données pour les informations d'un site web. 
 */

require_once "IYWSDatabase.php";

class IYWSInformation extends IYWSDatabase
{
	private $title;
	private $section;
	private $nav;
	private $tagline;
	private $footer;
	
	/**
	 * \brief	Constructeur de la classe IYWSInformation
	 * \details	Récupération des informations stockées dans la base de données correspondant à la table informations
	 */
	public function IYWSInformation ($id){
		try{
			$query = $this->db->query("SELECT * FROM INFORMATIONS WHERE id=".$id);
			$query->setFetchMode(PDO::FETCH_OBJ);
			$array = $query->fetch();
			
			$this->id = $array->id_info;
			$this->title = $array->title;
			$this->section = $array->section;
			$this->nav = $array->nav;
			$this->tagline = $array->tagline;
			$this->footer = $array->footer;
			
		}
		catch (Exception $e){
			$this->error = IYWS_ERR_DB;
		}		
	}
	
	/**
	 * \brief	Getter du titre recensé.
	 * \return 	\e String représentant le dernier titre enregistrée.
	 */
	public function getTitle(){
		return $this->title;
	}
	
	/**
	 * \brief	Getter de la section recensé.
	 * \return	\e String représentant le dernier corps de texte enregistré.
	 */
	public function getSection(){
		return $this->section;
	}
	
	/**
	 * \brief 	Getter du nav recensé.
	 * \return 	\e String représentant le dernier menu de navigation enregistré.
	 */
	public function getNav(){
		return $this->nav;
	}
	
	/**
	 * \brief	Getter du tagline recensé.
	 * \return 	\e String représentant le dernier "slogan" du site enregistré.
	 */
	public function getTagline(){
		return $this->tagline;
	}
	
	/**
	 * \brief	Getter du footer recensé.
	 * \return	\e String représentant le dernier pied de page enregistré.
	 */
	public function getFooter(){
		return $this->footer;
	}
	
	/**
	 * \brief 	Setter du titre
	 * \return	Void
	 * \details	Met à jour le titre du site.
	 */
	public function setTitle($title){
		$this->title = $title;
	}
	
	/**
	 * \brief	Setter de la section
	 * \return	Void
	 * \details	Met à jour le corps de texte du site.
	 */
	public function setSection($section){
		$this->section = $section;
	}
	
	/**
	 * \brief	Setter du nav
	 * \return	Void
	 * \details	Met à jour le menu de navigation
	 */
	public function setNav($nav){
		$this->nav = $nav;
	}
	
	/**
	 * \brief 	Setter du tagline
	 * \return 	Void
	 * \details	Met à jour le "slogan" du site
	 */
	public function setTagline($tagline){
		$this->tagline = $tagline;
	}
	
	/**
	 * \brief	Setter du footer
	 * \return	Void
	 * \details	Met à jour le pied de page du site
	 */
	public function setFooter($footer){
		$this->footer = $footer;
	}
}
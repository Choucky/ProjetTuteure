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
		parent::IYWSDatabase();
		try{
            //Récupération des infos dans la BDD
			$query = $this->db->query("SELECT * FROM INFORMATIONS WHERE id_info=" . $this->db->quote($id));
			$query->setFetchMode(PDO::FETCH_OBJ);
			$array = $query->fetch();

            //Les informations existe on affecte les attributs
            if( $array != false )
            {
			    $this->id = $array->id_info;
			    $this->title = $array->title;
			    $this->section = $array->section;
			    $this->nav = $array->nav;
			    $this->tagline = $array->tagline;
			    $this->footer = $array->footer;
	
			    $this->error = IYWS_OK;
            }
            else
            {
                $this->error = IYWS_ERR_NOTEXISTS;
            }
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
	 * \return	\e IYWSInformation
	 * \details	Met à jour le titre du site.
	 * \param 	\e $title Titre de l'information.
	 */
	public function setTitle($title){
		$this->title = $title;
		return $this;
	}
	
	/**
	 * \brief	Setter de la section
	 * \return	\e IYWSInformation
	 * \details	Met à jour le corps de texte du site.
	 * \param	\e $section Corps de texte 
	 */
	public function setSection($section){
		$this->section = $section;
		return $this;
	}
	
	/**
	 * \brief	Setter du nav
	 * \return	\e IYWSInformation
	 * \details	Met à jour le menu de navigation
	 * \param	\e $nav Menu de navigation du site
	 */
	public function setNav($nav){
		$this->nav = $nav;
		return $this;
	}
	
	/**
	 * \brief 	Setter du tagline
	 * \return 	\e IYWSInformation
	 * \details	Met à jour le "slogan" du site
	 * \param 	\e $tagline Slogan du site
	 */
	public function setTagline($tagline){
		$this->tagline = $tagline;
		return $this;
	}
	
	/**
	 * \brief	Setter du footer
	 * \return	\e IYWSInformation
	 * \details	Met à jour le pied de page du site
	 * \param 	\e $footer Pied de page du site
	 */
	public function setFooter($footer){
		$this->footer = $footer;
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
			    $query = $this->db->exec("UPDATE INFORMATIONS SET title=" . $this->db->quote($this->title) . "," 
                                                            . "section=" . $this->db->quote($this->section) . ","
                                                            . "nav=" . $this->db->quote($this->nav) . ","
                                                            . "tagline=" . $this->db->quote($this->tagline) . ","
                                                            . "footer=" . $this->db->quote($this->footer)
                                                            . "WHERE id_info=" . $this->db->quote($this->id) 
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
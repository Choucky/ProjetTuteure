<?php

/**
 * \file 	IYWSDatabase.php
 * \author	Elodie POULIN
 * \date	07 Juillet 2012
 * \brief	Permet la connexion à la base de données.
 */

require_once "IYWSConstants.php";

abstract class IYWSDatabase 
{
	protected $db;
	protected $error;
	protected $id;
	
	/**
	 * \brief	Constructeur de la classe IYWSDatabase
	 * \details	Connexion à la base de données.
	 */
	protected function IYWSDatabase()
	{	
		try{
			 $this->db = new PDO("mysql:host=localhost;dbname=projetTut","root","");
             $this->error = IYWS_OK;
		}
		catch (PDOException $e)
		{
			$this->error = IYWS_ERR_DB;
		}
	}
	
	/**
	 * \brief	Getter de la dernière erreur recensée.
	 * \return 	\e Int représentant la dernière erreur enregistrée.
	 */
	public function getError()
	{
		return $this->error;
	}
	
	/**
	 * \brief 	Getter de l'id correspondant à la classe héritant de IYWSDatabase.
	 * \return	\e Int représentant l'id de la classe correspondante.
	 */
	public function getId()
	{
		return $this->id;
	}
	
}
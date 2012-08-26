<?php

    require_once "lib.inc.php";
        
    /**
     * TEST DE INFORMATION
     */
    echo "Test de IYWSInformation.php <br />";
    
    /*$info = new IYWSInformation( 1 );

    echo $info->getError();

    echo $info->getTitle() . "," . $info->getSection() . "," . $info->getNav() . "," . $info->getTagline() . "," . $info->getFooter() . "<br />";

    $info  ->setTitle("titleTest")
           ->setSection("sectionTest")
           ->setNav("navTest")
           ->setTagline("tagTest")
           ->setFooter("footerTest");

    echo $info->getTitle() . "," . $info->getSection() . "," . $info->getNav() . "," . $info->getTagline() . "," . $info->getFooter() . "<br />";

    var_dump( $info->store() );

    echo $info->getError();*/

    /**
     * TEST DE DESIGN
     */
    echo "<br />";
    
    echo "<br /> Test de IYWSDesign.php <br />";
    
    /*$design = new IYWSDesign( 1 );
    
    echo $design->getError();
    
    echo $design->getName() .",". $design->getImage() .",". $design->getCode() ."<br />";
    
    $design	->setName("NameTest")
    		->setImage("ImageTest")
    		->setCode("CodeTest");
    
    echo $design->getName() .",". $design->getImage() .",". $design->getCode() ."<br />";
    
    var_dump( $design->store() );
    
    echo $design->getError();*/
    
    /**
     * TEST DE USER
     */
    echo "<br />";
    
    echo "<br /> Test de IYWSUser.php <br />";
    
    /*$user = new IYWSUser("epoulin");
    echo $user->getError();
    //echo $user->getAllInformations()."<br />";
    echo $user->getLogin() .",". $user->getMail() ."<br />";
    $user 	->setMail("testtest@gmail.com")
    		->setPwd("elodie", "pwdtest");
    echo $user->getError();
    echo $user->getLogin() .",". $user->getMail() ."<br />";
    
  	var_dump($user->store());
    echo $user->getError();*/
    /*$user = new IYWSUser("epoulin");
    $receve = $user->addInformations("title2","section","nav","tagline","footer",1);
    var_dump($receve);
    $user->deleteInformations($receve);
	echo $user->getError();*/
	
	/**
	 * TEST DE DIRECTORY
	 */
	echo "<br />";
	
	echo "<br /> Test de IYWSDirectory.php <br />";
	
	//Ajout d'un utilisateur
	/*IYWSDirectory::instance()->getError();
	var_dump(IYWSDirectory::instance()->addUser("mailDirectory10","pwdDirectory10","loginDirectory10"));
	IYWSDirectory::instance()->getError();*/
	
	//Ajout d'un design
	/*IYWSDirectory::instance()->getError();
	var_dump(IYWSDirectory::instance()->addDesign("nameDirectory","imageDirectory","codeDirectory"));
	IYWSDirectory::instance()->getError();*/
	
	//Suppression d'un design
	/*$design = IYWSDirectory::instance()->addDesign("nameDirectory4","imageDirectory4","codeDirectory4");
	var_dump(IYWSDirectory::instance()->deleteDesign($design));*/
		
	//Authentification
	IYWSDirectory::instance()->getError();
	var_dump(IYWSDirectory::instance()->Authentication("epoulin","elodie"));
	IYWSDirectory::Instance()->getError();
?>
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
    $receve = $user->AddInformations("title2","section","nav","tagline","footer",1);
    var_dump($receve);
    $user->DeleteInformations($receve);
	echo $user->getError();*/
	
	/**
	 * TEST DE DIRECTORY
	 */
	echo "<br />";
	
	echo "<br /> Test de IYWSDirectory.php <br />";
	
	//Ajout d'un utilisateur
	/*IYWSDirectory::Instance()->getError();
	var_dump(IYWSDirectory::Instance()->addUser("mailDirectory10","pwdDirectory10","loginDirectory10"));
	IYWSDirectory::Instance()->getError();*/
	
	//Ajout d'un design
	/*IYWSDirectory::Instance()->getError();
	var_dump(IYWSDirectory::Instance()->addDesign("nameDirectory","imageDirectory","codeDirectory"));
	IYWSDirectory::Instance()->getError();*/
	
	//Suppression d'un design
	$design = IYWSDirectory::Instance()->addDesign("nameDirectory4","imageDirectory4","codeDirectory4");
	var_dump(IYWSDirectory::Instance()->deleteDesign($design));
		
	//Authentification
	/*IYWSDirectory::Instance()->getError();
	var_dump(IYWSDirectory::Instance()->Authentication("loginDirectory","pwdDirectory"));
	IYWSDirectory::Instance()->getError();*/
?>
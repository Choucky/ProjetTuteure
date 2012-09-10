<?php

    require_once "lib.inc.php";
        
    // TEST IYWSDirectory : deleteUser
/*
    $p =  IYWSDirectory::Instance()->addUser( "bb", "cc", "ddd" );
    var_dump( $p );

    IYWSDirectory::Instance()->deleteUser( $p );
*/

    // TEST : addDesign, deleteDesin
/*
    $d = IYWSDirectory::Instance()->addDesign ("nam","d","c");

    IYWSDirectory::Instance()->deleteDesign ($d);
*/

    var_dump( IYWSDirectory::Instance()->Authentication( "epoulin", "elodie" ) );

?>

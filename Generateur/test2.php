<?php
require_once "lib.inc.php";

// TEST IYWSDirectory : deleteUser

$p =  IYWSDirectory::Instance()->addUser( "bb", "cc", "ddd" );
var_dump( $p );

IYWSDirectory::Instance()->deleteUser( $p );

?>
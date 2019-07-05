<?php

include "includes/dbh.inc.php";
//Singelton is a class that can have only one instance

class singelton {

    private function __construct() {
        
    }

    public static function getInstance() {
        //static $conn = null;
      
        
        return $conn;
    }

}

?>

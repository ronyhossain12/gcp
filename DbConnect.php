<?php

include 'Config.php';

class DbConnect {

    public $conn;

    function __construct() {        
    }

    /**
     * Establishing database connection
     * @return database connection handler
     */
    function connect() {
        //include_once dirname(__FILE__) . '/Config.php';

        // Create connection
        $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
       // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }else{
            echo 'Connection Succesful';
        }

        return $conn;
    }

}

?>

<?php
/**
 * Created by PhpStorm.
 * User: rayli
 * Date: 8/28/2016
 * Time: 5:01 PM
 */

// Define $myusername and $mypassword

include 'DbHandler.php';


$method_name = $_GET['method'];

switch ($method_name) {
    case "login":

        //$myusername=$_GET['username'];
        $myusername=$_GET['username'];
        $mypassword = $_GET['password'];
        $did=$_GET['did'];

        DbHandler::checkLogin($myusername,$mypassword,$did);
        break;

    case "register":

        $did=$_GET['did'];
        $username=$_GET['username'];
        $email=$_GET['email'];
        $password = $_GET['password'];
        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $user_type = $_GET['user_type'];
        $authen_key = 'AASDd£Addhkhkukh*'
     
        DbHandler::register($did,$username,$email,$password,$name, $authen_key, $phone, $user_type);

        break;
    default:
        echo "No request has been given to server";
}




// Connect to server and select databse.



?>
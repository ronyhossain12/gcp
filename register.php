<?php

include 'DbHandler.php';

$obj = new DbHandler();

/*
echo '<br>Testing using right email and password: ';
$obj->checkLogin('akib', 'password');

echo '<br>Testing using incorrect email and password: ';
$obj->checkLogin('akiba', 'password');

echo '<br>Testing if user exists: ';

if($obj->isUserExists('adam29@gmail.com')) {
    echo 'True';
} else {
    echo 'False';
}

*/

echo '<br>Testing registration: ';

$username = $_GET['username'];
$password = $_GET['password'];
$did = $_GET['did'];
$email = $_GET['email'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$phone = $_GET['phone'];
$user_type = $_GET['user_type'];
$obj->register($username,$password,$did,$email,$fname, $lname,$phone, $user_type);


?>
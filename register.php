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

$username = $_POST['username'];
$password = $_POST['password'];
$did = $_POST['did'];
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$user_type = $_POST['user_type'];
$obj->register($username,$password,$did,$email,$fname, $lname,$phone, $user_type);


?>

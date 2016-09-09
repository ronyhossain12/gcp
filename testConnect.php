<?php

include 'DbHandler.php';

$obj = new DbHandler();

echo '<br>Testing using right email and password: ';
$obj->checkLogin('akib', 'password');

echo '<br>Testing using incorrect email and password: ';
$obj->checkLogin('akiba', 'password');

?>
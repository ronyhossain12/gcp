<?php

include 'DbHandler.php';

$obj = new DbHandler();

$obj->checkLogin('akib', 'password');

?>
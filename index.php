<?php

$url = $_GET['url'];

require "controllers/$url.php" ;


$controller = new $url ; 

//when we request  a url like "test.com/home" it reloads a controller
//
//and if we request "test.com/home/index" it reloads a controller `home` with method `index`
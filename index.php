<?php

//to let the request branched into `controller` and `method` .
//ex: home/index -> controller `home` , method `index` . 
$url = $_GET['url'];
//in case if there is a lot of slashes
$url = rtrim($url,'/');
$url = explode('/',$url);


//controllers
require "controllers/$url[0].php" ;
$controller = new $url[0] ; 

//more argumet  [id]   posts/sports/id
if (isset($url[2])) {
	$controller->{$url[1]}(10);
} else {
	//methods
	if (isset($url[1])) {
		$controller->{$url[1]}();
	}
}




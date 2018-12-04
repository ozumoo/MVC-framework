<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';

#ToDo use [autoloader]
function __autoload($class)
{	
	$className = LIBS . $class . ".php"; 
	require  $className;
}
$app = new Bootstrap;
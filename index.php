<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config/database.php';
require 'config/paths.php';
require 'config/constants.php';

#ToDo use [autoloader]
function __autoload($class)
{	
	$className = LIBS . $class . ".php"; 
	require  $className;
}
$app = new Bootstrap;
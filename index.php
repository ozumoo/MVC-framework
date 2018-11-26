<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
#ToDo use [autoloader]
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';
//Library
require 'libs/Database.php';
require 'libs/Session.php';
require 'libs/Hash.php';

require 'config/database.php';
require 'config/paths.php';
require 'config/constants.php';
$app = new Bootstrap;

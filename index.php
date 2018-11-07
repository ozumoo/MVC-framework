<?php
//encapsulate everything in bootstrap
//#todo use autoloader
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/View.php';
require 'libs/Model.php';

require 'config/database.php';
require 'config/paths.php';
$app = new Bootstrap;
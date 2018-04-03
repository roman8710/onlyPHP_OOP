<?php
// Turn off all error reporting
error_reporting(0);

//Classes
include("classes/DB.php");
include("classes/HTML.php");

//Conexion Data 
$dataCon = array(
	'host' => 'localhost',
	'user' => 'root',
	'pass' => '',
	'db' => 'examples');

//Object DB
$db = new DB($dataCon);
?>
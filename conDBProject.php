<?php
include("classes/DB.php");

$dataCon = array(
	'host' => 'localhost',
	'user' => 'root',
	'pass' => '',
	'db' => 'examples');

$db = new DB($dataCon);
?>
<?php
include("classes/easyHTML.php");
include("classes/DB.php");

$html = new easyHTML();
echo $html->header();

$dataCon = array(
	'host' => 'localhost',
	'user' => 'root',
	'pass' => '',
	'db' => 'examples');

$db = new DB($dataCon);
$data = $db->select('users');

$titles = array('#', 'First Name', 'Last Name', 'Phone Number', 'Email', 'Address', 'Photo', 'Date & Time');
echo $html->record($titles, $data);


echo $html->footer();
?>
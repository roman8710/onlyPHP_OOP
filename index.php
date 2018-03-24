<?php
include("classes/easyHTML.php");
include("conDBProject.php");

$html = new easyHTML();
echo $html->header();


$data = $db->select('users');

$titles = array('#', 'First Name', 'Last Name', 'Phone Number', 'Email', 'Address', 'Photo', 'Date & Time');

$event = "javascript:charge('form', 'formUser.php')";

echo '<div>'.$html->button('New User', 'btn btn-primary', 'fas fa-plus-circle', $event).'</div>';
echo $html->addSection('form');
echo $html->record($titles, $data);


echo $html->footer();
?>
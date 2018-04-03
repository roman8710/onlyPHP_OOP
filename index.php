<?php
include("configProject.php");

$html = new HTML();
echo $html->header();


$data = $db->select('users');

$titles = array('#', 'First Name', 'Last Name', 'Phone Number', 'Email', 'Address', 'Photo', 'Date & Time');

$event = "javascript:charge('newform', 'formUser.php')";

echo '<br><div>'.$html->button('New User', 'btn btn-primary', 'fas fa-plus-circle', $event).'</div><br>';
echo $html->addSection('newform');
echo $html->record($titles, $data, 'record');


echo $html->footer();
?>
<?php
include("configProject.php");

$cId = $db->conexId();
$id = mysqli_real_escape_string($cId, $_REQUEST['id']);
if($id)
{
	$data = $db->delete('users', "id='".$id."'");
}

$html = new HTML();
$data = $db->select('users');

$titles = array('#', 'First Name', 'Last Name', 'Phone Number', 'Email', 'Address', 'Photo', 'Date & Time');	
echo $html->record($titles, $data, 'record');
?>
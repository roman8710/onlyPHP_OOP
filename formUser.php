<?php
include("conDBProject.php");
include("classes/Form.php");

/*if($_REQUEST['id']){
	$data = $db->select("users", "", "id = '".$REQUEST['id']."'");
	$values = $data[0];
	$action = "actualizar.php";
}
else{*/
	$action = "insertar.php";	
//}
$form = new Form('POST', $action, 'form');
$form->inputs("fName", "text", "First Name", "", 1);
$form->inputs("lName", "text", "Last Name", "", 1);
$form->inputs("pNumber", "tel", "Phone Number", "", 1);
$form->inputs("email", "email", "E-mail", "", 1);
$form->inputs("address", "text", "Address", "", 1);
$form->inputs("photo", "file", "Photo", "", 1);
$form->buttons("submit", "Submit");
echo $form->commit();



?>
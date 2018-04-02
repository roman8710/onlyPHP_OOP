<?php
include("conDBProject.php");

/*
Array ( [MAX_FILE_SIZE] => 2097152 [name_form] => form [zebra_honeypot_form] => [zebra_csrf_token_form] => 6d148cd9dbd1a37054fff0333e3e5376 [firstname] => eee [lastname] => eee [phonenumber] => 832-2740687 [email] => eeee@dddd.com [address] => ee [btnsubmit] => Submit ) 

Array ( [file] => Array ( [name] => dragon_ball_gt.krillin.jpg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\phpF631.tmp [error] => 0 [size] => 34929 ) )
*/

$cId = $db->conexId();
$id = mysqli_real_escape_string($cId, $_POST['id']);
$firstname = mysqli_real_escape_string($cId, $_POST['firstname']);
$lastname = mysqli_real_escape_string($cId, $_POST['lastname']);
$phonenumber = mysqli_real_escape_string($cId, $_POST['phonenumber']);
$email = mysqli_real_escape_string($cId, $_POST['email']);
$address = mysqli_real_escape_string($cId, $_POST['address']);
$photo = mysqli_real_escape_string($cId, $_FILES['file']['name']);

//VALIDATION VALUES
if($firstname && $lastname && $phonenumber && $email && $address) 
{
	$values = array(
	'first_name' => "'".$_POST['firstname']."'",
	'last_name' => "'".$_POST['lastname']."'",
	'phone_number' => "'".$_POST['phonenumber']."'",
	'email' => "'".$_POST['email']."'",
	'address' => "'".$_POST['address']."'",
	'date' => "'".date('Y-m-d H:i:s')."'"
	);

	if($photo)
	{
		$values['photo'] = "'".$_FILES['file']['name']."'";
	}
	//VALIDATION ABOUT IMAGE
	if($_FILES['file']['name'])
	{
		$img = copy($_FILES['file']['tmp_name'], 'photosUsers/'.$_FILES['file']['name']);
		if(!$img)
		{
			echo "pro img";
			//header("location: index.php");	
		}
	}
	if($id)
	{
		// UPDATE ROW IN USERS WITH PK ID 	
		$db->update("users", $values, "id='".$id."'");
		header("location: index.php");
	} else {
		// INSERTS ROW IN USERS
		$db->insert("users", $values);	
		//header("location: index.php");
		echo "insert";
	}
}
?>
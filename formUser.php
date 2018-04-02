<?php
include("conDBProject.php");

// include the Zebra_Form class
require 'classes/form/Zebra_Form.php';

    // instantiate a Zebra_Form object
	//array('return sendForm(form, url, id)'); , 'onsubmit' => 'return false'
    $form = new Zebra_Form('form', 'post', 'actionsData.php', array('autocomplete' => 'off', 'enctype' => 'multipart/form-data'));

    $cId = $db->conexId();
	$id = mysqli_real_escape_string($cId, $_REQUEST['id']);
	if($id)
	{
		$data = $db->select('users', '*',"id='".$id."'");
		//print_r($data);
		//Array ( [0] => Array ( [0] => 1 [1] => Roman [2] => Gutierez [3] => 832-2740687 [4] => roman710@gmail.com [5] => Bronx, NY [6] => 0 [7] => 2018-03-22 12:29:00 ) )
		$row = $data[0];
		$obj = $form->add('hidden', 'id', $row[0]);
	}

    // the label for the "first name" element
    $form->add('label', 'label_firstname', 'firstname', 'First name:');

    // add the "first name" element
    $obj = $form->add('text', 'firstname', $row[1]);

    // set rules
    $obj->set_rule(array(

        // error messages will be sent to a variable called "error", usable in custom templates
        'required'  =>  array('error', 'First name is required!'),

    ));

    // "last name"
    $form->add('label', 'label_lastname', 'lastname', 'Last name:');
    $obj = $form->add('text', 'lastname', $row[2]);
    $obj->set_rule(array(
        'required' => array('error', 'Last name is required!')
    ));

    // "phone number"
    $form->add('label', 'label_phonenumber', 'phonenumber', 'Phone Number:');
    $obj = $form->add('text', 'phonenumber', $row[3]);
    $obj->set_rule(array(
        'required' => array('error', 'Phone Number is required!'),
        'regexp'    => array('^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$', 'error', 'Validates only Phone Numbers')
    ));


    // "email"
    $form->add('label', 'label_email', 'email', 'Email address:');
    $obj = $form->add('text', 'email', $row[4]);
    $obj->set_rule(array(
        'required'  => array('error', 'Email is required!'),
        'email'     => array('error', 'Email address seems to be invalid!')
    ));

    // attach a note to the email element
    $form->add('note', 'note_email', 'email', 'Please enter a valid email address. An email will be sent to this
    address with a link you need to click on in order to activate your account', array('style'=>'width:200px'));

    $form->add('label', 'label_address', 'address', 'Address:');
    // add the "first name" element
    $obj = $form->add('text', 'address', $row[5]);
    // set rules
    $obj->set_rule(array(
        // error messages will be sent to a variable called "error", usable in custom templates
        'required'  =>  array('error', 'Address is required!'),
    ));
    $form->add('note', 'note_address', 'address', 'Please enter a valid address. Ex: City, ST(State)', array('style'=>'width:200px'));



     // the label for the "file" element
    $form->add('label', 'label_file', 'file', 'Upload an Image');

    // add the "file" element
    $obj = $form->add('file', 'file');

    // set rules
    $obj->set_rule(array(

        // error messages will be sent to a variable called "error", usable in custom templates
        //'required'  =>  array('error', 'An image is required!'),
        'upload'    =>  array('tmp', ZEBRA_FORM_UPLOAD_RANDOM_NAMES, 'error', 'Could not upload file!<br>Check that the "tmp" folder exists inside the "examples" folder and that it is writable'),

        // notice how we use the "image" rule instead of the "filetype" rule (used in previous example);
        // the "image" rule does a thorough checking aimed specially for images
        'image'  =>  array('error', 'File must be a jpg, png or gif image!'),
        'filesize'  =>  array(102400, 'error', 'File size must not exceed 100Kb!'),

    ));

    // attach a note
    $form->add('note', 'note_file', 'file', 'File must have the .jpg, .jpeg, png or .gif extension, and no more than 100Kb!');

    // "submit"
    //$event = array('onclick' => "javascript:sendForm('form', 'prueba.php', 'record');"); , $event
    
    $form->add('submit', 'btnsubmit', 'Submit');

    // if the form is valid
    if ($form->validate()) {

        // show results
        show_results();

    // otherwise
    } else

        // generate output using a custom template
        $form->render('*horizontal');

?>
<?php

class easyHTML {
	
	public function header() {
		$header = '';
		$header .='<!DOCTYPE html>';
		$header .='<html lang="en" dir="ltr">';
		$header .='<head>';
		$header .='<meta charset="UTF-8"/>';
		$header .='<title>Example PHP OOP with Bootstrap and Jquery</title>';
		$header .='<link rel="stylesheet" href="css/bootstrap.min.css" >';
		$header .='<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">';
		$header .='<link rel="stylesheet" href="classes/form/libraries/highlight/public/css/ir_black.css" type="text/css">';
        $header .='<link rel="stylesheet" href="classes/form/public/css/reset.css" type="text/css">';
        $header .='<link rel="stylesheet" href="classes/form/public/css/style.css" type="text/css">';
        $header .='<link rel="stylesheet" href="classes/form/public/css/zebra_form.css" type="text/css">';
		$header .='<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>';
		$header .='<script src="functions.js"></script>';
		$header .='</head>';
		$header .='<body>';
		return $header;
	}

	public function footer() {
		$footer =''; 
		$footer .= '<script type="text/javascript" src="classes/form/libraries/highlight/public/javascript/highlight.js"></script>';
        $footer .= '<script type="text/javascript" src="classes/form/public/javascript/jquery-1.12.0.js"></script>';
        $footer .= '<script type="text/javascript" src="classes/form//public/javascript/zebra_form.js"></script>';
        $footer .= '<script type="text/javascript" src="classes/form/public/javascript/core.js"></script>';
		$footer .='</body>';
		$footer .='</html>';
		return $footer;
	}

	public function addSection($id){
		return '<div id="'.$id.'"></div>';
	}

	public function button($text, $class, $icon, $event=''){
		$boton = '<button type="button" class="'.$class.'"';
		$boton .= ($event)? ' onclick="'.$event.'"' : '';
		$boton .= '><i class="'.$icon.'"></i> '.$text.'</button>';
		return $boton;
	}

	public function record($titles, $array, $id=''){
		$data = '';
		$data .= ($id)? '<div id='.$id.'>' : ''; 
		$data .= '<table class="table table-bordered">';
		$data .= '<thead class="thead-light">';

		$data .= '<tr>';
		foreach($titles as $title){	
			$data .= '<th scope="col">'.$title.'</th>';
		}
		$data .= '<th scope="col"colspan="2">&nbsp;</td>';
		$data .= '</tr>';
		$data .= '</thead>';

		foreach($array as $row){
			$data .= '<tr>';
				$a = 0;
				foreach($row as $col){
					if($a != 6) {
						$data .= '<td>'.$col.'</td>';
					}else{
						$data .= '<td><img class="rounded-circle" src="photosUsers/'.$row[6].'" width="60px" height="auto"/></td>';
					}
					$a++;
				}
				
				
				$data .= '<td>'.$this->button('Change', 'btn btn-success', 'fas fa-pencil-alt', "javascript:charge('newform', 'formUser.php?id=".$row[0]."')").'</td>';
				$data .= '<td>'.$this->button('Delete', 'btn btn-danger', 'fas fa-trash-alt', "javascript:charge('record', 'actionDelete.php?id=".$row[0]."')").'</td>';
			$data .= '</tr>';
		}
		$data .= '</table>';
		$data .= '</div>';
		return $data;
	}
	
} 
?>
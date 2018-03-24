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
		$header .='<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>';
		$header .='<script src="functions.js"></script>';
		$header .='</head>';
		$header .='<body>';
		return $header;
	}

	public function footer() {
		$footer = '';
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
		$data .= ($id)? $this->addSection($id) : ''; 
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
				foreach($row as $col){
					$data .= '<td>'.$col.'</td>';
				}
				$data .= '<td>'.$this->button('Change', 'btn btn-success', 'fas fa-pencil-alt').'</td>';
				$data .= '<td>'.$this->button('Delete', 'btn btn-danger', 'fas fa-trash-alt').'</td>';
			$data .= '</tr>';
		}
		$data .= '</table>';
		$data .= '</div>';
		return $data;
	}
	
} 
?>
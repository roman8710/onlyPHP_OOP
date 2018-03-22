<?php

class easyHTML {
	
	public function header() {
		$header = '';
		$header .='<!DOCTYPE html>';
		$header .='<html lang="en" dir="ltr">';
		$header .='<head>';
		$header .='<meta charset="UTF-8"/>';
		$header .='<title>Example PHP OOP with Bootstrap and Jquery</title>';
		$header .='<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
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

	public function record($titles, $array){
		$data = '';
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
				$data .= '<td>Change</td>';
				$data .= '<td>Delete</td>';
			$data .= '</tr>';
		}
		$data .= '</table>';
		return $data;
	}

	public function form(){
		$form = '';
		//(array_expression as $key => $value)

	}

	public function input($name, $type, $required=0){
		/*if($type=='text' || $type=='number' || $type='email'){}
		$input = '';
		//(array_expression as $key => $value)
*/
	}
} 
?>
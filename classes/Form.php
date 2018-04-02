<?php 
class Form {
	var $formIni;
	var $formEnd;
	var $form;
	var $action;

	public function __construct($method, $action, $id, $sendId){
		$this->formIni = '<form method="'.$method.'"  id="'.$id.'" enctype="multipart/form-data" onsubmit="sendForm('.$id.','.$action.','.$sendId.')">';
		$this->formIni = '<table class="table-striped table-bordered">';
		$this->formEnd = '</table>';
		$this->formEnd = '</form>';
		$this->form = '';
		$this->action = $action;
	}	

	public function button($text, $class, $icon, $event=''){
		$boton = '<button type="button" class="'.$class.'"';
		$boton .= ($event)? ' onclick="'.$event.'"' : '';
		$boton .= '><i class="'.$icon.'"></i> '.$text.'</button>';
		return $boton;
	}

	public function inputs($name, $type, $text, $value=''){
		if($type == 'text' || $type == 'number' || $type == 'email' || $type == 'tel' || $type == 'url' || $type == 'date' || $type == 'file'){
			$field = '<input type="'.$type.'" name="'.$name.'" id="'.$name.'" placeholder="Enter '.ucwords($text).'">';
			$this->form .= '<tr><td>'.ucwords($text).'</td><td>'.$field.'</td></tr>';
		}
	}

	public function buttons($type, $text){
		if($type == 'reset' || $type == 'submit' ){
			$field = '<input type="'.$type.'" value="'.$text.'">';
			$this->form .= '<tr><td colspan="2">'.$field.'</td></tr>';
		}
	}

	public function commit(){
		$formC = $this->formIni.$this->form.$this->formEnd;
		$this->formIni= $this->form= $this->formEnd = '';
		return $formC;
	}
}
?>
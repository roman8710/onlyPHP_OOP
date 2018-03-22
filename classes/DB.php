<?php 
class DB {
	public $conMysqli;

	public function __construct($array){
		$this->conMysqli = new mysqli($array['host'], $array['user'], $array['pass'], $array['db']);
		return $this->conMysqli;
	}

	public function query($query, $con=''){
		if(!$con) { $con = $this->conMysqli; }
		$result = $con->query($query);

		if($result->num_rows > 0)
		{
			$data[] = $result->fetch_row();
		}
		return $data;
		mysqli_free_result($result);
	}

	public function select($table, $cols='',$conditions='', $order='', $limit=''){
		if($cols){ $fields = implode($cols, ","); }
		else{ $fields = "*";}

		$select = "SELECT ".$fields." FROM ".$table;
		
		if($conditions){
			$select .= " WHERE ".$conditions;
		}
		if($order){
			$select .= " ORDER BY ".$order;
		}
		if($limit){
			$select .= " LIMIT ".$limit;
		}

		return $this->query($select);
	}




	public function close($con=''){
		if(!$con) { $con = $this->conMysqli; }
		mysqli_close($con);
	}


}
?>
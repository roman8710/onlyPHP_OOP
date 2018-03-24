<?php 
class DB {
	public $conMysqli;

	public function __construct($array){
		$this->conMysqli = new mysqli($array['host'], $array['user'], $array['pass'], $array['db']);
		return $this->conMysqli;
	}

	public function query($query, $type, $con=''){
		if(!$con) { $con = $this->conMysqli; }
		$result = $con->query($query);
		switch($type){
			case 1: //INSERT
				return $con->insert_id;
			break;
			case 2: //SELECT
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_row()){
						$data[] = $row;
					}
				}
				return $data;
			break;
			case 3: //UPDATE
			case 4: //DELETE
				return mysqli_affected_rows($result);
			break;
		}
		mysqli_free_result($result);
	}

	public function insert($table, $array){
		
		$sentence = "INSERT INTO ".$table;
		
		$keys = array_keys($array);
		$values = array_values($array);

		$fields = implode(",", $keys);
		$vals = implode(",", $values);

		if($fields && $vals){
			$sentence .= " (".$fields.") VALUES (".$vals.")";
			return $this->query($sentence, 1);
		}
		else {
			return 0;
		}
	}

	public function select($table, $cols='',$conditions='', $order='', $limit=''){
		if($cols){ $fields = implode($cols, ","); }
		else{ $fields = "*";}

		$sentence = "SELECT ".$fields." FROM ".$table;
		
		if($conditions){
			$sentence .= " WHERE ".$conditions;
		}
		if($order){
			$sentence .= " ORDER BY ".$order;
		}
		if($limit){
			$sentence .= " LIMIT ".$limit;
		}

		return $this->query($sentence, 2);
	}

	public function update($table, $array, $conditions){
		
		$sentence = "UPDATE FROM ".$table;
		$fields ="";
		foreach ($array as $key => $val)
		{
			if($fields){ $fields .=", "; }
			$fields .= $key." = ".$val; 
		}
		
		if($fields && $conditions){
			$sentence .= " SET ".$fields;
			$sentence .= " WHERE ".$conditions;
		
			return $this->query($sentence, 3);
		}
		else {
			return 0;
		}
	}

	public function delete($table, $conditions){
		
		$sentence = "DELETE FROM ".$table;
		
		if($conditions){
			$sentence .= " WHERE ".$conditions;
		}
		return $this->query($sentence, 4);
	}


	public function close($con=''){
		if(!$con) { $con = $this->conMysqli; }
		mysqli_close($con);
	}


}
?>
<?php 

class Insert extends Database
{
	private $tablename;
	private $data;
	function __construct($tablename, $data) {
		$this->tablename = $tablename;
		$this->data = $data;
		$this->connectToDb();
	}
	function insertData() {
		$query = "INSERT INTO $this->tablename";
		foreach ($this->data as $key => $value) {
			$keys[] = $key;
			$values[] = $value;
		}
		$query .= "(`".implode($keys, "`,`"). "`) VALUES";
		$query .= "('".implode($values, "','"). "')";
		echo $query;
		$res=mysql_query($query);
	}
}

?>
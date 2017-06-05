<?php

class Select extends Database
{
	private $tabname;

	function __construct($tablename) {
		$this->connectToDb();
		$this->tabname = $tablename;
	}
	

	function getElementBySocid($socid) {
		$query = "SELECT `socid` FROM $this->tabname WHERE socid = $socid";
		if ($res=mysql_query($query)) {
			$data = mysql_fetch_array($res);
		} return $data;
	}
	
	function getAllElements() {
		$query = "Select * from $this->tabname";
		if ($res=mysql_query($query)) {
			for ($i=0;$i<mysql_num_rows($res);$i++) {
				$data[$i] = mysql_fetch_array($res);
			}
		} return $data;
	} 
	
	function getDataWithParametrs($params) {
		$query = "Select * from $this->tabname Where ";
		foreach ($params as $key => $value) {
				$query .= "$key = '$value' AND ";
			}
			$query = substr($query, 0, -4);
			echo $query;
			if ($res=mysql_query($query)) {
			for ($i=0;$i<mysql_num_rows($res);$i++) {
				$data[$i] = mysql_fetch_array($res);
				}
			} return $data;

	}
}
?>
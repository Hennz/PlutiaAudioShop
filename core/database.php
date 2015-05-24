<?php
class Database {
	public function connectDB($serverDB,$userDB,$passDB,$DBName) {
		try {
			if(!$link = mysql_connect($serverDB,$userDB,$passDB)) {
		    	throw new Exception("Can't connect to server: ".mysql_error());
			}
		  	if(!$database = mysql_select_db ($DBName, $link)) {
		    	throw new Exception("Can't select database: ".mysql_error());
		  	}
		}
		catch (Exception $e) {
			echo "Error: ". $e->getMessage();
		}
	}
	
	public function selectDB($namatabel,$namakolom,$isikolom,$kolomyangdiambil) {
		try {
			$wheredb = " WHERE ".$namakolom." = '".$isikolom."'";
			$query = "SELECT * FROM {$namatabel}{$wheredb}";
			if(!$result = mysql_query($query)) {
				throw new Exception("Can't select to table: ".mysql_error());
			}
			while ($row = mysql_fetch_assoc($result)) {
				$hasilquery =  $row[$kolomyangdiambil];
			}			
		} catch (Exception $e) {
			$hasilquery = "Error: ". $e->getMessage();
		}
		return $hasilquery;
	}
	
	public function selectArray($kolom) {
		$array = array();
		$rs = mysql_query("SELECT * FROM {$kolom}");
		array_push($array, mysql_fetch_array($rs));
		return $array;
	}
	
	public function insertDB($tablename, $coloum, $value) {
		try {
			$tablesdata = $tablename."(".$coloum.")";
			$values = $value;
			$query = "INSERT INTO ".$tablesdata." VALUES (".$values.")";
			if(!$result = mysql_query($query)) {
				throw new Exception("Can't insert to table: ".mysql_error());
			} else {
				$hasilquery = "Success";
			}
		} catch (Exception $e) {
			$hasilquery = "Error: ". $e->getMessage();
		}
		return $hasilquery;
	}
	
	public function updateDB($tablename,$updatedata,$namakolom,$isikolom) {
		try {
			$wheredb = " WHERE ".$namakolom." = '".$isikolom."'";
			$query = "UPDATE {$tablename} SET {$updatedata}{$wheredb}";
			
			if(!$result = mysql_query($query)) {
				throw new Exception("Can't update to table: ".mysql_error());
			} else {
				$hasilquery = "Success";
			}
		} catch (Exception $e) {
			$hasilquery = "Error: ". $e->getMessage();
		}
		return $hasilquery;
	}
	
	public function deleteDB($namatabel,$namakolom,$isikolom) {
		try {
			$wheredb = " WHERE ".$namakolom." = '".$isikolom."'";
			$query = "DELETE FROM {$namatabel}{$wheredb}";
			
			if(!$result = mysql_query($query)) {
				throw new Exception("Can't delete to table: ".mysql_error());
			} else {
				$hasilquery = "Success";
			}
		} catch (Exception $e) {
			$query = "Error: ". $e->getMessage();
		}
		return $hasilquery;
	}
}
?>
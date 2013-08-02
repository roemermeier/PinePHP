<?php
class database {
    var $showsql;

    function connect() {

        $a = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
		mysql_select_db(DB_NAME);
		
		if (!$a) {
			throw new Exception("Database connection failed.");
		} else {
			return true;
		}
         $this->showsql = false;
    }

	
    function requestvalue($tablename, $identification, $fieldname) {
		$sql = "SELECT $fieldname FROM `$tablename` WHERE $identification LIMIT 1";
		
		$result = $this->query($sql);
		while($row = mysql_fetch_object($result))
		   {
				$anyresults = 1;
				return $row->$fieldname;
		   }
	}
	//Bsp: $db->requestvalue("Users", "username='maxmustermann'", "password");
	
	
	function updatevalue($tablename, $identification, $fieldname, $value) {
		$a = $sql = "UPDATE $tablename SET $fieldname='$value' WHERE $identification LIMIT 1";
		$result = $this->query($sql);

                
                return $a;
	}
	//Bsp: $db->updatevalue("Users", "username='maxmustermann'", "password", "mustermann");
	
	function requestrow($tablename, $identification) {
		$sql = "SELECT column_name, character_maximum_length, is_nullable \n"
						 . "FROM information_schema.COLUMNS WHERE table_name LIKE '$tablename'"
						 . "ORDER BY ordinal_position";
					
		$ergebnis = $this->query($sql);
					
		$abfrage = "SELECT * FROM `$tablename` WHERE $identification LIMIT 1;";
						
		$result = $this->query($abfrage);
		while($row = mysql_fetch_object($result))
		   {
			while($columns = mysql_fetch_object($ergebnis))
			   {
                                    $columnname = $columns->column_name;
                                    $data[$columnname] = $row->$columnname;
			   }
					
				
		   }
		   return $data;
	}
	//Bsp: $user = $db->requestrow("Users", "username='maxmustermann'"); echo $user["password"];
        
        function requestmany($table, $identification = "") {
            
            
                $asql = "SELECT column_name, character_maximum_length, is_nullable \n"
						 . "FROM information_schema.COLUMNS WHERE table_name LIKE '$table'"
						 . "ORDER BY ordinal_position";
					
		$ergebnis = $this->query($asql);
					
		$sql = "SELECT * FROM `$table` ";
                if ($identification != "") {
                    $sql .= "WHERE $identification;";
                }
						
		$result = $this->query($sql);

		return $this->db_result_array($result);
                
                
            
        }
        
        private function db_result_array($result, $key_column = null) { 
            for ($array = array(); $row = mysql_fetch_assoc($result); isset($row[$key_column]) ? $array[$row[$key_column]] = $row : $array[] = $row); 
            return $array; 
        }
        
        function insertrow($table, $fields, $data) {
            $sql = "INSERT INTO `" . $table . "` (";

            foreach ($fields as $fieldname) {
                $sql .= "`" . $fieldname . "`, ";
            }
            $sql = substr($sql, 0, -2); //Deletes last comma

            $sql .= " ) VALUES (";
            foreach ($data as &$dataitem) {
                $sql .= "'" . $dataitem . "',";
            }
            $sql = substr($sql, 0, -1); //Deletes last comma

            $sql .= ")";

            $erg = $this->query($sql);
            return $erg;
        }
        //Bsp: $db->insertrow("log", array("name", "description", "user"), array("anothertestname", "anothertestdesc", "anothertesetuser"));
	
	function insertDataObj($table, $dataobj) {
            $sql = "INSERT INTO `" . $table . "` (";
            
            $sqlfields = "";
            $sqlvalues = "";
            foreach ($dataobj as $fieldname => $value) {
                $sqlfields .= "`" . $fieldname . "`, ";
                $sqlvalues .= "'" . $value . "',";
            }
            
            $sqlfields = substr($sqlfields, 0, -2); //Deletes last comma

            $sql = $sql . $sqlfields;
            $sql .= " ) VALUES (";
            
            $sqlvalues = substr($sqlvalues, 0, -1); //Deletes last comma
            $sqlvalues .= ")";
            
            $sql = $sql . $sqlvalues;

            //echo $sql;
            
            $erg = $this->query($sql);
            return $erg;
        }
        
        function deleterow($tablename, $identification) {
		$sql = "DELETE FROM '$tablename' WHERE $identification ;";
		$this->query($sql);
                
	}
	
	function query($sql) {
		$class_db_query_res = mysql_query($sql);
                
                if ($this->showsql == true) {
                    echo "<br>" . $sql . "<br>";
                }
                if (!$class_db_query_res) {
                    throw new Exception("SQL Error");
                }
                
                return $class_db_query_res;
	}
	
	function disconnect() {
		mysql_close();
	}
}
?>
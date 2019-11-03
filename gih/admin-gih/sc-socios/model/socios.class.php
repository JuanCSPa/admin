<?php
	/**
	*
	*/
	class socios
	{

		var $con;

		function socios(){
			$this->con = new DBManager;
		}

	function sql($query){
		if($this->con->conectar() == true){
			$sql = $query;
			$data = $this->Execute(mysql_query($sql));
			return $data;
		}
	}


	function insert($array){
		if($this->con->conectar()==true){
			foreach ($array as $nombre => $valor){
				$campos .= $nombre . ",";
				$datos  .= "'".$valor . "',";
			}
			$campos .= '['; $campos = str_replace(',[','',$campos);
			$datos .= '['; $datos = str_replace(',[','',$datos);
			$sql = "INSERT INTO tbl_socios(".$campos.") VALUES (".$datos.")";
			$bool = mysql_query($sql);
			return $bool;
		}
	}

	function get(){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_socios";
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getById($id){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_socios WHERE soc_id = %d;";
			$sql = sprintf($sql, $id);
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getByName($id){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_socios WHERE soc_nombre = '%s';";
			$sql = sprintf($sql, $id);
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}


	function getRandom(){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_socios ORDER BY RAND() LIMIT 3";

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}

	function update($array,$condicion){
		if($this->con->conectar()==true){
			foreach ($array as $nombre => $valor){
				$valores .= $nombre . "='" . $valor . "',";
			}
			$valores .= '['; $valores = str_replace(',[','',$valores);
			$sql = "UPDATE tbl_socios SET ".$valores ." WHERE ".$condicion;
			$bool = mysql_query($sql);
			return $bool;
		}
	}

	function delete($id){
		if($this->con->conectar()==true){
			$sql = "DELETE FROM tbl_socios WHERE soc_id = %d;";
			$sql = sprintf($sql, $id);
			$bool	= mysql_query($sql);
			return $bool;
		}
	}

	function Execute($data){
		while($reg = mysql_fetch_assoc($data)){
			$registros[] = $reg;
		}

		if(empty($registros)){
			$registros = array();
		}
		return $registros;
	}
	}
?>

<?php
	/**
	* 
	*/
	class marca
	{
		
		var $con;

		function marca(){
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
			$sql = "INSERT INTO tbl_marcas(".$campos.") VALUES (".$datos.")";

			$bool = mysql_query($sql);
			return $bool;
		}
	}

	function get(){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_marcas";
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getById($id){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_marcas WHERE marca_id = %d;";
			$sql = sprintf($sql, $id);
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getByName($id){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_marcas WHERE marca_nombre = '%s';";
			$sql = sprintf($sql, $id);
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getByUrl($url){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_marcas WHERE marca_url = '%s';";
			$sql = sprintf($sql, $url);
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getRandom(){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_marcas ORDER BY RAND() LIMIT 3";

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
			$sql = "UPDATE tbl_marcas SET ".$valores ." WHERE ".$condicion;
			$bool = mysql_query($sql);
			return $bool;
		}
	}

	function delete($id){
		if($this->con->conectar()==true){
			$sql = "DELETE FROM tbl_marcas WHERE marca_id = %d;";
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
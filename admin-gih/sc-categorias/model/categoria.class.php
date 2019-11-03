<?php
	/**
	* 
	*/
	class categoria
	{
		
		var $con;

		function categoria(){
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
			$sql = "INSERT INTO tbl_categoria(".$campos.") VALUES (".$datos.")";

			$bool = mysql_query($sql);
			return $bool;
		}
	}

	function get(){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_categoria";
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getById($id){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_categoria WHERE cat_id = %d;";
			$sql = sprintf($sql, $id);
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
			$sql = "UPDATE tbl_categoria SET ".$valores ." WHERE ".$condicion;
			$bool = mysql_query($sql);
			return $bool;
		}
	}

	function delete($id){
		if($this->con->conectar()==true){
			$sql = "DELETE FROM tbl_categoria WHERE cat_id = %d;";
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
<?php

class categoria{
	var $con;
	function categoria(){
		$this->con = new DBManager;		
	}
	
	function getAll(){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_categoria";
			$sql = sprintf($sql);
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function get( $cat_id ){
		//echo 'hola mundo';
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_categoria WHERE cat_id = %d;"; //modifico cat_id => cat_type
			$sql = sprintf($sql, $cat_id);
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getNameCat(){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_categoria;";
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getMenuPadre(){
		if($this->con->conectar()==true){
			$sql="SELECT cat_id, cat_nombre, cat_url_amigable FROM tbl_categoria WHERE id_depende='0'";
			$data = $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getById( $cat_id ){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_categoria WHERE id_depende = %d ORDER BY cat_id ASC;";  //modifico id_depende => cat_type
			$sql = sprintf($sql ,$cat_id );
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}


	function getByIdAd( $cat_id ){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_categoria WHERE cat_id = %d ORDER BY cat_id ASC;";
			$sql = sprintf($sql ,$cat_id );
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getCountProByIdCat( $cat_id ){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_productos WHERE pro_cat_id = %d;";
			$sql = sprintf($sql ,$cat_id );
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getID($friendly){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_categoria WHERE cat_url_amigable= '%s';";
			$sql = sprintf($sql, $friendly);
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getIDS($friendly,$clas){
		if($this->con->conectar()==true){
			$sql = "SELECT c.cat_id  FROM tbl_categoria c INNER JOIN tbl_producto p ON c.cat_id = p.cat_id WHERE  c.cat_descripcion = '%s' and p.sub_id='%s';";
			$sql = sprintf($sql, $friendly,$clas);
			$data	= $this->Execute(mysql_query($sql));

			return $data;
		}
	}



	function idsById( $cat_id ){
		if($this->con->conectar()==true){
			$sql = "SELECT cat_id FROM tbl_categoria WHERE id_depende = %d ORDER BY cat_id ASC;";
			$sql = sprintf($sql ,$cat_id );
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function delete( $cat_id ){
		if($this->con->conectar()==true){
			$sql = "DELETE FROM tbl_categoria WHERE cat_id = %d;";
			$sql = sprintf($sql, $cat_id);
			$bool	= mysql_query($sql);
			return $bool;
		}
	}
	
	function insert($array){
		$datos = '';
		$campos = '';
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

	function update($array,$condicion){
		$valores = '';
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
	
	function print_a($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
	
	function Execute($data){
		while($reg = mysql_fetch_assoc($data)){
			$registros[] = $reg;
		}
		
		if (empty($registros)){
			$registros = array();
		}
		
		return $registros;
	}
}
?>
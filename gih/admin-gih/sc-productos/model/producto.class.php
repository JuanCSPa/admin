<?php

	/**

	*

	*/

	class producto

	{



		var $con;



		function producto(){

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
			$campos = '';
			$datos = '';

			foreach ($array as $nombre => $valor){

				$campos .= $nombre . ",";

				$datos  .= "'".$valor . "',";

			}

			$campos .= '['; $campos = str_replace(',[','',$campos);

			$datos .= '['; $datos = str_replace(',[','',$datos);

			$sql = "INSERT INTO tbl_productos(".$campos.") VALUES (".$datos.")";



			$bool = mysql_query($sql);

			return $bool;

		}

	}



	function get(){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_productos";

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}

	function getWhere( $where ){
		if($this->con->conectar()==true){
			$_where = (empty($where)) ? '' : ' WHERE ' . $where;
			$sql = "SELECT * FROM tbl_productos " . $_where . " ORDER BY pro_id DESC;";
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getList( $cat_id = 0 ){
		if($this->con->conectar()==true){
			if( sprintf( '%d',$cat_id ) == 0 ){
				$sql = "SELECT * FROM tbl_productos ORDER BY pro_id DESC;";
			}
			else{
				$sql = "SELECT * FROM tbl_productos WHERE pro_cat_id = %d ORDER BY pro_id DESC;";
				$sql = sprintf($sql, $cat_id);
			}

			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function getRandom($id){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_productos WHERE pro_id_marca = ".$id." ORDER BY RAND() LIMIT 4";

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}

	function getRandom2(){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_productos ORDER BY RAND() LIMIT 5";

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}

	function getDestacados(){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_productos WHERE pro_destacado = 1 ORDER BY pro_id";

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}

	function cantidad(){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_productos";

			$data	= mysql_query($sql);
			$data1 = mysql_num_rows($data);
			return $data1;

		}

	}

	function getById($id){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_productos WHERE pro_id = %d;";

			$sql = sprintf($sql, $id);

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}


	function getByName($name){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_productos WHERE pro_url_amigable = '%s';";

			$sql = sprintf($sql, $name);

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}

	function getByIdCat($id){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_productos WHERE pro_cat_id = %d;";

			$sql = sprintf($sql, $id);

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}

	function getByIdMarca($id){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_productos WHERE pro_id_marca = %d;";

			$sql = sprintf($sql, $id);

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}

	function detalleProducto($id){

		if($this->con->conectar()==true){

			$sql = "SELECT tbl_productos.*, tbl_categoria.* FROM tbl_productos LEFT JOIN tbl_categoria ON pro_cat_id = cat_id WHERE pro_id = %d;";

			$sql = sprintf($sql, $id);

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}


	function update($array,$condicion){
		$valores = '';

		if($this->con->conectar()==true){

			foreach ($array as $nombre => $valor){

				$valores .= $nombre . "='" . $valor . "',";

			}

			$valores .= '['; $valores = str_replace(',[','',$valores);

			$sql = "UPDATE tbl_productos SET ".$valores ." WHERE ".$condicion;

			$bool = mysql_query($sql);

			return $bool;

		}

	}



	function delete($id){

		if($this->con->conectar()==true){

			$sql = "DELETE FROM tbl_productos WHERE pro_id = %d;";

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

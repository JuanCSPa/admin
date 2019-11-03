<?php

	/**

	* 

	*/

	class imagen

	{

		

		var $con;



		function imagen(){

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

			$sql = "INSERT INTO tbl_image_productos(".$campos.") VALUES (".$datos.")";



			$bool = mysql_query($sql);

			return $bool;

		}

	}



	function get(){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_image_productos";

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}


	function cantidad(){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_image_productos";

			$data	= mysql_query($sql);
			$data1 = mysql_num_rows($data);
			return $data1;

		}

	}

	function getById($id){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_image_productos WHERE img_id = %d;";

			$sql = sprintf($sql, $id);

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}

	function getByIdPro($id){

		if($this->con->conectar()==true){

			$sql = "SELECT * FROM tbl_image_productos WHERE img_pro_id = %d;";

			$sql = sprintf($sql, $id);

			$data	= $this->Execute(mysql_query($sql));

			return $data;

		}

	}


	function update($array,$condicion){

		if($this->con->conectar()==true){
			$valores  ='';

			foreach ($array as $nombre => $valor){

				$valores .= $nombre . "='" . $valor . "',";

			}

			$valores .= '['; $valores = str_replace(',[','',$valores);

			$sql = "UPDATE tbl_image_productos SET ".$valores ." WHERE ".$condicion;

			$bool = mysql_query($sql);

			return $bool;

		}

	}



	function deleteByProdId($id){

		if($this->con->conectar()==true){

			$sql = "DELETE FROM tbl_image_productos WHERE img_pro_id = %d;";

			$sql = sprintf($sql, $id);

			$bool	= mysql_query($sql);

			return $bool;

		}

	}


	function delete($id){

		if($this->con->conectar()==true){

			$sql = "DELETE FROM tbl_image_productos WHERE img_id = %d;";

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
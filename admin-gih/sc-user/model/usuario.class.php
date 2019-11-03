<?php

class usuario{
	var $con;
	function usuario(){
		$this->con = new DBManager;		
	}		
	
	function login($user, $password){
		if($this->con->conectar()==true){
			$sql = 'SELECT * FROM tbl_user WHERE user_email = "'.$user.'" AND user_password = "'.$password.'"';
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function verifica( $mail ){
		if($this->con->conectar()==true){
			$sql = "SELECT * FROM tbl_user WHERE user_email = '". $mail ."';";
			$data	= $this->Execute(mysql_query($sql));
			return $data;
		}
	}

	function update($array,$condicion){
		$valores = "";

		if($this->con->conectar()==true){

			foreach ($array as $nombre => $valor){

				$valores .= $nombre . "='" . $valor . "',";

			}

			$valores .= '['; $valores = str_replace(',[','',$valores);

			$sql = "UPDATE tbl_user SET ".$valores ." WHERE ".$condicion;

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
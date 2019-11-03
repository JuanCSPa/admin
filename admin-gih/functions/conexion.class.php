<?php 	

	class DBManager{

		var $conect;

		var $BaseDatos;

		var $Servidor;

		var $Usuario;

		var $Clave;

		var $conf;

		

		function DBManager(){

			$this->BaseDatos = "571175_gihnet";

			$this->Servidor  = "http:127.0.0.1/respaldos/admin-gih/";

			$this->Usuario 	 = "root";

			$this->Clave	 = "";

		}

		 function conectar() {

			if(!($con=@mysql_connect($this->Servidor,$this->Usuario,$this->Clave))){

				exit();

			}

			if (!@mysql_select_db($this->BaseDatos,$con)){

				exit();

			}

			$this->conect=$con;

			return true;	

		}

	}

?>

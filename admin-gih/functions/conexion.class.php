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

			$this->Servidor  = "mariadb-164.wc2.phx1.stabletransit.com";

			$this->Usuario 	 = "571175_gihnet";

			$this->Clave	 = "G1h89\$net2018";

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
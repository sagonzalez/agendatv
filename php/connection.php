<?php
	//localhost
	define("HOST","localhost");
	define("DB_NAME","agendatv");
	define("USER","root");
	define("PASSWORD","");

	//hostinger
	// define("HOST","mysql.hostinger.mx");
	// define("DB_NAME","u336628151_agend");
	// define("USER","u336628151_admin");
	// define("PASSWORD","Medrano7502");
	
	function getConnection(){
		$mysql = new mysqli(HOST,USER,PASSWORD,DB_NAME); 
		//check for error
		if($mysql->connect_error){
			echo "Fallo la conexion: "+$mysql->connect_error;
			exit();
		}
		return $mysql;
	}

?>
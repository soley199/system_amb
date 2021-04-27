<?php 

	class Conexion
	{
		// ESTA FUNCION CONECTAR PARA MYSQL AL LOGEAR SE DEBE CAMBIAR AL GETDATE() es el metodo de recueprr la hora y fecha del servidor 
		// static public function conectar()
		// {
		// 	$link = new PDO("sqlsrv:Server=192.168.1.90;Database=System_AMB", "ENRUIQUE", "12345678");
		// 	//$link->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_SYSTEM);
		// 	//array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\'')
		// 			return $link;
		
		// }

		// ESTA FUNCION CONECTAR PARA MYSQL AL LOGEAR SE DEBE CAMBIAR AL NOW() es el metodo de recueprr la hora y fecha del servidor 
		

		static public function conectar()
		{
			$link = new PDO("mysql:host=127.0.0.1;dbname=system_amb",
			            "root",
			            "");
			$link->exec("set names utf8");

			return $link;
		
		}
	}
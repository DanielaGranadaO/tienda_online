<?php

function connection()
{
	$connection= new MySQLi("localhost","root","","TiendaOnline");
	
	if ($connection->connect_errno)
		echo "problemas en la conexion". $connection->connect_error;
	
	else
		return $connection;
}
?>
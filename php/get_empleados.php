<?php
require_once 'cors.php';     // Esto da los permisos al navegador
require_once 'Database.php'; // Esto prepara la conexión a la DB

try{
	// Obtener la conexión centralizada
	$db=Database::obtenerInstancia()->getConexion();
	$stmt= $db->query("SELECT id,nombre,apellido,fecha_contrato,puesto from empleados");
	$empleados=$stmt->fetchAll();
	echo json_encode($empleados);
}catch (Exception $e){
	echo json_encode(["error"=>$e->getMessage()]);
	
}





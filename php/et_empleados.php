<?php
require_once 'cors.php';     // Esto da los permisos al navegador
require_once 'Database.php'; // Esto prepara la conexión a la DB

// Obtener la conexión centralizada
$db=Database::obtenerInstancia()->getConexion();

$sql="SELECT id,nombre,apellido,fecha_contrato,puesto from empreados";
$resultado=mysqli_query($db,$sql);

$empleados=mysqli_fetch_all($resultado,MYSQLI_ASSOC);
echo json_encode($empleados);
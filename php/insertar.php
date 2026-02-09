<?php
require_once 'cors.php';     // Esto da los permisos al navegador
require_once 'Database.php'; // Esto prepara la conexión a la DB

$json = file_get_contents('php://input');
$data = json_decode($json);

if ($data && !empty($data->nombre)) {
    try {
        $db = Database::obtenerInstancia()->getConexion();
        $sql = "INSERT INTO empleados (nombre, apellido, fecha_contrato, puesto) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $data->nombre, 
            $data->apellido, 
            $data->fecha_contrato, 
            $data->puesto
        ]);
        echo json_encode(["mensaje" => "Empleado insertado con éxito"]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Datos incompletos"]);
}
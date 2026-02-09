<?php
require_once 'cors.php';     // Esto da los permisos al navegador
require_once 'Database.php'; // Esto prepara la conexión a la DB

$json = file_get_contents('php://input');
$data = json_decode($json);

// Validamos que tengamos el ID y al menos el nombre
if ($data && !empty($data->id) && !empty($data->nombre)) {
    try {
        $db = Database::obtenerInstancia()->getConexion();
        
        $sql = "UPDATE empleados SET 
                nombre = ?, 
                apellido = ?, 
                fecha_contrato = ?, 
                puesto = ? 
                WHERE id = ?";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([
            $data->nombre, 
            $data->apellido, 
            $data->fecha_contrato, 
            $data->puesto, 
            $data->id
        ]);

        echo json_encode(["mensaje" => "Empleado actualizado con éxito"]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Datos insuficientes para actualizar"]);
}
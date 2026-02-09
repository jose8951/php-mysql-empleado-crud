<?php
require_once 'cors.php';     // Esto da los permisos al navegador
require_once 'Database.php'; // Esto prepara la conexión a la DB

// Verificamos si recibimos el ID por la URL (?id=...)
if (isset($_GET['id'])) {
    try {
        $db = Database::obtenerInstancia()->getConexion();
        $sql = "DELETE FROM empleados WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_GET['id']]);

        echo json_encode(["mensaje" => "Empleado eliminado con éxito"]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "ID no proporcionado"]);
}
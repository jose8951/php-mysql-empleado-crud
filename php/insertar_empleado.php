<?php
require_once 'cors.php';     // Esto da los permisos al navegador
require_once 'Database.php'; // Esto prepara la conexión a la DB

$db = Database::obtenerInstancia()->getConexion();

// Leer el JSON enviado desde Angular
$json = file_get_contents('php://input');
$data = json_decode($json);

if ($data) {
    // Escapamos los datos para evitar errores con caracteres especiales
    $nombre         = mysqli_real_escape_string($db, $data->nombre);
    $apellido       = mysqli_real_escape_string($db, $data->apellido);
    $fecha_contrato = mysqli_real_escape_string($db, $data->fecha_contrato);
    $puesto         = mysqli_real_escape_string($db, $data->puesto);

    // La consulta SQL con todos los campos requeridos
    $sql = "INSERT INTO empleados (nombre, apellido, fecha_contrato, puesto) 
            VALUES ('$nombre', '$apellido', '$fecha_contrato', '$puesto')";
    
    if (mysqli_query($db, $sql)) {
        echo json_encode([
            "res" => "ok", 
            "msg" => "Empleado registrado correctamente",
            "id_generado" => mysqli_insert_id($db)
        ]);
    } else {
        echo json_encode(["res" => "error", "msg" => mysqli_error($db)]);
    }
} else {
    echo json_encode(["res" => "error", "msg" => "No se recibieron datos"]);
}

mysqli_close($db);
?>
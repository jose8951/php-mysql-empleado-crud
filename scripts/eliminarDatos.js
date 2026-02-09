const URL_ELIMINAR = "https://ve.formacionprofesionalempleo.net/proyecto_php_empleado/eliminar.php";

async function confirmarEliminar(id) {
    // 1. Pedir confirmación al usuario
    const confirmar = confirm(`¿Estás seguro de que deseas eliminar al empleado con ID: ${id}?`);
    
    if (!confirmar) return; // Salir si el usuario cancela

    try {
        const respuesta = await fetch(URL_ELIMINAR, {
            method: 'POST',
            // Importante: El PHP espera JSON, por lo que el header es obligatorio
            headers: { 
                'Content-Type': 'application/json' 
            },
            body: JSON.stringify({ id: id })
        });

        // Verificamos si la respuesta del servidor es válida antes de parsear
        if (!respuesta.ok) {
            throw new Error(`Error en el servidor: ${respuesta.status}`);
        }

        const resultado = await respuesta.json();

        if (resultado.mensaje) {
            alert("🗑️ " + resultado.mensaje);
            
            // 2. Refrescar la tabla automáticamente
            // Verificamos que obtenerEmpleados exista en mostrarDatos.js
            if (typeof obtenerEmpleados === 'function') {
                obtenerEmpleados();
            } else {
                console.warn("La función obtenerEmpleados() no se encontró. Recarga la página manualmente.");
            }
        } else {
            alert("❌ Error: " + (resultado.error || "El servidor no devolvió un mensaje de éxito."));
        }

    } catch (error) {
        console.error("Error al eliminar:", error);
        alert("Fallo de conexión: No se pudo eliminar el registro. Revisa la consola.");
    }
}
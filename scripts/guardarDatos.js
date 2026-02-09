const URL_INSERTAR = "https://ve.formacionprofesionalempleo.net/proyecto_php_empleado/insertar.php";

document.getElementById('form-empleado').addEventListener('submit', async (e) => {
    // Si el ID de edición tiene valor, detenemos este script para que no duplique la acción
    const idEdicion = document.getElementById('id_empleado_edicion').value;
    if (idEdicion !== "") return; 

    e.preventDefault();

    // Recolectamos los datos del formulario
    const datos = {
        nombre: document.getElementById('nombre').value,
        apellido: document.getElementById('apellido').value,
        puesto: document.getElementById('puesto').value,
        fecha_contrato: document.getElementById('fecha_contrato').value
    };

    try {
        const respuesta = await fetch(URL_INSERTAR, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(datos)
        });

        const resultado = await respuesta.json();

        if (resultado.mensaje) {
            alert("✅ " + resultado.mensaje);
            // Si tienes una función para limpiar el formulario y refrescar la tabla, llámalas aquí
            if (typeof resetearFormulario === 'function') resetearFormulario();
            if (typeof obtenerEmpleados === 'function') obtenerEmpleados();
        } else {
            alert("❌ Error: " + (resultado.error || "No se pudo guardar"));
        }

    } catch (error) {
        console.error("Error al guardar:", error);
        alert("Hubo un fallo en la conexión al intentar guardar.");
    }
});
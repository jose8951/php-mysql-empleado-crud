const URL_ACTUALIZAR = "https://ve.formacionprofesionalempleo.net/proyecto_php_empleado/actualizar.php";

// 1. Cargar los datos de la fila al formulario
function prepararEdicion(empleado) {
    document.getElementById('id_empleado_edicion').value = empleado.id;
    document.getElementById('nombre').value = empleado.nombre;
    document.getElementById('apellido').value = empleado.apellido;
    document.getElementById('puesto').value = empleado.puesto;
    document.getElementById('fecha_contrato').value = empleado.fecha_contrato;

    // Cambiar aspecto visual del formulario
    document.getElementById('titulo-formulario').innerText = "📝 Editando ID: " + empleado.id;
    document.getElementById('btn-guardar').innerText = "Actualizar Cambios";
    document.getElementById('btn-guardar').className = "btn btn-warning px-4";
    document.getElementById('btn-cancelar').classList.remove('d-none');
    
    // Subir suavemente al formulario
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// 2. Procesar la actualización al enviar el formulario
document.getElementById('form-empleado').addEventListener('submit', async (e) => {
    const id = document.getElementById('id_empleado_edicion').value;
    
    // Si NO hay ID, este script no hace nada (lo procesará guardarDatos.js)
    if (id === "") return;

    e.preventDefault();

    const datosModificados = {
        id: id,
        nombre: document.getElementById('nombre').value,
        apellido: document.getElementById('apellido').value,
        puesto: document.getElementById('puesto').value,
        fecha_contrato: document.getElementById('fecha_contrato').value
    };

    try {
        const respuesta = await fetch(URL_ACTUALIZAR, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(datosModificados)
        });

        const resultado = await respuesta.json();

        if (resultado.mensaje) {
            alert("✅ " + resultado.mensaje);
            resetearFormulario(); // Función en mostrarDatos.js
            obtenerEmpleados();   // Función en mostrarDatos.js
        } else {
            alert("❌ Error: " + (resultado.error || "No se pudo actualizar"));
        }

    } catch (error) {
        console.error("Error al actualizar:", error);
        alert("Fallo de conexión al actualizar el registro.");
    }
});
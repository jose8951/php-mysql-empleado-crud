// URL corregida según tu Administrador de Archivos de Hostinger
const URL_LISTAR = "https://ve.formacionprofesionalempleo.net/proyecto_php_empleado/get_empleados.php";

document.addEventListener('DOMContentLoaded', obtenerEmpleados);

async function obtenerEmpleados() {
    const tabla = document.getElementById('tabla-empleados');
    tabla.innerHTML = `<tr><td colspan="5" class="text-center">⌛ Cargando empleados...</td></tr>`;

    try {
        const respuesta = await fetch(URL_LISTAR);
        
        if (!respuesta.ok) {
            throw new Error(`Error ${respuesta.status}: No se pudo conectar con el servidor.`);
        }

        const datos = await respuesta.json();
        tabla.innerHTML = ""; // Limpiar tabla

        if (datos.error) {
            throw new Error(datos.error);
        }

        datos.forEach(emp => {
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${emp.id}</td>
                <td><strong>${emp.nombre} ${emp.apellido}</strong></td>
                <td>${emp.puesto}</td>
                <td>${emp.fecha_contrato}</td>
                <td class="text-center">
                    <button class="btn btn-warning btn-sm" onclick='prepararEdicion(${JSON.stringify(emp)})'>
                        ✏️ Editar
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="confirmarEliminar(${emp.id})">🗑️</button>
                </td>
            `;
            tabla.appendChild(fila);
        });

    } catch (error) {
        console.error("Error:", error);
        tabla.innerHTML = `<tr><td colspan="5" class="text-center text-danger">Fallo al cargar: ${error.message}</td></tr>`;
    }
}

// Función global para resetear el formulario (usada por otros scripts)
function resetearFormulario() {
    document.getElementById('form-empleado').reset();
    document.getElementById('id_empleado_edicion').value = "";
    document.getElementById('titulo-formulario').innerText = "➕ Registrar Nuevo Empleado";
    document.getElementById('btn-guardar').innerText = "Guardar Registro";
    document.getElementById('btn-guardar').className = "btn btn-success px-4";
    document.getElementById('btn-cancelar').classList.add('d-none');
}
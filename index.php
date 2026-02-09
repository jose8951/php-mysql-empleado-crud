<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Empleados - Hostinger</title>

    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" as="style">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <style>
        /* Bloqueo visual por CSS puro (más rápido que JS) */
        body {
            display: block !important;

        }
    </style>
</head>

<body class="bg-light">

    <?php include 'paginas/navbar.html'; ?>

    <div class="container pb-5">
        <div class="card shadow-sm mb-4 border-success">
            <div class="card-header bg-success text-white">
                <h5 id="titulo-formulario" class="mb-0">➕ Registrar Nuevo Empleado</h5>
            </div>
            <div class="card-body">
                <form id="form-empleado" class="row g-3">
                    <input type="hidden" id="id_empleado_edicion" value="">

                    <div class="col-md-3">
                        <label class="form-label fw-bold">Nombre</label>
                        <input type="text" id="nombre" class="form-control" placeholder="Ej. Juan" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Apellido</label>
                        <input type="text" id="apellido" class="form-control" placeholder="Ej. Pérez" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Puesto</label>
                        <select id="puesto" class="form-select" required>
                            <option value="" selected disabled>Selecciona un puesto...</option>
                            <option value="Frontend Developer">Frontend Developer</option>
                            <option value="Backend Developer">Backend Developer</option>
                            <option value="Fullstack Developer">Fullstack Developer</option>
                            <option value="Mobile App Developer">Mobile App Developer</option>
                            <option value="Data Scientist">Data Scientist</option>
                            <option value="DevOps Engineer">DevOps Engineer</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Fecha Contrato</label>
                        <input type="date" id="fecha_contrato" class="form-control" required>
                    </div>

                    <div class="col-12 text-end mt-4">
                        <button type="button" id="btn-cancelar" class="btn btn-secondary d-none me-2" onclick="resetearFormulario()">
                            Cancelar Edición
                        </button>
                        <button type="submit" id="btn-guardar" class="btn btn-success px-5 shadow-sm">
                            Guardar Registro
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm border-primary">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">📋 Lista de Empleados</h5>
                <button class="btn btn-light btn-sm fw-bold" onclick="obtenerEmpleados()">
                    🔄 Actualizar Tabla
                </button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">ID</th>
                                <th>Nombre Completo</th>
                                <th>Puesto</th>
                                <th>Fecha de Ingreso</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-empleados">
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <div class="spinner-border spinner-border-sm me-2" role="status"></div>
                                    Cargando datos del servidor...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        window.onload = function() {
            document.documentElement.style.visibility = 'visible';
        };
    </script>

    <script src="scripts/mostrarDatos.js"></script>
    <script src="scripts/guardarDatos.js"></script>
    <script src="scripts/operaciones.js"></script>
    <script src="scripts/eliminarDatos.js"></script>

</body>

</html>
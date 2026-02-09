<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Empleados - ERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">

    <?php include 'navbar.html'; ?>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-secondary">Listado de Empleados Datos fijos</h2>
            <button class="btn btn-success shadow-sm">+ Nuevo Empleado</button>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Nombre Completo</th>
                                <th>Departamento</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <tr>
                                <td class="ps-4">001</td>
                                <td><strong>Ana Martínez</strong></td>
                                <td>Recursos Humanos</td>
                                <td><span class="badge rounded-pill bg-success">Activo</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1">Editar</button>
                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">002</td>
                                <td><strong>Carlos Ruiz</strong></td>
                                <td>Tecnología</td>
                                <td><span class="badge rounded-pill bg-success">Activo</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1">Editar</button>
                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">003</td>
                                <td><strong>Laura Gómez</strong></td>
                                <td>Marketing</td>
                                <td><span class="badge rounded-pill bg-warning text-dark">Pendiente</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1">Editar</button>
                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">004</td>
                                <td><strong>Roberto Valdez</strong></td>
                                <td>Contabilidad</td>
                                <td><span class="badge rounded-pill bg-success">Activo</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1">Editar</button>
                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">005</td>
                                <td><strong>Sofía Herrera</strong></td>
                                <td>Ventas</td>
                                <td><span class="badge rounded-pill bg-danger">Inactivo</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1">Editar</button>
                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">006</td>
                                <td><strong>Miguel Ángel Toro</strong></td>
                                <td>Logística</td>
                                <td><span class="badge rounded-pill bg-success">Activo</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1">Editar</button>
                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">007</td>
                                <td><strong>Elena Benítez</strong></td>
                                <td>Atención al Cliente</td>
                                <td><span class="badge rounded-pill bg-success">Activo</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1">Editar</button>
                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4">008</td>
                                <td><strong>Javier Soria</strong></td>
                                <td>Sistemas</td>
                                <td><span class="badge rounded-pill bg-danger">Inactivo</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1">Editar</button>
                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
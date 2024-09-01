<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios Activos | ANDES S.A.M</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Usuarios Activos</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active">Usuarios Activos</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Lista de Usuarios Activos</h3>
                                </div>
                                <div class="card-body">
                                    <div id="content" class="">
                                        <?php echo date('Y/m/d H:i:s'); ?>
                                        <br><br>
                                        <button type="button" class="btn btn-primary mb-2" id="openModalButton">
                                            Agregar Usuario
                                        </button>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nombre de Usuario</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Email</th>
                                                    <th>Rol</th>
                                                    <th>Dirección</th>
                                                    <th>Fecha de Registro</th>
                                                    <th>Modificar</th>
                                                    <th>Eliminar</th>
                                                    <!-- <th>Deshabilitar</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $contador = 1;
                                                foreach ($usuario as $row) {
                                                ?>
                                                    <tr>
                                                        <td><?= $contador; ?></td>
                                                        <td><?= $row['nombreUsuario']; ?></td>
                                                        <td><?= $row['nombre']; ?></td>
                                                        <td><?= $row['apellido']; ?></td>
                                                        <td><?= $row['email']; ?></td>
                                                        <td><?= $row['rol']; ?></td>
                                                        <td><?= $row['direccion']; ?></td>
                                                        <td><?= $row['fechaRegistro']; ?></td>
                                                        <td>
                                                            <?= form_open('Login/actualizar', ['class' => 'd-inline']) ?>
                                                            <input type="hidden" name="idusuario" value="<?= $row['idusuario'] ?>">
                                                            <button type="submit" class="btn btn-success">Modificar</button>
                                                            <?= form_close() ?>
                                                        </td>
														<td>
                <?= form_open('Login/eliminarbd', ['class' => 'd-inline', 'onsubmit' => 'confirmarEliminacion(event)']) ?>
                <input type="hidden" name="idusuario" value="<?= $row['idusuario'] ?>">
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <?= form_close() ?>
            </td>
                                                        <!-- <td>
                                                            <?= form_open('Login/deshabilitarbd', ['class' => 'd-inline']) ?>
                                                            <input type="hidden" name="idusuario" value="<?= $row['idusuario'] ?>">
                                                            <button type="submit" class="btn btn-warning">Deshabilitar</button>
                                                            <?= form_close() ?>
                                                        </td> -->
                                                    </tr>
                                                <?php
                                                    $contador++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal de Registro -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Registro de Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalContent">
                        <!-- El contenido del formulario se cargará aquí mediante AJAX -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- DataTables  & Plugins -->

    <script>
        $(document).ready(function () {
            // Evento click para abrir el modal
            $('#openModalButton').on('click', function () {
                $.ajax({
                    url: '<?= site_url('Login/registrarUsuario') ?>',
                    type: 'GET',
                    success: function (response) {
                        $('#modalContent').html(response);
                        $('#registerModal').modal('show');
                    },
                    error: function () {
                        $('#modalContent').html('<p>Hubo un error al cargar el formulario. Por favor, inténtelo de nuevo.</p>');
                        $('#registerModal').modal('show');
                    }
                });
            });
        });
    </script>
	    <script>
        function confirmarEliminacion(event) {
            if (!confirm('¿Está seguro de que quiere eliminar este registro?')) {
                event.preventDefault(); // Detener el envío del formulario si el usuario cancela
            } else {
                alert('Simulación: El registro con ID ' + event.target.querySelector('input[name="idusuario"]').value + ' ha sido eliminado.');
                event.preventDefault(); // Evita el envío real para la simulación
            }
        }
    </script>
</body>

</html>

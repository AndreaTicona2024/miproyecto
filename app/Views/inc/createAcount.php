<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Ventas - Registro de Cliente</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminlte/dist/css/adminlte.min.css') ?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">

    <!-- Custom CSS -->
    <style>
        /* Estilos adicionales personalizados */
        .form-label {
            font-size: 0.875rem; /* Tamaño de fuente más pequeño */
        }

        .form-control {
            font-size: 0.875rem; /* Tamaño de fuente más pequeño */
            padding: 0.75rem; /* Padding más compacto */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 40px; height: 40px;">
            Andes S.A.M
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('inicio') ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('nosotros') ?>">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('contacto') ?>">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('login/index') ?>">Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="vh-100 gradient-custom">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 class="card-title text-center mb-4">Registro de Cliente</h2>

                            <!-- Mensajes de éxito o error -->
                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->getFlashdata('success') ?>
                                </div>
                            <?php endif; ?>

                            <!-- Formulario de Registro -->
                            <form id="registerForm" action="<?= site_url('login/registrarUsuario') ?>" method="post">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
                                </div>
                                <div class="mb-3">
                                    <label for="contrasenia" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="contrasenia" name="contrasenia" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" value="+591" required>
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <textarea class="form-control" id="direccion" name="direccion" rows="3"></textarea>
                                </div>
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-primary">Registrarte</button>
                                </div>
                            </form>

                            <div class="mt-3 text-center">
                                <small><a href="<?= site_url('login/index') ?>">Iniciar sesión</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal de Verificación de Código -->
    <div id="verificationModal" class="modal fade" tabindex="-1" aria-labelledby="verificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verificationModalLabel">Verificación de Código</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="verificationForm" action="<?= site_url('login/verificarCorreo') ?>" method="post">
                        <div class="mb-3">
                            <label for="verificationCode" class="form-label">Código de Verificación</label>
                            <input type="text" class="form-control" id="verificationCode" name="verificationCode" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Verificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Pe4x8U2Dw2qcqz8XC2JirJmvBqEe4KRm/aIb+D/URGFCqjJkSwDQROa7E2vfxF2z" crossorigin="anonymous"></script>

    <!-- intl-tel-input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <!-- Initialization Script -->
    <script>
        // Inicialización de intlTelInput en el campo de teléfono
        var input = document.querySelector("#telefono");
        window.intlTelInput(input, {
            initialCountry: "auto",
            separateDialCode: true,
            preferredCountries: ["us", "mx", "es"]
        });

        // Mostrar el modal de verificación al enviar el formulario de registro
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Enviar formulario para registrar usuario
            this.submit();

            // Mostrar el modal de verificación
            var verificationModal = new bootstrap.Modal(document.getElementById('verificationModal'));
            verificationModal.show();
        });
        
    </script>
</body>

</html>

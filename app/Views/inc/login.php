<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISTEMA DE VENTAS | ANDES S.A.M</title>
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>" type="image/x-icon">
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
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="gradient-custom">

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">ANDES S.A.M</h2>
              <h3 class="fw-bold mb-2 ">BIENVENIDO</h3>
              <p class="text-white-50 mb-5">Por favor ingrese usuario y contraseña!</p>

              <!-- Mostrar mensaje de éxito si existe -->
              <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->getFlashdata('success') ?>
                </div>
              <?php endif; ?>

              <!-- Mostrar mensaje de error si existe -->
              <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                  <?= session()->getFlashdata('error') ?>
                </div>
              <?php endif; ?>

              <form action="<?= site_url('Login/validarUsuario') ?>" method="post">
                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="text" id="typeEmailX" name="nombreUsuario" class="form-control form-control-lg" required />
                  <label class="form-label" for="typeEmailX">Usuario</label>
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="password" id="typePasswordX" name="contrasenia" class="form-control form-control-lg" required />
                  <label class="form-label" for="typePasswordX">Contraseña</label>
                </div>

                <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Has olvidado tu contraseña?</a></p> -->

                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Ingresar</button>
              </form>

            </div>

            <!-- <div>
              <p class="mb-0">Aun no tienes cuenta? <a href="<?= site_url('Login/create') ?>" class="text-white-50 fw-bold">Registrarse</a></p>
            </div> -->

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- jQuery -->
<script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>

</body>
</html>

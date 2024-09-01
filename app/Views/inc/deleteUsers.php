<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <!-- Bootstrap CSS -->
 
    </style>
</head>
<body>
    
    <div class="container">
        <h2 class="text-center">Confirmar Eliminación</h2>
        <p class="text-center">¿Estás seguro de que deseas eliminar este usuario?</p>

        <form id="deleteForm" action="<?= site_url('Login/deleteUser') ?>" method="post">
            <?= csrf_field() ?>
            <div class="text-center mb-3"> 
                <button type="submit" class="btn btn-danger" href="<?= site_url('Login/index') ?>">Eliminar</button>
                <a href="<?= site_url('Login/index') ?>" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Pe4x8U2Dw2qcqz8XC2JirJmvBqEe4KRm/aIb+D/URGFCqjJkSwDQROa7E2vfxF2z" crossorigin="anonymous"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-cUgZ8WiUxS96VcGrdjF7XR67fO19fV4X06aXYHyMi2Ff6kEmaPV5/jc3j8NwLx8JlltyFpB+cjms9c4uXtPuDA==" crossorigin="anonymous"></script>
</body>
</html>


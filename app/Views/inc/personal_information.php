<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Personal</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>"> 
    <style>
        .form-control {
            width: 100%;
            padding: 0.5rem;
            margin: 0.5rem 0;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
        }
        .btn-primary:disabled {
            background-color: #b0bec5;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Información Personal</h2>
        <form action="<?= site_url('login/actualizarInformacion') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="nombreUsuario">Nombre de Usuario</label>
                <input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control" value="<?= esc($usuario['nombreUsuario']) ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?= esc($usuario['nombre']) ?>">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control" value="<?= esc($usuario['apellido']) ?>">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= esc($usuario['email']) ?>">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" value="<?= esc($usuario['telefono']) ?>">
            </div>
            <div class="form-group">
                <label for="contrasenia">Nueva Contraseña (opcional)</label>
                <input type="password" id="contrasenia" name="contrasenia" class="form-control" placeholder="Ingrese nueva contraseña (opcional)">
            </div>
            <button type="submit" class="btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>



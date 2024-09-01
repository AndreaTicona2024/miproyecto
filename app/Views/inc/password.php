<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cambiar Contraseña</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style/styles.css"> <!-- Vincula tu archivo CSS aquí -->
</head>
<body>
  <div class="container">
    <h2>Cambiar Contraseña</h2>
    <form action="/cambiar-contrasena" method="post">
      <div class="form-group">
        <label for="currentPassword">Contraseña Actual</label>
        <input type="password" id="currentPassword" name="currentPassword" class="form-control" placeholder="Ingresa tu contraseña actual" required>
      </div>
      <div class="form-group">
        <label for="newPassword">Nueva Contraseña</label>
        <input type="password" id="newPassword" name="newPassword" class="form-control" placeholder="Ingresa tu nueva contraseña" required>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirmar Nueva Contraseña</label>
        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirma tu nueva contraseña" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
      </div>
    </form>
  </div>
</body>
</html>

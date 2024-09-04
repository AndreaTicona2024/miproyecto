<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 1.5rem;
            color: #333;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }
        .form-control {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            box-sizing: border-box;
        }
        .form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .form-group input[type="file"] {
            border: none;
        }
        .form-group .img-preview {
            margin-top: 1rem;
            max-width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulario de Producto</h2>
        <form action="<?= site_url('productos/guardar') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del producto" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="4" placeholder="Descripción del producto" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="precioBase">Precio Base</label>
                <input type="number" id="precioBase" name="precioBase" class="form-control" placeholder="Precio base del producto" step="0.01" required>
            </div>
            
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" class="form-control" placeholder="Cantidad en stock" required>
            </div>
            
            <div class="form-group">
                <label for="fechaRegistro">Fecha de Registro</label>
                <input type="date" id="fechaRegistro" name="fechaRegistro" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="fechaActualizacion">Fecha de Actualización</label>
                <input type="date" id="fechaActualizacion" name="fechaActualizacion" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="estado">Estado</label>
                <select id="estado" name="estado" class="form-control" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="imgUrl">Imagen del Producto</label>
                <input type="file" id="imgUrl" name="imgUrl" class="form-control">
                <img id="imgPreview" class="img-preview" src="" alt="Vista previa" style="display: none;">
            </div>
            
            <button type="submit" class="btn-primary">Guardar</button>
            <a href="<?= site_url('productos') ?>" class="btn-secondary">Cancelar</a>
        </form>
    </div>

    <script>
        document.getElementById('imgUrl').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('imgPreview');
                    img.src = e.target.result;
                    img.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imgPreview').style.display = 'none';
            }
        });
    </script>
</body>
</html>

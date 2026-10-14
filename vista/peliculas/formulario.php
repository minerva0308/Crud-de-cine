<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pelicula->getId() ? 'Editar película' : 'Nueva película' ?></title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>
<div class="formulario-contenedor">
    <h1><?= $pelicula->getId() ? 'Editar película' : 'Registrar película' ?></h1>

    <form method="POST" action="index.php?accion=<?= $pelicula->getId() ? 'actualizar' : 'guardar' ?>">
        <?php if ($pelicula->getId()): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($pelicula->getId()) ?>">
        <?php endif; ?>

        <label>Nombre de la película</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($pelicula->getNombre()) ?>" required>

        <label>Género</label>
        <input type="text" name="genero" value="<?= htmlspecialchars($pelicula->getGenero()) ?>" required>

        <label>Duración (minutos)</label>
        <input type="number" name="duracion" min="1" value="<?= htmlspecialchars($pelicula->getDuracion()) ?>" required>

        <label>Imagen portada</label>
        <input type="text" name="imagenportada" value="<?= htmlspecialchars($pelicula->getImagenportada()) ?>" placeholder="ejemplo.jpg" required>

        <div class="form-botones">
            <button type="submit" class="btn btn-guardar">Guardar</button>
            <a href="index.php" class="btn btn-cancelar">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>

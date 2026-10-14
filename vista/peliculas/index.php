<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Películas</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>
<div class="contenedor">
    <div class="encabezado">
        <h1>Listado de Películas</h1>
        <a href="index.php?accion=nueva" class="btn btn-nuevo">+ Nueva película</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Género</th>
                <th>Duración</th>
                <th>Imagen portada</th>
       
            </tr>
        </thead>
        <tbody>
        <?php if (empty($peliculas)): ?>
            <tr>
                <td colspan="6" class="vacio">No existen películas registradas.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($peliculas as $pelicula): ?>
                <tr>
                    <td><?= htmlspecialchars($pelicula->getId()) ?></td>
                    <td><?= htmlspecialchars($pelicula->getNombre()) ?></td>
                    <td><?= htmlspecialchars($pelicula->getGenero()) ?></td>
                    <td><?= htmlspecialchars($pelicula->getDuracion()) ?> minutos</td>
                    <td>
                        <?php if ($pelicula->getImagenportada() !== ''): ?>
                            <?= htmlspecialchars($pelicula->getImagenportada()) ?>
                        <?php else: ?>
                            Sin imagen
                        <?php endif; ?>
                    </td>
                    <td class="botones">
                        <a href="index.php?accion=editar&id=<?= urlencode($pelicula->getId()) ?>" class="btn btn-editar">Editar</a>
                        <a href="index.php?accion=eliminar&id=<?= urlencode($pelicula->getId()) ?>" class="btn btn-eliminar" onclick="return confirm('¿Está seguro de eliminar esta película?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>

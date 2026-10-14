<?php

require_once "config/database.php";
require_once "modelo/Pelicula.php";
require_once "modelo/PeliculaDao.php";
require_once "controlador/PeliculaController.php";

$database = new Database();
$conexion = $database->conectar();

$dao = new PeliculaDao($conexion);
$controlador = new PeliculaController($dao);

$accion = $_GET["accion"] ?? "index";

switch ($accion) {
    case "guardar":
        $controlador->guardar();
        break;

    case "nueva":
        $controlador->nueva();
        break;

    case "editar":
        $controlador->editar();
        break;

    case "actualizar":
        $controlador->actualizar();
        break;

    case "eliminar":
        $controlador->eliminar();
        break;

    default:
        $controlador->index();
        break;
}

?>

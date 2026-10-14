<?php

require_once __DIR__ . "/../modelo/Pelicula.php";
require_once __DIR__ . "/../modelo/PeliculaDao.php";

class PeliculaController
{
    private $dao;

    public function __construct($dao)
    {
        $this->dao = $dao;
    }

    public function index()
    {
        $peliculas = $this->dao->listar();
        require __DIR__ . "/../vista/peliculas/index.php";
    }

    public function guardar()
    {
        $pelicula = new Pelicula();
        $pelicula->setNombre($_POST["nombre"] ?? "");
        $pelicula->setGenero($_POST["genero"] ?? "");
        $pelicula->setDuracion($_POST["duracion"] ?? 0);
        $pelicula->setImagenportada($_POST["imagenportada"] ?? "");

        $this->dao->insertar($pelicula);

        header("Location: index.php");
        exit;
    }

    public function nueva()
    {
        $pelicula = new Pelicula();
        require __DIR__ . "/../vista/peliculas/formulario.php";
    }

    public function editar()
    {
        $id = $_GET["id"] ?? null;
        $pelicula = $this->dao->buscarPorId($id);

        if (!$pelicula) {
            header("Location: index.php");
            exit;
        }

        require __DIR__ . "/../vista/peliculas/formulario.php";
    }

    public function actualizar()
    {
        $pelicula = new Pelicula();
        $pelicula->setId($_POST["id"] ?? null);
        $pelicula->setNombre($_POST["nombre"] ?? "");
        $pelicula->setGenero($_POST["genero"] ?? "");
        $pelicula->setDuracion($_POST["duracion"] ?? 0);
        $pelicula->setImagenportada($_POST["imagenportada"] ?? "");

        $this->dao->actualizar($pelicula);

        header("Location: index.php");
        exit;
    }

    public function eliminar()
    {
        $id = $_GET["id"] ?? null;
        $this->dao->eliminar($id);

        header("Location: index.php");
        exit;
    }
}

?>

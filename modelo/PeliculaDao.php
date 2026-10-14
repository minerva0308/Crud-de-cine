<?php

require_once __DIR__ . "/Pelicula.php";

class PeliculaDao
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function listar()
    {
        $sql = "SELECT id, nombre, genero, duracion, imagenportada
                FROM pelicula
                ORDER BY id DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        $peliculas = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $peliculas[] = new Pelicula(
                $fila["id"],
                $fila["nombre"],
                $fila["genero"],
                $fila["duracion"],
                $fila["imagenportada"]
            );
        }

        return $peliculas;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT id, nombre, genero, duracion, imagenportada
                FROM pelicula
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(["id" => $id]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Pelicula(
                $fila["id"],
                $fila["nombre"],
                $fila["genero"],
                $fila["duracion"],
                $fila["imagenportada"]
            );
        }

        return null;
    }

    public function insertar(Pelicula $pelicula)
    {
        $sql = "INSERT INTO pelicula
                (nombre, genero, duracion, imagenportada)
                VALUES
                (:nombre, :genero, :duracion, :imagenportada)";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            "nombre" => $pelicula->getNombre(),
            "genero" => $pelicula->getGenero(),
            "duracion" => $pelicula->getDuracion(),
            "imagenportada" => $pelicula->getImagenportada()
        ]);
    }

    public function actualizar(Pelicula $pelicula)
    {
        $sql = "UPDATE pelicula
                SET nombre = :nombre,
                    genero = :genero,
                    duracion = :duracion,
                    imagenportada = :imagenportada
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            "id" => $pelicula->getId(),
            "nombre" => $pelicula->getNombre(),
            "genero" => $pelicula->getGenero(),
            "duracion" => $pelicula->getDuracion(),
            "imagenportada" => $pelicula->getImagenportada()
        ]);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM pelicula WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute(["id" => $id]);
    }
}

?>

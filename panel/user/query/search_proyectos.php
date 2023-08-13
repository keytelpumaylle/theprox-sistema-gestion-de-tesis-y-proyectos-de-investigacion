<?php
@session_start();
include_once '../../../db/conexion.php';
include_once '../../../config/config.php';
include_once '../../../config/funciones.php';

$categoria = $_POST['categoria'];

// Realizamos la consulta a la base de datos para obtener proyectos por categoría
$sql = "SELECT * FROM archivo
        INNER JOIN autor ON archivo.idAutor = autor.idAutor
        INNER JOIN categoría ON archivo.idCat = categoría.idCat
        INNER JOIN calificacion ON archivo.idCal = calificacion.idCal
        WHERE categoría.nombreCat = '".$categoria."';";

$consulta = $conector->query($sql);

if ($consulta->num_rows > 0) {
  while ($archivo = $consulta->fetch_assoc()) {
    include "../view.php";
  }
} else {
  // Si no se encontraron resultados
  echo '<p>No se encontraron proyectos</p>';
}
?>

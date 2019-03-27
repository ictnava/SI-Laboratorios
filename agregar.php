<?php
include 'conexion.php';
$usuario = $_GET['nombre'];
$pelicula = $_GET['peli'];
$sql = "INSERT INTO lista (nombre,usuario) VALUES ('".$pelicula."','".$usuario."')";
$conexion->query($sql);
header('Location: peliculas.php');
?>
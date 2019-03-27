<?php
include 'conexion.php';
$id = $_GET['id'];
$tabla = $_GET['tabla'];
$pagina = $_GET['pagina'];
$sql = 'DELETE FROM '.$tabla.' WHERE id ='.$id;
$conexion->query($sql);
header('Location:'.$pagina.'.php');
?>
<?php
session_start();
include("include/conexion.php");

/* SOLO MIEMBRO */
if($_SESSION['usuario']['rol_id']!=3){
exit("No autorizado");
}

$id=$_GET['id'];
$estado=$_GET['estado'];

$sql="UPDATE tareas SET estado='$estado' WHERE id=$id";

$conexion->query($sql);

header("Location: tareas.php");
?>
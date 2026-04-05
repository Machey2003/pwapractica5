<?php
$conexion = new mysqli("localhost","root","","gestion_tareas");

if($conexion->connect_error){
    die("Error de conexión");
}
?>
<?php
session_start();
include("include/conexion.php");

if($_SESSION['usuario']['rol_id']!=2){
exit("Solo gerente");
}

if(isset($_POST['guardar'])){

$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$usuario=$_POST['usuario_id'];

$sql="INSERT INTO tareas(titulo,descripcion,usuario_id)
VALUES('$titulo','$descripcion','$usuario')";

$conexion->query($sql);
$mensaje="Tarea creada correctamente";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Crear Tarea</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<h2>Crear Tarea</h2>

<?php if(isset($mensaje)) echo "<div class='alert alert-success'>$mensaje</div>"; ?>

<form method="POST">

<input class="form-control mb-3" name="titulo" placeholder="Título">

<textarea class="form-control mb-3" name="descripcion" placeholder="Descripción"></textarea>

<select class="form-control mb-3" name="usuario_id">

<?php
$usuarios=$conexion->query("SELECT * FROM usuarios WHERE rol_id=3");
while($u=$usuarios->fetch_assoc()){
echo "<option value='{$u['id']}'>{$u['nombre']}</option>";
}
?>

</select>

<button class="btn btn-primary">Crear</button>

</form>

</div>
</div>

</body>
</html>
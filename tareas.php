<?php
session_start();
include("include/conexion.php");

$usuario_id=$_SESSION['usuario']['id'];
$rol=$_SESSION['usuario']['rol_id'];

if($rol==3){
$sql="SELECT t.*,u.nombre
FROM tareas t
JOIN usuarios u ON t.usuario_id=u.id
WHERE usuario_id=$usuario_id";
}else{
$sql="SELECT t.*,u.nombre
FROM tareas t
JOIN usuarios u ON t.usuario_id=u.id";
}

$resultado=$conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Tareas</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<h2>Lista de Tareas</h2>

<table class="table table-hover">

<tr>
<th>Título</th>
<th>Descripción</th>
<th>Asignado</th>
<th>Estado</th>
<th>Acción</th>
</tr>

<?php while($t=$resultado->fetch_assoc()){ ?>

<tr>
<td><?= $t['titulo'] ?></td>
<td><?= $t['descripcion'] ?></td>
<td><?= $t['nombre'] ?></td>
<td><?= $t['estado'] ?></td>

<td>
<?php if($rol==3){ ?>
<a class="btn btn-warning btn-sm"
href="cambiar_estado.php?id=<?= $t['id'] ?>&estado=En proceso">
Proceso
</a>

<a class="btn btn-success btn-sm"
href="cambiar_estado.php?id=<?= $t['id'] ?>&estado=Completado">
Completar
</a>
<?php } ?>
</td>

</tr>

<?php } ?>

</table>

</div>
</div>

</body>
</html>
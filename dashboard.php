<?php
session_start();

if(!isset($_SESSION['usuario'])){
header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<h2>Bienvenido <?= $_SESSION['usuario']['nombre']; ?></h2>

<a class="btn btn-success mb-2" href="tareas.php">
Ver Tareas
</a>

<?php if($_SESSION['usuario']['rol_id']==2){ ?>
<a class="btn btn-primary mb-2" href="crear_tarea.php">
Crear Tarea
</a>
<?php } ?>

<a class="btn btn-danger" href="login.php">
Cerrar sesión
</a>

</div>

</div>

</body>
</html>
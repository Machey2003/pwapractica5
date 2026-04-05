<?php
session_start();
include("include/conexion.php");

if(isset($_POST['ingresar'])){

$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM usuarios
WHERE email='$email' AND contraseña='$password'";

$result=$conexion->query($sql);

if($result->num_rows>0){
$user=$result->fetch_assoc();
$_SESSION['usuario']=$user;
header("Location: dashboard.php");
}else{
$error="Datos incorrectos";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<div class="container login-box">
<div class="row justify-content-center">
<div class="col-md-4">

<div class="card p-4">

<h3 class="text-center">Sistema de Tareas</h3>

<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

<form method="POST">

<input class="form-control mb-3" type="email" name="email" placeholder="Correo">

<input class="form-control mb-3" type="password" name="password" placeholder="Contraseña">

<button class="btn btn-primary w-100" name="ingresar">
Ingresar
</button>

</form>

</div>
</div>
</div>
</div>

</body>
</html>
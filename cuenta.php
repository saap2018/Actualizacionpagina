<?php 

//include('conexion.php');
include('Login/login/session.php');
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
	$session_Id=$_SESSION['usuario'];
	$userClass = new se;
	$userDetails=$userClass->userDetails($session_Id);
?>

<!DOCTYPE html>
<html>
<head>
	<title>saap</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
<body>
	<div class="w3-container w3-black w3-center">
	  <h1>BIENVENIDO A SAAP </h1>
	</div>
	<p></p>
 <?php echo $userDetails->nombre; ?> 
    <ul>
<li><a href="ingresos.php">Generar Ingreso</a></li>
<li><a href="registro clientes.php">Gestion de clientes</a></li>
<li><a href="registro usuarios.php">Gestion de usuarios</a></li>
<li><a href="vehiculos.php">Gestion de vehiculos</a></li>
<li><a href="empleados.php">Gestion de empleados</a></li>
<li><a href="convenios.php">Gestionar convenios</a></li>
<li><a href="disponibles.php">Disponibilidad de parqueaderos</a></li>
<li><a href="tiempos.php">Liquidar tiempo</a></li>
</ul>
	<form class="w3-container" action="Login/login/controller_login.php" method="post">
		<input type="hidden" name="salir" value="salir">
		<button class="w3-btn w3-green">Salir</button>
	</form>
      
</body>
</html>
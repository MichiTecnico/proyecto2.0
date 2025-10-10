<?php  
require_once '../php/validate_session.php';
$_SESSION['rol'];
if ($_SESSION['rol'] !== 'gerente' && $_SESSION['rol'] !== 'administrador' || $_SESSION['division'] !== 'economia_circulante' && $_SESSION['division'] !== 'tecnologia'){
	header("Location: login.php");
	exit();
}

session_start();
include "../inc/navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Economia Circulante</title>
    <link rel="stylesheet" href="../css/estilos_vistas.css">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
	<style>
		body{
		    background-image: url("../img/eco_circulante.jpg"); /* Reemplaza con la URL de tu imagen */
		    background-repeat: no-repeat;
		    background-position: fixed;
		    background-size: contain;
		    background-position: center;
		    background-color: #D1CABE;
		    background-attachment: fixed;
		    background-blend-mode: multiply;
	    }	
	</style>
<body>
	<div>
		<button onclick="registrar_comunidad()">Registrar comunidad</button>
		<button onclick="crear_recibo()">Crear recibo</button>

	</div>

<script>
	//Crear recibo
	function crear_recibo(){
		var registro = document.getElementById('form_comunidad');
		var recibo = document.getElementById("form_recibo");
		if (recibo.style.display === "none" || registro.style.display = ""){
			registro.style.display = "none";
			recibo.style.display = "block";
		}else{
			recibo.style.display = "none";
		}
	}

		function registrar_comunidad(){
		var registro = document.getElementById('form_comunidad');
		var recibo = document.getElementById("form_recibo");
		if (registro.style.display === "none" || recibo.style.display = ""){
			recibo.style.display === "none";
			registro.style.display = "block";
		}else{
			registro.style.display = "none";
		}
	}

</script>
	
<?php include "formulario_recibo.php"; ?>
<?php include "formulario_comercio.php"?>

	
</body>
</html>
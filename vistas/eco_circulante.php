<?php  
require_once '../php/validate_session.php';
$_SESSION['rol'];
if ($_SESSION['rol'] !== 'gerente' && $_SESSION['rol'] !== 'administrador' || $_SESSION['division'] !== 'economia_circulante' && $_SESSION['division'] !== 'tecnologia'){
	header("Location: login.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Economia Circulante</title>
    <link rel="stylesheet" href="../css/estilos_vistas.css">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">


</head>
	<style>
		body{
			min-height: 100vh;
			overflow-y: auto;
		    background-image: url("../img/eco_circulante.jpg"); /* Reemplaza con la URL de tu imagen */
		    background-repeat: no-repeat;
		    background-position: center;
		    background-size: cover;
		    background-attachment: fixed;
		    background-blend-mode: multiply;
	    }	
	</style>
<body>

	
	<!--INCLUIR BARRA DE NAVEGACION PREDETERMINADA-->

<div class="contenedor_sidebar_eco">
	<div class="d-flex flex-column h-100 p-3 bg-light flex-shrink-0 menu-altura-completa" style="width: 280px;">
	    <h2 class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none" style="text-align: center;">Division de Economia Circulante
	    </h2>
	    <hr>
	    <ul class="nav nav-pills flex-column mb-auto">
	        <div class="mb-3">
	            <li class="input-group mb-3">
	                <span class="input-group-text"><i class="bi bi-building-fill text-light"></i></span>
	                <button class="btn btn-outline-dark" onclick="registrar_comunidad()">Registrar comunidad</button>
	            </li>
	        </div>
	        <div>
	            <li class="input-group mb-3">
	                <span class="input-group-text"><i class="bi bi-receipt text-light"></i></span>
	                <button class="btn btn-outline-dark" onclick="crear_recibo()">Crear recibo</button>
	            </li>
	        </div>
	        <li class="mb-3">
	            <li class="input-group mb-3">
	                <span class="input-group-text"><i class="bi bi-clipboard-check-fill text-light"></i></span>
	                <button class="btn btn-outline-dark" onclick="()">Listar Comunidades</button>
	            </li>
	        </li>
	    </ul>
	    <hr>
	    <div class="dropdown">
	        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
	            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
	            <?php
	                echo '<strong>' . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . '<br>' . 'CI: ' . $_SESSION['cedula'] . '</strong>';
	            ?>
	        </a>
	        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
	            <li><a class="dropdown-item" href="#">Nuevo proyecto...</a></li>
	            <li><a class="dropdown-item" href="#">Configuración</a></li>
	            <li><a class="dropdown-item" href="#">Perfil</a></li>
	            <li><hr class="dropdown-divider"></li>
	            <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
	        </ul>
	    </div>
	</div>
</div>


<div class="contenido">
	
	<?php include "formulario_recibo.php"; ?>	
	<?php include "formulario_comercio.php"; ?>

</div>

<script>
	function registrar_comunidad(){
		var registro = document.getElementById("form_comunidad");
		var recibo = document.getElementById("form_recibo");
		if (registro.style.display === "none" || recibo.style.display === ""){
			recibo.style.display = "none";
			registro.style.display = "block";
		}else{
			registro.style.display = "none";
		}
	}


	//Crear recibo
	function crear_recibo(){
		var registro = document.getElementById('form_comunidad');
		var recibo = document.getElementById("form_recibo");
		if (recibo.style.display === "none" || registro.style.display === ""){
			registro.style.display = "none";
			recibo.style.display = "block";
		}else{
			recibo.style.display = "none";
		}
	}


</script>


	
		<div id="alertContainer" 
		style="
		position: absolute;
		top: 10%; 
		left: 1500%; 
		z-index: 1000; 
		width: 300px;
		">
			
		</div>
	
</body>
</html>

<?php
require_once '../php/validate_session.php';
if($_SESSION['rol'] !== 'administrador' || $_SESSION['division' !== 'tecnologia']){
	header("Location: ../vistas/login.php");
	exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Division de Tecnologia</title>
	<link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos_vistas.css">
	<style>
	.password-container {
		position: relative;
	}
	.toggle-password{
		position: absolute;
		right: 25px;
		top: 82.5%;
		transform: translateY(-40%);
		cursor: pointer;
		background: none;
		border: none;
	}	
	body {
    background-image: url("../img/tecno_recicla.png"); /* Reemplaza con la URL de tu imagen */
	background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-color: rgba(0, 0, 0, 0.3);
    background-blend-mode: multiply;
    min-height: 100vh;
    overflow-y: auto;
	}
	</style>
</head>
<body>
	
	<!--INCLUIR BARRA DE NAVEGACION PREDETERMINADA-->
	<?php include "../inc/navbar.php";?>
				<!--MENU VERTICAL A LA IZQUIERDA-->	
			<nav class="menu_vertical">
				<ul class="nav flex-column">
	  				<li class="nav-item">
	  					<!--Registro de personal-->
	    				<button class="botones_menu_vertical" onclick="mostrar_crud0()">Registro<br><img class="icono_menu_vertical" src="../img/icono_usuarios.png"></button>
	  				</li>
					<li class="nav-item">
						<!--Listado de personal registrado-->
						<button class="botones_menu_vertical" onclick="mostrar_crud1()">Listado<img class="icono_menu_vertical" src="../img/icono_listado.png"></button>
					</li>
					<li class="nav-item">
						<!--Entradas a otras divisiones-->
						<button class="botones_menu_vertical" onclick="mostrar_entradas()">Entradas<img class="icono_menu_vertical" src="../img/entrada.png"></button>
					</li>
				</ul>
			<nav>

			<!--ACCION DE BOTONES-->
			<script>
				//CRUD
				function mostrar_crud0(){
					var crud0 = document.getElementById("form_registro");
					var crud1 = document.getElementById("lista_usuarios");
					var entradas = document.getElementById("entradas");
					if (crud0.style.display === "none" || crud1.style.display === "" || entradas.style.display === ""){
						crud0.style.display = "block";
						crud1.style.display = "none";
						entradas.style.display = "none";
					}else{
						crud0.style.display = "none";
					}
				}

				
				function mostrar_crud1(){
					var crud1 = document.getElementById("lista_usuarios");
					var crud0 = document.getElementById("form_registro");
					var entradas = document.getElementById("entradas");
					if (crud1.style.display === "none" || crud0.style.display === "" || entradas.style.display === ""){
						crud1.style.display = "block"; 
						crud0.style.display = "none";
						entradas.style.display = "none";
					}else{
						crud1.style.display = "none";
					}
				}

				function mostrar_entradas(){
					var crud1 = document.getElementById("lista_usuarios");
					var crud0 = document.getElementById("form_registro");
					var entradas = document.getElementById("entradas");
					if (entradas.style.display === "none" || crud0.style.display === "" || crud1.style.display === ""){
						entradas.style.display = "block"; 
						crud0.style.display = "none";
						crud1.style.display = "none";
					}else{
						entradas.style.display = "none";
					}
				}	
			</script>

		<div class="contenedor_form_registro" id="form_registro">
			<?php include "../vistas/register.php";?>

		</div>
		<div id="alertContainer" 
		style="
		position: absolute;
		top: 10%; 
		left: 1500%; 
		z-index: 1000; 
		width: 300px;
		">
			
		</div>


		<div class="contenedor_lista_usu" id="lista_usuarios">	
			<?php include "../vistas/read.php";?>
		</div>

		<div class="contenedor_entradas" id="entradas">
			<?php include "../vistas/entradas.php"?>		
		</div>

</body>
</html>


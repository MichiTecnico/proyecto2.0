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
	<nav class="menu_vertical">
		<button class="botones_menu_vertical" onclick="mostrar_recibo()">Crear recibo<br><img class="icono_menu_vertical" src="../img/icono_recibo.png"></button>
	</nav>

<script>
	//Crear recibo
	function mostrar_recibo(){
		var catalogo = document.getElementById('vista_catalogo');
		var recibo = document.getElementById("form_recibo");
		if (recibo.style.display === "none"){
			recibo.style.display = "block";
		}else{
			recibo.style.display = "none";
		}
	}
</script>
	
<?php include "formulario_recibo.php"; ?>


	<div class="contenedor_archivo">
		<form style="margin-bottom: 1%; padding: 1%;" action="../php/proc_arch.php" method="POST" enctype="multipart/form-data">	
				<select class="form-select" style="max-width: 200px;" name="destino_d" required>
					<option value="" disabled selected>Division</option>
					<option value="Recoleccion">Recoleccion</option>
					<option value="Comercializacion">Comercializacion</option>
				</select>
			<input type="file" name="archivo[]"><br>			
			<button type="submit" name="btn_archivo">Enviar</button>
		</form>
	</div>
</body>
</html>
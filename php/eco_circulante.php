<!DOCTYPE html>
<html>
<head>
	<title>Economia Circulante</title>
    <link rel="stylesheet" href="../css/estilos_vistas.css">

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
	<div class="contenedor_archivo">
		<form action="../php/proc_arch.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="archivo[]"><br>
			<input type="file" name="archivo[]"><br>
			<input type="file" name="archivo[]"><br>
			<button type="submit">Enviar</button>
			
		</form>
	</div>
</body>
</html>
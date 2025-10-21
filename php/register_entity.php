<?php
require "main.php";

	if (isset($_POST['btn_register_entity'])) {
		$nombre = $_POST['nombre'] ?? ''; 
		$comite = $_POST['comite'] ?? '';
		$ubicacion = $_POST['ubicacion'] ?? '';
		$responsable = $_POST['nombre_responsable'] ?? '';
		$responsable_cedula = $_POST['cedula_responsable'] ?? '';
		$responsable_telefono = $_POST['telefono_responsable'] ?? '';
		$tipo_comunidad = $_POST['tipo'] ?? '';
		$fecha = date("Y-m-d") ?? '';

		if (empty($nombre) || empty($comite) || empty($ubicacion) || empty($responsable) || empty($responsable_cedula) || empty($responsable_telefono) || empty($tipo_comunidad)) {
			echo "<script>
	                alert('Hay campos vacios');
	                window.location.href='../vistas/eco_circulante.php';
	            </script>";
	            exit();
		}

		$responsable_cedula = preg_replace('/\D/', '', $responsable_cedula);

	    if (strlen($responsable_cedula) < 7 || strlen($responsable_cedula) > 8) {
		    echo "<script>
		            alert('Cédula debe tener 7 u 8 dígitos');
		            window.location.href='../vistas/eco_circulante.php';
		        </script>";
		    exit();
		}

	    $sql = "INSERT INTO entidad(nombre, comite, ubicacion, nombre_responsable, cedula_responsable, telefono_responsable, tipo, fecha_registro) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $con->prepare($sql);
		$stmt->bind_param("ssssisss", $nombre, $comite, $ubicacion, $responsable, $responsable_cedula, 
			$responsable_telefono, $tipo_comunidad, $fecha);

		if ($stmt->execute()) {
			echo "<script> alert('Entidad registrada exitosamente'); window.location.href='../vistas/eco_circulante.php';</script>";
		}else{
			echo "<script> alert('Entidad no registrada'); window.location.href='../vistas/eco_circulante.php';</script>";
		}

		$stmt->close();
		$con->close();
	}


?>
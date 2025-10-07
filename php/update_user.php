<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL); 
include 'main.php'; 

// LECTURA DE CAMPOS
if(isset($_GET['id'])){ 
    $id = $_GET['id']; 
    $sql_read_update = "SELECT * FROM personal WHERE id = $id"; 
    $result = mysqli_query($con, $sql_read_update); 
    $row = mysqli_fetch_array($result); 
} 

// ACTUALIZAR DATOS 
if(isset($_POST['btn_actualizar'])) { 
    $nacionalidad = $_POST['nacionalidad']; 
    $cedula = $_POST['cedula']; 
    $fecha_nac = $_POST['fecha_nac'];
    $nombre = $_POST['nombre']; 
    $apellido = $_POST['apellido']; 
    $clave = $_POST['clave']; 
    $clave_admin = $_POST['clave_admin'];
    $id_gerencia = $_POST['id_gerencia']; 
    $id_division = $_POST['id_division']; 
    $id_rol = $_POST['id_rol']; 
    $id = $_GET['id']; // Cambié esto de $_GET a $_POST

    // Conversión de gerencias
    switch ($id_gerencia) { 
        case 'Gestion Interna': 
            $id_gerencia = 1; 
            break; 
        case 'Consultoria Juridica': 
            $id_gerencia = 2; 
            break; 
        case 'Operaciones': 
            $id_gerencia = 3; 
            break; 
        case 'Gestion Comercial': 
            $id_gerencia = 4; 
            break; 
    } 

    // Conversión de divisiones
    switch ($id_division) { 
        case 'Administracion y Finanzas': 
            $id_division = 1; 
            break; 
        case 'Gestion Humana': 
            $id_division = 2; 
            break; 
        case 'Seguridad Integral': 
            $id_division = 3; 
            break; 
        case 'Planificacion y Presupuesto': 
            $id_division = 4; 
            break; 
        case 'Tecnologias de la Informacion y Comunicacion': 
            $id_division = 5; 
            break; 
        case 'Gestion Comunicacional': 
            $id_division = 6; 
            break; 
        case 'Servicios': 
            $id_division = 7; 
            break; 
        case 'Recoleccion': 
            $id_division = 8; 
            break; 
        case 'Comercializacion': 
            $id_division = 9; 
            break; 
        case 'Economia Circulante': 
            $id_division = 10; 
            break; 
    } 

    // Conversión de roles
    switch($id_rol){ 
        case "Administrador": 
            $id_rol = 1; 
            break; 
        case "Gerente": 
            $id_rol = 2; 
            break; 
        case "Empleado": 
            $id_rol = 3; 
            break; 
    } 

    // Verificar clave de administrador
    $sql_read_update = "SELECT clave FROM personal WHERE id_rol = 1";
    $result = mysqli_query($con, $sql_read_update);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($con));
    }

    $clave_valida = false;
    while ($clave_var = mysqli_fetch_array($result)) {
        if (password_verify($clave_admin, $clave_var['clave'])) {
            $clave_valida = true;
            break;
        }
    }

    if ($clave_valida) {
        // Si se proporcionó una nueva clave, actualizarla
        if (!empty($clave)) {
            $clave_hash = password_hash($clave, PASSWORD_DEFAULT);
            $sql_update_admin = "UPDATE personal SET nacionalidad = '$nacionalidad', cedula = '$cedula', fecha_nac = '$fecha_nac', nombre = '$nombre', apellido = '$apellido', clave = '$clave_hash', id_rol = $id_rol, id_gerencia = $id_gerencia, id_division = $id_division WHERE id = $id";
        } else {
            // No actualizar la clave si está vacía
            $sql_update_admin = "UPDATE personal SET nacionalidad = '$nacionalidad', cedula = '$cedula', fecha_nac = '$fecha_nac', nombre = '$nombre', apellido = '$apellido', id_rol = $id_rol, id_gerencia = $id_gerencia, id_division = $id_division WHERE id = $id";
        }
        
        $result_update_admin = mysqli_query($con, $sql_update_admin);
        
        if (!$result_update_admin) { 
            die("Error en la consulta UPDATE: " . mysqli_error($con)); 
        } else {
            echo "<script>
            alert('Se ha actualizado el usuario');
            window.location.href='../admin/tecnologia.php';
            </script>"; 
            exit();
        }
    } else {
        echo "<script>
        alert('Clave de administrador incorrecta');
        window.location.href='../admin/tecnologia.php';
        </script>"; 
        exit();
    }
}
?>
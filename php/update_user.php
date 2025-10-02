<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL); 
include 'main.php'; 
//LECTURA DE CAMPOS// 
if(isset($_GET['id'])){ 
    $id = $_GET['id']; 
    $sql_read_update = "SELECT * FROM personal WHERE id = $id"; 
    $result = mysqli_query($con, $sql_read_update ); 
    $row = mysqli_fetch_array($result); } //ACTUALIZAR DATOS 
    if(isset($_POST['btn_actualizar'])) { 
        $nacionalidad = $_POST['nacionalidad']; 
        $cedula = $_POST['cedula']; 
        $fecha_nac = $_POST['fecha_nac']; // Formato YYYY-MM-DD (no limpiar) 
        $nombre = $_POST['nombre']; 
        $apellido = $_POST['apellido']; 
        $clave = $_POST['clave']; 
        $id_gerencia = $_POST['id_gerencia']; 
        $id_division = $_POST['id_division']; 
        $id_rol = $_POST['id_rol']; 
        $id = $_GET['id']; 
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
            break; } 

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
                break; } 

                switch($id_rol){ 
                    case "Administrador": 
                    $id_rol = 1; 
                    break; 
                    case "Gerente": 
                    $id_rol = 2; 
                    break; 
                    case "Usuario": 
                    $id_rol = 3; 
                    break; } 



                    $sql_update = "UPDATE personal SET nacionalidad = '$nacionalidad', cedula = '$cedula', fecha_nac = '$fecha_nac', nombre = '$nombre', apellido = '$apellido', clave = '$clave', id_rol = $id_rol, id_gerencia = $id_gerencia, id_division = $id_division WHERE id = $id"; 
                    $result = mysqli_query($con, $sql_update);
                            echo "<script>
                            alert('Se ha actualizado el usuario');
                            window.location.href='../admin/tecnologia.php';
                            </script>"; 
                    exit();
                    if (!$result) { die("Error en la consulta UPDATE: " . mysqli_error($con)); } } ?> 
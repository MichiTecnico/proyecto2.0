<?php
require "main.php";

if(isset($_POST['btn_registrar'])){
    // Obtener y limpiar los datos del formulario
    $nacionalidad = $_POST['nacionalidad'] ?? '';
    $cedula = limpiar_cadena($_POST['cedula'] ?? '');
    $fecha_nac = $_POST['fecha_nac'] ?? ''; // Formato YYYY-MM-DD (no limpiar)
    $nombre = limpiar_cadena($_POST['nombre'] ?? '');
    $apellido = limpiar_cadena($_POST['apellido'] ?? '');
    $clave = limpiar_cadena($_POST['clave'] ?? '');
    $clave_ver = limpiar_cadena($_POST['clave_ver'] ?? '');
    $id_gerencia = limpiar_cadena($_POST['id_gerencia'] ?? '');
    $id_division = limpiar_cadena($_POST['id_division'] ?? '');
    $id_rol = $_POST['id_rol'] ?? '';
    
    

    // Validación combinada (Nacionalidad y Cedula)
    if (!in_array($nacionalidad, ['V', 'E'])) {
        echo "<script>
                alert('Seleccione nacionalidad válida (V/E)');
                window.location.href='../vistas/register.php';
            </script>";
        exit();
    }

    $cedula = preg_replace('/\D/', '', $cedula);

    if (strlen($cedula) < 7 || strlen($cedula) > 8) {
        echo "<script>
                alert('Cédula debe tener 7 u 8 dígitos');
                window.location.href='../admin/tecnologia.php';
            </script>";
        exit();
    }



    // Validaciones adicionales
    if (empty($nacionalidad) || empty($cedula) || empty($fecha_nac) || empty($nombre) || empty($apellido)
    || empty($clave) || empty($id_gerencia) || empty($id_division)) {
        echo "<script>
                alert('Hay campos vacios');
                window.location.href='../admin/tecnologia.php';
            </script>";
        exit();
    }
    

    if (strlen($clave) < 8) {
        die("La contraseña debe tener al menos 8 caracteres");
    }

    if ($clave != $clave_ver){
        echo "<script>
                alert('La contraseña no coincide');
                window.location.href='../admin/tecnologia.php';
            </script>";
        exit();
    }



    
    # Consultar si el usuario ya existe (con cedula)
    $stmt = $con->prepare("SELECT id FROM personal WHERE cedula = ?");
    $stmt->bind_param("i", $cedula);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0) {
        echo "<script>
                alert('El personal ya esta registrado');
                window.location.href='../admin/tecnologia.php';
              </script>";
        $stmt->close();
        exit();
    }
    $stmt->close();

    // Adaptar Gerencias y Divisiones a las id de la base de datos //

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

    

    $clave_hash = password_hash($clave, PASSWORD_DEFAULT);
    // Registrar nuevo usuario (roles y demas)//

    $sql = "INSERT INTO personal(nacionalidad, cedula, fecha_nac, nombre, apellido, clave, id_rol, id_gerencia, id_division, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param(
        "sissssiii", $nacionalidad, $cedula, $fecha_nac, $nombre, $apellido, $clave_hash, $id_rol, $id_gerencia, $id_division);
    
    if($stmt->execute()) {
        echo "<script>
                alert('Registro exitoso');
                window.location.href='../admin/tecnologia.php';
              </script>";
    } else {
        echo "<script>
                alert('Error en el registro: " . $con->error . "');
                window.location.href='../admin/tecnologia.php';
              </script>";
    }
    
    $stmt->close();
    $con->close();
}


?>
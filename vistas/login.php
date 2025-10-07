<?php
    /*Validacion de Personal*/
    require("../php/main.php");
    if(isset($_POST['btn_iniciar_personal'])){
        $cedula = limpiar_cadena($_POST['cedula']);
        $clave = limpiar_cadena($_POST['clave']);


        //Consulta SQL (con personal y rol)//
        $stmt = $con->prepare("SELECT
         p.id,
         p.cedula,
         p.nombre,
         p.apellido, 
         p.clave, 
         r.descripcion AS rol,
         g.descripcion AS gerencia,
         d.descripcion AS division 
         FROM personal p 
         JOIN rol r ON p.id_rol = r.id 
         LEFT JOIN gerencia g ON p.id_gerencia = g.id 
         LEFT JOIN division d ON p.id_division = d.id 
         WHERE p.cedula = ? AND p.status = 1");

        # Comparacion cedula
        $stmt->bind_param("i", $cedula);
        $stmt->execute();
        $result = $stmt->get_result();


        #Credenciales
        if ($result->num_rows === 1) {
            $personal = $result->fetch_assoc();



          # Comparacion de clave
            if ($clave_hasheada = password_verify($clave, $personal['clave'])) {
                session_start();
                $_SESSION['id'] = $personal['id'];
                $_SESSION['cedula'] = $personal['cedula'];
                $_SESSION['nombre'] = $personal['nombre'];
                $_SESSION['apellido'] = $personal['apellido'];
                $_SESSION['rol'] = $personal['rol'];
                $_SESSION['gerencia'] = $personal['gerencia'];
                $_SESSION['division'] = $personal['division'];
                $_SESSION['loggedin'] = true;
              
                //Redireccion segun Rol
                switch ($personal['rol']) {
                    case 'administrador':
                    header("Location: ../admin/tecnologia.php");
                    exit();
                    break;
                    case 'gerente':
                        switch ($personal['division']) {
                            case 'administracion_finanzas':
                            header("Location: admin_finanzas.php");
                            exit();    
                            break;
                            case 'gestion_humana':
                            header("Location: gestion_humana.php");
                            exit();
                            break;
                            case 'seguridad_integral':
                            header("Location: seguridad.php");
                            exit();
                            break;
                            case 'planificacion_presupuesto':
                            header("Location: planif_pre.php");
                            exit();
                            break;
                            case 'gestion_comunicacional':
                            header("Location: gestion_com.php");
                            exit();
                            break;
                            case 'servicios':
                            header("Location: servicios.php");
                            exit();
                            break;
                            case 'recoleccion':
                            header("Location: recoleccion.php");
                            exit();
                            break;
                            case 'comercializacion':
                            header("Location: comercializacion.php");
                            exit();
                            break;
                            case 'economia_circulante':
                            header("Location: eco_circulante.php");
                            exit();
                            break;
                            default:
                            header("Location: login.php");
                            exit();
                        }
                    exit();
                    break;

                }
            }
        }
    }
?>

<!--ADAPTAR AL FORMULARIO DE INICIO DE SESSION DE CLIENTE Y PERSONAL-->



<!-- Formulario de Personal -->
        <div cla>
            <form action="login.php" method="post" id="formPer" class="formulario_personal">
                <h2>Iniciar Sesión</h2>
                <input type="int" placeholder="Ingrese su cédula" name="cedula" id="cedula_per" autocomplete="off">
                <div class="password-container">
                    <input type="password" placeholder="Ingrese su clave" name="clave" id="password_per" required autocomplete="off">
                    <button type="button" class="toggle-password-per" onclick="togglePasswordPer()">
                        <i class="bi bi-eye-slash"></i>
                    </button>
                </div>
                <button type="submit" name="btn_iniciar_personal">Entrar</button>
            </form>
        </div>    






<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .password-container {
            position: relative;
        }
        .toggle-password-cli, .toggle-password-per {
            position: absolute;
            right: 1px;
            background: none;
            border: none;
            cursor: pointer;
        }
        .toggle-password-cli {
            top: -18px;
        }
        .toggle-password-per {
            top: -18px;
        }
    </style>
</head>
<body>

<!--Barra de Navegacion (PARA EL LOGIN)-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid justify-content-between align-items-center">
    
    <!-- Logo -->
    <a class="navbar-brand">
      <img src="../img/logo.png" width="200px" height="50px">
    </a>

    <!-- Botones con ajuste hacia la izquierda -->
    </div>
  
</nav>
<!--Barra de Navegacion (PARA EL LOGIN)-->


<!-- Scripts al final del documento -->
<script>
    // Función para formulario Cliente
    function togglePasswordCli() {
        const passwordInput = document.getElementById('password_cli');
        const toggleBtn = document.querySelector('.toggle-password-cli');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleBtn.innerHTML = '<i class="bi bi-eye"></i>';
        } else {
            passwordInput.type = 'password';
            toggleBtn.innerHTML = '<i class="bi bi-eye-slash"></i>';
        }
    }

    // Función para formulario Personal
    function togglePasswordPer() {
        const passwordInput = document.getElementById('password_per');
        const toggleBtn = document.querySelector('.toggle-password-per');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleBtn.innerHTML = '<i class="bi bi-eye"></i>';
        } else {
            passwordInput.type = 'password';
            toggleBtn.innerHTML = '<i class="bi bi-eye-slash"></i>';
        }
    }
</script>

<script>
    
</script>


<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
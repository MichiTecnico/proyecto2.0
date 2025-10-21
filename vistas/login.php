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
    .toggle-password{
        position: absolute;
        right: 10px;
        top: 40%;
        transform: translateY(-40%);
        cursor: pointer;
        background: none;
        border: none;
    }   

    </style>
</head>
<body>

<!--Barra de Navegacion (PARA EL LOGIN)-->
<nav class="navbar_log">
    
    <!-- Logo -->
      <img src="../img/ccs_recicla_logo.png" width="200px" height="100px">

    <!-- Botones con ajuste hacia la izquierda -->
  
</nav>
<!--Barra de Navegacion (PARA EL LOGIN)-->

<div class="contenedor_form_login">
<form id="formLogin" class="form_login" action="login.php" method="post">

    <div class="mb-3">
       <a class="d-flex justify-content-center"><img src="../img/logo.png" width="300px" height="200px"></a>
    </div>
    
  <div class="mb-3"><label><h1 style="text-align: center;">Iniciar session</h1></label></div>

  <div class="input-group mb-3">
    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
    <input type="int" name="cedula" class="form-control" id="id_cedula"  placeholder="Escriba su cedula" autocomplete="off">
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text"><i class="bi bi-key"></i></span>
    <input type="password" name="clave" class="form-control" id="id_clave" placeholder="Introduzca su clave de acceso" autocomplete="off"><span style="background-color: #FF8A00"><button type="button" class="toggle-password" onclick="togglePassword()"><i class="bi bi-eye-slash"></i></button></span>
  </div>

<div class="d-flex justify-content-end">
  <button type="submit" name="btn_iniciar_personal" class="btn btn-success">Ingresar</button>
</div>

</form>

<div id="alertContainer" 
style="
position: absolute;  
width: 300px;
left: -100%;">
</div>

</div>


<script>

function mostrarAlerta(mensaje, tipo = 'danger', tiempo = 5000){
    const alertContainer = document.getElementById('alertContainer');

    const alerta = document.createElement('div');
    alerta.className = `alert alert-${tipo} alert-dismissible fade show`;
    alerta.innerHTML =`
        <strong>Error:</strong> ${mensaje}`;

    alertContainer.appendChild(alerta);

    setTimeout(() => {
        if (alerta.parentElement) {
            alerta.remove();
        }
    }, tiempo);
}



    //Cuando se presiona el botón de enviar
    document.getElementById('formLogin').addEventListener('submit', function(e) {
                    
        //Obtener los valores de los campos (como siempre lo haces)
        const cedula = document.getElementById('id_cedula').value;
        const clave = document.getElementById('id_clave').value;

        const alertContainer = document.getElementById('alertContainer');

        // Inicializar variable si esta todo bien
        let todoBien = true;
        
        // Validar cedula
        if (isNaN(cedula)) {
            todoBien = false;
            mostrarAlerta('La cedula solo debe tener numeros');
        }

        // Validar longitud de cedula
        if (cedula.length > 8 || cedula.length < 7) {
            todoBien = false;
            mostrarAlerta('Cédula debe tener 7 u 8 dígitos');
        }


        // Validar campos vacíos
        if (cedula === '' || clave === '') {
            todoBien = false;
            mostrarAlerta('Hay campos vacios');
        }
        
        // Validar contraseña
        if (clave.length < 8) {
            todoBien = false;
            mostrarAlerta('La contraseña debe tener 8 caracteres o mas');

        }

        // 8. Solo enviar si todo está bien
        if (!todoBien) {
            e.preventDefault();
        }
    });

</script>
<script>


    function togglePassword() {
        const passwordInput = document.getElementById('id_clave');
        const toggleBtn = document.querySelector('.toggle-password');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleBtn.innerHTML = '<i class="bi bi-eye"></i>';
        }else{
            passwordInput.type = 'password';
            toggleBtn.innerHTML = '<i class="bi bi-eye-slash"></i>';
        }
    }
</script>



<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">


</body>
</html>






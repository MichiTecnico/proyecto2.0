<?php

    include '../php/update_user.php';
    $gerencia = $row['id_gerencia'];
    switch($gerencia){
        case "1":
            $row['id_gerencia'] = 'Gestion Interna';
        break;
        case "2";
            $row['id_gerencia'] = 'Consultoria Juridica';
        break;
        case "3";
            $row['id_gerencia'] = 'Operaciones';
        break;
        case "4";
            $row['id_gerencia'] = 'Gestion Comercial';
        break;
    }

    $division = $row['id_division'];
    switch($division){
        case "1":
            $row['id_division'] = 'Administracion y Finanzas';
        break;
        case "2":
            $row['id_division'] = 'Gestion Humana';
        break;
        case "3":
            $row['id_division'] = 'Seguridad Integral';
        break;
        case "4":
            $row['id_division'] = 'Planificacion y Presupuesto';
        break;
        case "5":
            $row['id_division'] = 'Tecnologias de la Informacion y Comunicacion';
        break;
        case "6":
            $row['id_division'] = 'Gestion Comunicacional';
        break;
        case "7":
            $row['id_division'] = 'Servicios';
        break;
        case "8":
            $row['id_division'] = 'Recoleccion';
        break;
        case "9":
            $row['id_division'] = 'Comercializacion';
        break;
        case "10":
            $row['id_division'] = 'Economia Circulante';
        break;
    }

    $id_rol = $row['id_rol'];
    switch($id_rol){
        case "1":
            $row['id_rol'] = 'Administrador';
        break;
        case "2":
            $row['id_rol'] = 'Gerente';
        break;
        case "3":
            $row['id_rol'] = 'Empleado';
        break;
    }
    
    

?>

    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos_vistas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
	.password-container {
		position: relative;
	}
	.toggle-password{
		position: absolute;
		right: 10px;
		top: 70%;
		transform: translateY(-50%);
		cursor: pointer;
		background: none;
		border: none;
	}	
	body {
    background-image: url("../img/tecno_recicla.png"); /* Reemplaza con la URL de tu imagen */
	background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
	}
	</style>



<div class="contenedor_form_update">
    <form id="updateForm" action="../php/update_user.php?id=<?= $row['id']?>" method="POST">
            <div class="input-group">
                <div class="form-group"> <!-- Contenedor unificado -->
                    <!-- Select para V/E -->
                    <label for="0">Nac</label>
                    <select id="0" class="form-select" name="nacionalidad" required>
                        <option value="<?=$row['nacionalidad']?>"><?=$row['nacionalidad']?></option>
                        <option value="V">V</option>
                        <option value="E">E</option>
                        <!--<option value="E">E</option>-->
                    </select>
                </div>
                <div class="form-group" style="text-align: center;" >    
                    <!-- Input para número de cédula -->
                    <label for="1">Cedula</label>
                    <input type="text" id="1" class="form-control" name="cedula" value="<?= $row['cedula']?>" required>
                </div>
            </div>   

    

        <!-- Cambia SOLO este campo -->
        <div class="form-group">
            <label for="2">Fecha de nacimiento</label>
            <input type="date" id="2" class="form-control" name="fecha_nac" id="fecha_nac" value="<?= $row['fecha_nac']?>" required>
        </div>

        <!-- Mantén TODO el resto de tu código exactamente igual -->
        

        <div class="form-group">
        <label for="3">Nombre</label>
            <input type="text" id="3" class="form-control" name="nombre" value="<?= $row['nombre']?>" required autocomplete="off">
        </div>
        
        <div class="form-group">
            <label for="4">Apellido</label>
            <input type="text" id="4" class="form-control" name="apellido" value="<?= $row['apellido']?>" required autocomplete="off">
        </div>


            <div class="form-group">
                <label for="5">Gerencia</label>
                <select class="form-select" name="id_gerencia" id="5" required>
                    <option value="<?=$row['id_gerencia']?>"><?=$row['id_gerencia']?></option>
                    <option value="1">Gestion Interna</option>
                    <option value="2">Consultoria Juridica</option>
                    <option value="3">Operaciones</option>
                    <option value="4">Gestion Comercial</option>
                </select>
            </div>


        <div class="form-group">
            <label for="6">Division</label>
            <select class="form-select" name="id_division" id="6" required>
                <option value="<?=$row['id_division']?>"><?=$row['id_division']?></option>
                <option value="1">Administracion y Finanzas</option>
                <option value="2">Gestion Humana</option>
                <option value="3">Seguridad Integral</option>
                <option value="4">Planificacion y Presupuesto</option>
                <option value="5">Tecnologias de la Informacion y Comunicacion</option>
                <option value="6">Gestion Comunicacional</option>
                <option value="7">Servicios</option>
                <option value="8">Recoleccion</option>
                <option value="9">Comercializacion</option>
                <option value="10">Economia Circulante</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="7">Rol</label>    
            <select class="form-select" name="id_rol" id="7" required>
                <option value="<?=$row['id_rol']?>"><?=$row['id_rol']?></option>
                <option value="1">Administrador</option>
                <option value="2">Gerente</option>
                <option value="3">Empleado</option>
            </select>
        </div>
        
        <div class="mb- password-container">
            <label>Cambiar clave del personal (Opcional)</label>
            <input type="password" class="form-control" name="clave" id="" placeholder="Inserte una clave" autocomplete="off">
            <button type="button" class="toggle-password" onclick="togglePassword()">
                <i class="bi bi-eye-slash"></i>
            </button>
        </div>

        <div class="mb- password-container">
            <label for="8">Clave de administrador</label>
            <input type="password" class="form-control" name="clave_admin" id="8" placeholder="Inserte la clave" required autocomplete="off">
            <button type="button" class="toggle-password" onclick="togglePassword()">
                <i class="bi bi-eye-slash"></i>
            </button>
        </div>


        <div class="mb- password-container">
            <label for="9">Verificar clave de administrador</label>
            <input type="password" class="form-control" name="clave_admin_ver" placeholder="Inserte de nuevo la clave" id="9" autocomplete="off">
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


                document.getElementById('updateForm').addEventListener('submit', function(e) {
                        
            //Obtener los valores de los campos (como siempre lo haces)
            const nac = document.getElementById('0').value;
            const cedula = document.getElementById('1').value;
            const fecha = document.getElementById('2').value;
            const nombre = document.getElementById('3').value;
            const apellido = document.getElementById('4').value;
            const gerencia = document.getElementById('5').value;
            const division = document.getElementById('6').value;
            const rol = document.getElementById('7').value;
            const clave = document.getElementById('8').value;
            const clave_ver = document.getElementById('9').value;

            const alertContainer = document.getElementById('alertContainer');

            // Inicializar variable si esta todo bien
            let todoBien = true;
                        
            //Validar campos vacíos
            if (nac === '' || cedula === '' || fecha === '' || nombre === '' || 
                apellido === '' || gerencia === '' || division === '' || rol === '' || clave === '') {
                todoBien = false;
                mostrarAlerta('Hay campos vacios');
            }
            
            // 7. Validar contraseña
            if (clave.length < 8) {
                todoBien = false;
                mostrarAlerta('La contraseña debe tener 8 caracteres o mas');

            }
            if (nac !== "V" && nac !== "E") {
            todoBien = false;
            mostrarAlerta('Elija una nacionalidad valida');

            }
            if (gerencia !== "1" && gerencia !== "2" && gerencia !== "3" && gerencia !== "4" && gerencia !== "Gestion Interna" && gerencia !== "Consultoria Juridica" && gerencia !== "Operaciones" && gerencia !== "Gestion Comercial") {
            todoBien = false;
            mostrarAlerta('Elija una gerencia valida');

            }
            if (division !== "1" && division !== "2" && division !== "3" && division !== "4" && division !== "5" && division !== "6" && division !== "7" && division !== "8" && division !== "9" && division !== "10" && division !== "Administracion y Finanzas" && division !== "Gestion Humana" && division !== "Seguridad Integral" && division !== "Planificacion y Presupuesto" && division !== "Tecnologias de la Informacion y Comunicacion" && division !== "Gestion Comunicacional" && division !== "Servicios" && division !== "Recoleccion" && division !== "Comercializacion" && division !== "Economia Circulante") {
                todoBien = false;
                mostrarAlerta('Elija una division valida');

            }
            if (rol !== "1" && rol !== "2" && rol !== "3" && rol !== "Administrador" && rol !== "Gerente" && rol !== "Empleado") {
                todoBien = false;
                mostrarAlerta('Elija un rol valido');

            }
            if (clave_ver !== clave) {
                todoBien = false;
                mostrarAlerta('La contraseña no coincide con la verificacion');

            }

            // 8. Solo enviar si todo está bien
            if (!todoBien) {
                e.preventDefault();
            }
        });
        </script>




        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('8');
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

        
        <button type="submit" class="btn btn-secondary" name="btn_actualizar">Actualizar</button>

    </form>

</div>
<div id="alertContainer" style="position: fixed; top: 10%; right: 20px; z-index: 1000; width: 300px;"></div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

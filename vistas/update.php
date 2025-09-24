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
            $row['id_rol'] = 'Usuario';
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
		top: 55%;
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
    <form action="../php/update_user.php?id=<?= $row['id']?>" method="POST">

        <div class="mb-3">
            <div class="input-group"> <!-- Contenedor unificado -->
                <!-- Select para V/E -->
                <select class="form-select" name="nacionalidad" style="max-width: 80px;" required>
                    <option value="Nac" disabled selected>Nac</option>
                    <option value="V">V</option>
                    <option value="E">E</option>

                    <!--<option value="E">E</option>-->
                </select>
                
                <!-- Input para número de cédula -->
                <input type="text" class="form-control" name="cedula" value="<?= $row['cedula']?>" required>
            </div>
        </div>   

    

        <!-- Cambia SOLO este campo -->
        <div class="mb-3">
            <label class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" value="<?= $row['fecha_nac']?>" required>
        </div>

        <!-- Mantén TODO el resto de tu código exactamente igual -->
        

        <div class="mb-3">
            <input type="text" class="form-control" name="nombre" value="<?= $row['nombre']?>" required autocomplete="off">
        </div>
        
        <div class="mb-3">
            <input type="text" class="form-control" name="apellido" value="<?= $row['apellido']?>" required autocomplete="off">
        </div>


            <div class="mb-3">
                <select class="form-select" name="id_gerencia" id="gerencias" style="max-width: 500px;" required>
                    <option value="0" disabled selected>Gerencia</option>
                    <option value="1">Gestion Interna</option>
                    <option value="2">Consultoria Juridica</option>
                    <option value="3">Operaciones</option>
                    <option value="4">Gestion Comercial</option>
                </select>
            </div>


        <div class="mb-3">
            <select class="form-select" name="id_division" id="divisiones" style="max-width: 500px;" required>
                <option value="0" disabled selected>Division</option>
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

        <!--<div class="mb-3">
            <input list="lista-gerencias" class="form-control" id="gerencias" name="id_gerencia" placeholder="Seleccione la gerencia" required autocomplete="off">
            <datalist id="lista-gerencias">
                <option value="Gestion Interna">
                <option value="Consultoria Juridica">
                <option value="Operaciones">
                <option value="Gestion Comercial">
            </datalist>-->

            <script>
                const input = document.getElementById("gerencias");
                const gerencias = ["1","2","3","4"];

                input.addEventListener("change", function() {
                    if (!gerencias.includes(input.value)) {
                        alert("Elige una gerencia valida");
                        input.value = "";
                    }
                });
            </script>

        <!--</div>

        <div class="mb-3">
            <input list="lista-divisiones" class="form-control" id="divisiones" name="id_division" placeholder="Seleccione la division" required autocomplete="off">
            <datalist id="lista-divisiones">
                <option value="Administracion y Finanzas">
                <option value="Gestion Humana">
                <option value="Seguridad Integral">
                <option value="Planificacion y Presupuesto">
                <option value="Tecnologias de la Informacion y Comunicacion">
                <option value="Gestion Comunicacional">
                <option value="Servicios">
                <option value="Recoleccion">
                <option value="Comercializacion">
                <option value="Economia Circulante">
            </datalist>-->

            <script>
                const input = document.getElementById("divisiones");
                const divisiones = ["Administracion y Finanzas","Gestion Humana","Seguridad Integral","Planificacion y Presupuesto","Tecnologias de la Informacion y Comunicacion","Gestion Comunicacional","Servicios","Recoleccion","Comercializacion","Economia Circulante"];

                input.addEventListener("change", function() {
                    if (!divisiones.includes(input.value)) {
                        alert("Elige una division valida");
                        input.value = "";
                    }
                });
            </script>
        <!--</div>-->
        
        <div class="mb-3">    
            <select class="form-select" name="id_rol" style="max-width: 500px;" required>
                <option value="0" disabled selected>Rol</option>
                <option value="1">Administrador</option>
                <option value="2">Gerente</option>
                <option value="3">Usuario</option>
            </select>
        </div>

        <div class="mb- password-container">
            <input type="password" class="form-control" name="clave" value ="<?= $row['clave']?>" placeholder="Inserte una contraseña" id="password" required autocomplete="off">
            <button type="button" class="toggle-password" onclick="togglePassword()">
                <i class="bi bi-eye-slash"></i>
            </button>
        </div>

        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
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


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

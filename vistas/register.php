<div class="contenedor_form_registro" id="form_registro" style="display:none;">
 
    <form id="registroForm" action="../php/register_user.php" method="POST">

                <div class="input-group mb-3"> <!-- Contenedor unificado -->
                    <!-- Select para V/E -->
                    
                        <span class="input-group-text"><label for="0">Nacionalidad</label></span>
                        <span class="input-group-text"><i class="bi bi-flag"></i></span>
                        <select class="form-control" id="0" name="nacionalidad">
                            <option value="" disabled selected>Seleccione la nacionalidad del personal</option>
                            <option value="V">V</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">    
                        <!-- Input para número de cédula -->
                        <span class="input-group-text"><label for="1">Cedula de identidad</label></span>
                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                        <input id="1" type="text" 
                        style="width: auto;" 
                            class="form-control" 
                            placeholder="Escriba la cedula del personal" 
                            name="cedula" 
                            pattern="[0-9]{7,8}" 
                            title="Solo números (7 u 8 dígitos)"
                            autocomplete="off">
                    </div>
                  

        

            <!-- Cambia SOLO este campo -->
            <div class="input-group mb-3">

                <span class="input-group-text"><label for="2">Fecha de nacimiento</label></span>
                <input id="2" type="date" class="form-control" name="fecha_nac" id="2" autocomplete="off">
            </div>

            <!-- Mantén TODO el resto de tu código exactamente igual -->
            

            <div class="input-group mb-3">

                <span class="input-group-text"><label for="3">Nombre</label></span>
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" id="3" name="nombre" placeholder="Escriba el nombre del personal" autocomplete="off">
            </div>
            
            <div class="input-group mb-3">

                <span class="input-group-text"><label for="4">Apellido</label></span>
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" id="4" name="apellido" placeholder="Escriba el apellido del personal" autocomplete="off">
            </div>
            
            <div class="input-group mb-3">

                <span class="input-group-text"><label for="5">Gerencia</label></span>
                <span class="input-group-text"><i class="bi bi-people"></i></span>
                <select class="form-control" name="id_gerencia" id="5" style="max-width: 500px;">
                    <option value="" disabled selected>Seleccione la gerencia asignada al personal</option>
                    <option value="1">Gestion Interna</option>
                    <option value="2">Consultoria Juridica</option>
                    <option value="3">Operaciones</option>
                    <option value="4">Gestion Comercial</option>
                </select>
            </div>

            <div class="input-group mb-3">

                <span class="input-group-text"><label for="6">Division</label></span>
                <span class="input-group-text"><i class="bi bi-people"></i></span>
                <select class="form-control" name="id_division" id="6" style="max-width: 500px;">
                    <option value="" disabled selected>Seleccione la division asignada al personal</option>
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

            <div class="input-group mb-3">

                <span class="input-group-text"><label for="7"></label>Rol</span>
                <span class="input-group-text"><i class="bi bi-person-check-fill"></i></span>
                <select class="form-select" id="7" name="id_rol" style="max-width: 500px;">
                    <option value="" disabled selected>Seleccione el rol asignado al personal dentro del sistema</option>
                    <option value="1">Administrador</option>
                    <option value="2">Gerente</option>
                    <option value="3">Empleado</option>
                </select>
            </div>

            <div class="input-group mb-3">

                <span class="input-group-text"><label for="8">Contraseña</label></span>
                <span class="input-group-text"><i class="bi bi-key"></i></span>
                <input type="password" class="form-control" name="clave" placeholder="Inserte una contraseña" id="8" autocomplete="off">
                <span><button type="button" class="toggle-password" onclick="togglePassword()"><i class="bi bi-eye-slash"></i></button></span>
            </div>

            <div class="input-group mb-3 password-container">
                <span class="input-group-text"><label for="9">Verificar contraseña</label></span>
                <input type="password" class="form-control" name="clave_ver" placeholder="Inserte de nuevo la contraseña" id="9" autocomplete="off">
                
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
            document.getElementById('registroForm').addEventListener('submit', function(e) {
                            
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
                if (gerencia !== "1" && gerencia !== "2" && gerencia !== "3" && gerencia !== "4") {
                todoBien = false;
                mostrarAlerta('Elija una gerencia valida');

                }
                if (division !== "1" && division !== "2" && division !== "3" && division !== "4" && division !== "5" && division !== "6" && division !== "7" && division !== "8" && division !== "9" && division !== "10") {
                    todoBien = false;
                    mostrarAlerta('Elija una division valida');

                }
                if (rol !== "1" && rol !== "2" && rol !== "3") {
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

            
            <button type="submit" class="btn btn-success" name="btn_registrar">Registrarme</button>
    </form>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

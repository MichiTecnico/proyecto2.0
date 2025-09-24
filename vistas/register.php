
 


<div class="contenedor_form_registro" id="form_registro" style="display: none">
    <form id="registroForm" action="../php/register_user.php" method="POST">

        <div class="mb-3">
            <div class="input-group"> <!-- Contenedor unificado -->
                <!-- Select para V/E -->
                <select class="form-select" id="0" name="nacionalidad" style="max-width: 80px;">
                    <option value="" disabled selected>Nac.</option>
                    <option value="V">V</option>
                    <option value="E">E</option>
                </select>
                
                <!-- Input para número de cédula -->
                <input id="1" type="text" 
                    class="form-control" 
                    name="cedula" 
                    placeholder="Ej: 12345678" 
                    pattern="[0-9]{7,8}" 
                    title="Solo números (7 u 8 dígitos)"
                    autocomplete="off" 
                >
            </div>
        </div>   

    

        <!-- Cambia SOLO este campo -->
        <div class="mb-3">
            <label class="form-label">Fecha de nacimiento</label>
            <input id="2" type="date" class="form-control" name="fecha_nac" id="2" autocomplete="off">
        </div>

        <!-- Mantén TODO el resto de tu código exactamente igual -->
        

        <div class="mb-3">
            <input type="text" class="form-control" id="3" name="nombre" placeholder="Nombre" autocomplete="off">
        </div>
        
        <div class="mb-3">
            <input type="text" class="form-control" id="4" name="apellido" placeholder="Apellido" autocomplete="off">
        </div>
        
        <div class="mb-3">
            <select class="form-select" name="id_gerencia" id="5" style="max-width: 500px;">
                <option value="" disabled selected>Gerencia</option>
                <option value="1">Gestion Interna</option>
                <option value="2">Consultoria Juridica</option>
                <option value="3">Operaciones</option>
                <option value="4">Gestion Comercial</option>
            </select>
        </div>

        <div class="mb-3">
            <select class="form-select" name="id_division" id="6" style="max-width: 500px;">
                <option value="" disabled selected>Division</option>
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

            <script>
                const input = document.getElementById("5");
                const gerencias = ["1","2","3","4"];

                input.addEventListener("change", function() {
                    if (!gerencias.includes(input.value)) {
                        alert("Elige una gerencia valida");
                        input.value = "";
                    }
                });
            </script>

            <script>
                const input = document.getElementById("6");
                const divisiones = ["1","2","3","4","5","6","7","8","9","10"];

                input.addEventListener("change", function() {
                    if (!divisiones.includes(input.value)) {
                        alert("Elige una division valida");
                        input.value = "";
                    }
                });
            </script>

        <div class="mb-3">    
            <select class="form-select" id="7" name="id_rol" style="max-width: 500px;">
                <option value="" disabled selected>Rol</option>
                <option value="1">Administrador</option>
                <option value="2">Gerente</option>
                <option value="3">Usuario</option>
            </select>
        </div>

        <div class="mb- password-container">
            <input type="password" class="form-control" name="clave" placeholder="Inserte una contraseña" id="8" autocomplete="off">
            <button type="button" class="toggle-password" onclick="togglePassword()">
                <i class="bi bi-eye-slash"></i>
            </button>

            <!--VALIDACION: MINIMO DE CARACTERES DE CLAVE (FRONTED)-->    
            <div id="passwordAlert" class="alert alert-danger alert-dismissible fade show" style="display: none;">
                <strong>Error:</strong> La clave debe tener 8 caracteres o mas
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>

        <div class="mb- password-container">
            <input type="password" class="form-control" name="clave_ver" placeholder="Inserte de nuevo la contraseña" id="9" autocomplete="off">
        </div>

        <!--VALIDACION DE CAMPOS VACIOS-->
        <div id="emptyAlert" class="alert alert-danger alert-dismissible fade show" style="display: none;">
            <strong>Error:</strong> Hay campos vacios
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>


        <script>
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
            
            //Borrar alertas viejas si existen
            if (document.getElementById('emptyAlert')) {
                document.getElementById('emptyAlert').remove();
            }
            if (document.getElementById('passwordAlert')) {
                document.getElementById('passwordAlert').remove();
            }
            if (document.getElementById('validNationality')) {
                document.getElementById('validNationality').remove();
            }
            if (document.getElementById('validManagement')) {
                document.getElementById('validManagement').remove();
            }
            if (document.getElementById('validDivision')) {
                document.getElementById('validDivision').remove();
            }
            if (document.getElementById('validRol')) {
                document.getElementById('validRol').remove();
            }

            //Inicializar variable para controlar envío
            let todoBien = true;
            
            //Validar campos vacíos
            if (nac === '' || cedula === '' || fecha === '' || nombre === '' || 
                apellido === '' || gerencia === '' || division === '' || rol === '' || clave === '') {
                todoBien = false;
                
                //Crear alerta de campos vacíos
                const alertaVacia = document.createElement('div');
                alertaVacia.id = 'emptyAlert';
                alertaVacia.className = 'alert alert-danger';
                alertaVacia.innerHTML = '<strong>Error:</strong> Hay campos vacíos <button onclick="this.parentElement.remove()">X</button>';
                document.getElementById('registroForm').appendChild(alertaVacia);
            }
            
            // 7. Validar contraseña
            if (clave.length < 8) {
                todoBien = false;
                
                // Crear alerta de contraseña
                const alertaClave = document.createElement('div');
                alertaClave.id = 'passwordAlert';
                alertaClave.className = 'alert alert-danger';
                alertaClave.innerHTML = '<strong>Error:</strong> La clave debe tener 8 caracteres o más <button onclick="this.parentElement.remove()">X</button>';
                document.getElementById('registroForm').appendChild(alertaClave);
            }
            if (fecha !== "V" || fecha !== "E") {
            todoBien = false;
            
            // Crear alerta de nacionalidad
            const alertaFecha = document.createElement('div');
            alertaFecha.id = 'validNationality';
            alertaFecha.className = 'alert alert-danger';
            alertaFecha.innerHTML = '<strong>Error:</strong> Elija una nacionalidad valida <button onclick="this.parentElement.remove()">X</button>';
            document.getElementById('registroForm').appendChild(alertaFecha);
            }
            if (gerencia !== "1" || gerencia !== "2" || gerencia !== "3" || gerencia !== "4") {
            todoBien = false;
            
            // Crear alerta de gerencia
            const alertaGerencia = document.createElement('div');
            alertaGerencia.id = 'validManagement';
            alertaGerencia.className = 'alert alert-danger';
            alertaGerencia.innerHTML = '<strong>Error:</strong> Elija una gerencia valida <button onclick="this.parentElement.remove()">X</button>';
            document.getElementById('registroForm').appendChild(alertaGerencia);
        }
            if (division !== "1" || division !== "2" || division !== "3" || division !== "4" || division !== "5" || division !== "6" || division !== "7" || division !== "8" || division !== "9" || division !== "10") {
                todoBien = false;
            
                // Crear alerta de division
                const alertaDivision = document.createElement('div');
                alertaDivision.id = 'validDivision';
                alertaDivision.className = 'alert alert-danger';
                alertaDivision.innerHTML = '<strong>Error:</strong> Elija una division valida <button onclick="this.parentElement.remove()">X</button>';
                document.getElementById('registroForm').appendChild(alertaDivision);
            }

            if (rol !== "1" || rol !== "2" || rol !== "3") {
                todoBien = false;

                // Crear alerta de rol
                const alertaRol = document.createElement('div');
                alertaRol.id = 'validRol';
                alertaRol.className = 'alert alert-danger';
                alertaRol.innerHTML = '<strong>Error:</strong> Elija un rol valido <button onclick="this.parentElement.remove()">X</button>';
                document.getElementById('registroForm').appendChild(alertaRol);
            }
            // 8. Solo enviar si todo está bien
            if (!todoBien) {
                e.preventDefault();
            }
        });
        </script>

        <script>
            document.getElementById('registroForm').addEventListener('submit', function(e){
                const clave = document.getElementById('8').value;
                const clave_ver = document.getElementById('9').value;
                let todoBien = true;
                //Borrar alerta anterior
                if (document.getElementById('alertaCoincidencia')) {
                    document.getElementById('alertaCoincidencia').remove();
                }

                //Validar 
                if (clave !== clave_ver) {
                    todoBien = false;

                    const alerta = document.createElement('div');
                    alerta.id = 'alertaCoincidencia';
                    alerta.className = 'alert alert-danger';
                    alerta.innerHTML = '<strong>Error:</strong> La contraseña no coincide <button onclick="this.parentElement.remove()">X</button>';
                    document.getElementById('registroForm').appendChild(alerta);
                }
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

    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

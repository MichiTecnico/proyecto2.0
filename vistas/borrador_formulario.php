<div class="contenedor_form_recibo" id="form_recibo" style="display: none;">
        <form class="form_recibo" action="../php/guardar_recibo.php" method="POST">
          <h2>Datos de Envio</h2>

            <label>Fecha:
              <input type="date" name="fecha" required autocomplete="off">
            </label>
            <label>N° de Recibo:
              <input type="text" name="numero" required autocomplete="off">
            </label>
            <label>Tipo de Documento:
              <select name="tipo">
                <option value="pre">Pre-Recibo</option>
                <option value="final">Recibo Final</option>
              </select>
            </label>
            <label>Comercio o Institución:
              <input type="text" name="comercio" required autocomplete="off">
              </label>
          <h2>Datos de Recibo</h2>
                  
            <label>Responsable:
              <input type="text" name="responsable" required autocomplete="off">
            </label>
            <label>Cargo:
              <input type="text" name="cargo" required autocomplete="off">
            </label>
            <label>Dirección:
              <textarea name="direccion" rows="2" autocomplete="off"></textarea>
            </label>

            <button type="button" id="abrirForm2">Siguiente</button>

        </form>
      </div>

      <div class="contenedor_form_recibo" id="form_recibo2" style="display:none;">  
      <form class="form_recibo">  
        <h3>Detalles del material retirado</h3>
        <table id="tablaMateriales">
          <thead>
            <tr>
              <th>Tipo de material</th>
              <th>Cantidad (Kg)</th>
              <th>Puntos</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Aluminio</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>

            <tr>
              <td>Archivo</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>

            <tr>
              <td>Carton</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>

            <tr>
              <td>Hierro</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>

            <tr>
              <td>Pelicula limpia</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>


            <tr>  
              <td>Pelicula sucia</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>


            <tr>
              <td>Plastico mixto</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>



            <tr>
              <td>Plastico Pet</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>



            <tr>
              <td>Plastico tobo y cesta</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>



            <tr>
              <td>Soplado blanco</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>



            <tr>
              <td>Soplado color</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>

            <tr>
              <td>Vidrio</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>

            <tr>
              <td>Laton</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>

            <tr>
              <td>Calamina</td>
              <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
              <td><input type="number" name="puntos[]" id="puntos1" autocomplete="off"></td>
            </tr>


          </tbody>
        </table>
        <br>
        <button type="button" id="abrirForm">Anterior</button>
        <button onclick="calcularSuma()" type="button"></button>
        <button type="submit">Guardar Recibo</button>

        <script>
          function calcularSuma() {
          const formulario = document.getElementById('form_recibo2');
          const campos = formulario.querySelectorAll('input[type="number"]:checked');
          let suma = 0;

          campos.forEach(campo => {
            const valorCampo = parseInt(campo.value);
            if (valorCampo === 10) {
              suma += 1;
            } else if (valorCampo === 20) {
              suma += 2;
            }
          });

          document.getElementById('puntos1').textContent = suma;
        }
        </script>
      </form> 
  </div>



<script>
    document.getElementById('abrirForm2').addEventListener('click', function(form2){
        form2.preventDefault();
        document.getElementById('form_recibo2').style.display = 'block';
        // Opcionalmente, puedes ocultar el formulario principal
        document.getElementById('form_recibo').style.display = 'none';
      
    });

    document.getElementById('abrirForm').addEventListener('click', function(form) {
        // Evita que el formulario se envíe y recargue la página
        form.preventDefault(); 
        // Muestra el segundo formulario
        document.getElementById('form_recibo2').style.display = 'none';
        // Opcionalmente, puedes ocultar el formulario principal
        document.getElementById('form_recibo').style.display = 'block';
    });

</script>
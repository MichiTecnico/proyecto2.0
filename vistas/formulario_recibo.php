<div class="contenedor_form_recibo" id="form_recibo" style="display: none;">
  <form id="formRecibo" action="../recibo_pdf.php" method="post">
    <h2>Datos de Envio</h2>

    <!-- Eliminados los campos de fecha y número de recibo como solicitado; se generan automáticamente -->
<div class="input-group mb-3">
      <span class="input-group-text"><label for="tipoDocumento">Tipo de documento</label></span>
      <span class="input-group-text"><i class="bi bi-receipt"></i></span>
      <select name="tipo" id="tipoDocumento" required>
        <option value="" disabled selected>Escoja el tipo de documento</option>
        <option value="pre">Pre-Recibo</option>
        <option value="final">Recibo Final</option>
      </select>
    
</div>
<div class="input-group mb-3">    
      <span class="input-group-text"><label for="comercio">Comercio o Institucion</label></span>
      <span class="input-group-text"><i class="bi bi-building-add"></i></span>
      <input type="text" name="comercio" id="comercio" placeholder="Escriba el nombre del comercio o Institucion" required autocomplete="off">
</div>
    <h2>Datos de Recibo</h2>
            
<div class="input-group mb-3">
    <span class="input-group-text"><label for="responsable">Responsable</label></span>
    <span class="input-group-text"><i class="bi bi-person"></i></span>
    <input type="text" name="responsable" id="responsable" placeholder="Escriba el nombre del responsable" required autocomplete="off">
</div>
    
<div class="input-group mb-3">
    <span class="input-group-text"><label for="cargo">Cargo del Responsable</label></span>
    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
    <input type="text" name="cargo" id="cargo" placeholder="Escriba el cargo del responsable" required autocomplete="off">
</div>

<div class="input-group mb-3">
    <span class="input-group-text"><label for="direccion">Direccion</label></span>
    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>  
    <textarea name="direccion" id="direccion" rows="2" placeholder="Escriba la direccion exacta" autocomplete="off"></textarea>
    </label>
</div>
    <button type="button" id="abrirForm2">Siguiente</button>

    <!-- Aquí se incluye el segundo formulario como parte del mismo <form> principal para que todos los datos se envíen juntos al submit -->
    <div id="form_recibo2" style="display:none;">  
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
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Archivo</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Carton</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Calamina</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Hierro</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Laton</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Pelicula limpia</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>  
            <td>Pelicula sucia</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Plastico mixto</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Plastico Pet</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Plastico tobo y cesta</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Soplado blanco</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Soplado color</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Vidrio</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="puntos[]" step="0.01" autocomplete="off"></td>
          </tr>

        </tbody>
      </table>

      <!-- Campos para totales de material y puntos (acumulables) -->
      <br>
      <label>Total de Material (Kg): 
        <input type="number" name="total_cantidad" id="total_cantidad" step="0.01" readonly value="0">
      </label>
      <label>Total de Puntos: 
        <input type="number" name="total_puntos" id="total_puntos" step="1" min="0" readonly value="0">
      </label>
      <br>

      <button type="button" id="abrirForm">Anterior</button>
      <button type="submit">Guardar Recibo</button>
    </div>

  </form>
</div>

<script>
// FUNCIÓN PARA CALCULAR Y ACTUALIZAR TOTALES
function updateTotals() {
  console.log("--- INICIANDO CÁLCULO POR FILAS ---");
  
  var filas = document.querySelectorAll('#tablaMateriales tbody tr');
  var totalKg = 0;
  var totalPuntos = 0;
  
  filas.forEach(function(fila, index) {
    var inputKilos = fila.querySelector('input[name="cantidad[]"]');
    var inputPuntos = fila.querySelector('input[name="puntos[]"]');
    
    var kilos = parseFloat(inputKilos.value) || 0;
    
    // CALCULAR PUNTOS: kilos ÷ 10
    var puntosEstaFila = kilos / 10;
    
    // LLENAR AUTOMÁTICAMENTE EL INPUT DE PUNTOS
    inputPuntos.value = puntosEstaFila.toFixed(2);
    
    totalKg += kilos;
    totalPuntos += puntosEstaFila;
    
    console.log("Fila " + (index + 1) + ": " + kilos + " kg ÷ 10 = " + puntosEstaFila.toFixed(2) + " puntos");
  });
  
  document.getElementById('total_cantidad').value = totalKg.toFixed(2);
  document.getElementById('total_puntos').value = totalPuntos.toFixed(2);
  
  console.log("TOTAL KG: " + totalKg.toFixed(2));
  console.log("TOTAL PUNTOS: " + totalPuntos.toFixed(2));
}

// CONFIGURACIÓN CUANDO LA PÁGINA CARGA
document.addEventListener('DOMContentLoaded', function() {
  // 🎯 ESTA ES LA PARTE QUE HACE APARECER LA TABLA
  document.getElementById('abrirForm2').addEventListener('click', function(e){
    e.preventDefault();
    document.getElementById('form_recibo2').style.display = 'block';
    console.log("Tabla de materiales mostrada");
  });

  // 🎯 ESTA ES LA PARTE QUE OCULTA LA TABLA
  document.getElementById('abrirForm').addEventListener('click', function(e) {
    e.preventDefault(); 
    document.getElementById('form_recibo2').style.display = 'none';
    console.log("Tabla de materiales ocultada");
  });

  // VIGILAR TODOS LOS INPUTS DE LA TABLA
  var todosLosInputs = document.querySelectorAll('#tablaMateriales input');
  todosLosInputs.forEach(function(input) {
    input.addEventListener('input', updateTotals);
  });
  
  // INICIAR CÁLCULOS AL CARGAR
  updateTotals();
});
</script>
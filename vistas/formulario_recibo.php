<div class="contenedor_form_recibo" id="form_recibo" style="display: none;">
  <form id="formRecibo" action="../recibo_pdf.php" method="post">
    <h2>Datos de Envio</h2>

    <!-- Eliminados los campos de fecha y número de recibo como solicitado; se generan automáticamente -->
<div class="input-group mb-3">
      <span class="input-group-text"><label for="fecha">Fecha</label></span>
      <input type="date" name="fecha" id="fecha"  >
</div>
<div class="input-group mb-3">
      <span class="input-group-text"><label for="fecha">Nº de recibo</label></span>
      <input type="int" name="correlativo" id="correlativo" placeholder="Escriba el nº de recibo">
</div>
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
            <td><input type="number" name="aluminio_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="aluminio_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Archivo</td>
            <td><input type="number" name="archivo_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="archivo_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Carton</td>
            <td><input type="number" name="carton_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="carton_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Calamina</td>
            <td><input type="number" name="calamina_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="calamina_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Hierro</td>
            <td><input type="number" name="hierro_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="hierro_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Laton</td>
            <td><input type="number" name="laton_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="laton_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Pelicula limpia</td>
            <td><input type="number" name="pelicula_limpia_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="pelicula_limpia_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>  
            <td>Pelicula sucia</td>
            <td><input type="number" name="pelicula_sucia_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="pelicula_sucia_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Plastico mixto</td>
            <td><input type="number" name="plastico_mixto_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="plastico_mixto_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Plastico Pet</td>
            <td><input type="number" name="plastico_pet_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="plastico_pet_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Plastico tobo y cesta</td>
            <td><input type="number" name="plastico_tobo_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="plastico_tobo_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Soplado blanco</td>
            <td><input type="number" name="soplado_blanco_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="soplado_blanco_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Soplado color</td>
            <td><input type="number" name="soplado_color_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="soplado_color_puntos" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Vidrio</td>
            <td><input type="number" name="vidrio_cantidad" step="0.01" autocomplete="off"></td>
            <td><input type="number" name="vidrio_puntos" step="0.01" autocomplete="off"></td>
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
// Función para calcular y actualizar totales SIN ACUMULAR PUNTOS
function updateTotals() {
  console.log("--- INICIANDO CÁLCULO ---");
  
  var materiales = [
    'aluminio', 'archivo', 'carton', 'hierro', 
    'pelicula_limpia', 'pelicula_sucia', 'plastico_mixto', 
    'plastico_pet', 'plastico_tobo', 'soplado_blanco', 
    'soplado_color', 'vidrio', 'laton', 'calamina'
  ];
  
  var totalKg = 0;
  var totalPuntosEsteRecibo = 0; // SOLO puntos de ESTE recibo
  
  materiales.forEach(function(material) {
    // Input de cantidad
    var inputCantidad = document.querySelector('input[name="' + material + '_cantidad"]');
    var cantidad = parseFloat(inputCantidad.value) || 0;
    
    // Input de puntos (individual)
    var inputPuntos = document.querySelector('input[name="' + material + '_puntos"]');
    
    // Calcular puntos individuales (cantidad / 10)
    var puntosIndividuales = cantidad / 10;
    inputPuntos.value = puntosIndividuales.toFixed(2);
    
    // Acumular totales
    totalKg += cantidad;
    totalPuntosEsteRecibo += puntosIndividuales;
    
    console.log(material + ": " + cantidad + " kg = " + puntosIndividuales.toFixed(2) + " puntos");
  });
  
  console.log("TOTAL KG: " + totalKg.toFixed(2));
  console.log("TOTAL PUNTOS ESTE RECIBO: " + totalPuntosEsteRecibo.toFixed(2));
  
  // MOSTRAR SOLO LOS PUNTOS DE ESTE RECIBO (NO ACUMULADOS)
  document.getElementById('total_cantidad').value = totalKg.toFixed(2);
  document.getElementById('total_puntos').value = totalPuntosEsteRecibo.toFixed(2);
}

// Configuración de event listeners cuando la página carga
document.addEventListener('DOMContentLoaded', function() {
  // Event listeners para navegación entre formularios
  document.getElementById('abrirForm2').addEventListener('click', function(e){
    e.preventDefault();
    document.getElementById('form_recibo2').style.display = 'block';
  });

  document.getElementById('abrirForm').addEventListener('click', function(e) {
    e.preventDefault(); 
    document.getElementById('form_recibo2').style.display = 'none';
  });

  // Event listeners para cálculo automático de totales
  var materiales = [
    'aluminio', 'archivo', 'carton', 'hierro', 
    'pelicula_limpia', 'pelicula_sucia', 'plastico_mixto', 
    'plastico_pet', 'plastico_tobo', 'soplado_blanco', 
    'soplado_color', 'vidrio', 'laton', 'calamina'
  ];
  
  materiales.forEach(function(material) {
    var input = document.querySelector('input[name="' + material + '_cantidad"]');
    if (input) {
      input.addEventListener('input', updateTotals);
    }
  });

  // Configurar el botón de guardar
  document.querySelector('button[type="submit"]').addEventListener('click', function(e) {
    e.preventDefault();
    
    // Calcular puntos del recibo actual para mostrar en alerta
    var materiales = [
      'aluminio', 'archivo', 'carton', 'hierro', 
      'pelicula_limpia', 'pelicula_sucia', 'plastico_mixto', 
      'plastico_pet', 'plastico_tobo', 'soplado_blanco', 
      'soplado_color', 'vidrio', 'laton', 'calamina'
    ];
    
    var totalPuntosEsteRecibo = 0;
    materiales.forEach(function(material) {
      var inputCantidad = document.querySelector('input[name="' + material + '_cantidad"]');
      var cantidad = parseFloat(inputCantidad.value) || 0;
      totalPuntosEsteRecibo += cantidad / 10;
    });
    
    alert("Recibo guardado! Puntos de este recibo: " + totalPuntosEsteRecibo.toFixed(2));
    
    // Enviar el formulario normal a PHP
    document.getElementById('formRecibo').submit();
  });
  
  // Inicializar totales al cargar
  updateTotals();
});
</script>
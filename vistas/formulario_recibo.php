<div class="contenedor_form_recibo" id="form_recibo" style="display: none;">
  <form id="formRecibo" onsubmit="generarPDF(event)">
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
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Aluminio</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Archivo</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Carton</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Hierro</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Pelicula limpia</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>  
            <td>Pelicula sucia</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Plastico mixto</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Plastico Pet</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Plastico tobo y cesta</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Soplado blanco</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Soplado color</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Vidrio</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Laton</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
          </tr>

          <tr>
            <td>Calamina</td>
            <td><input type="number" name="cantidad[]" step="0.01" autocomplete="off"></td>
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

<!-- Incluir jsPDF para generar PDFs en el navegador -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
  // Función para formatear fecha como DDMMYYYY
  function getFechaFormato() {
    const now = new Date();
    const dia = String(now.getDate()).padStart(2, '0');
    const mes = String(now.getMonth() + 1).padStart(2, '0');
    const año = now.getFullYear();
    return dia + mes + año;
  }

  // Función para obtener o inicializar contador diario usando localStorage
  function getNextNumeroRecibo() {
    const fechaHoy = getFechaFormato();
    const clave = 'contador_' + fechaHoy;
    let contador = parseInt(localStorage.getItem(clave) || '0', 10);
    contador += 1;
    localStorage.setItem(clave, contador.toString());
    return String(contador).padStart(3, '0'); // Padding a 3 dígitos, ej: 001
  }

  // Función para obtener letra basada en tipo de documento
  function getLetraTipo(tipo) {
    return tipo === 'pre' ? 'P' : 'R';
  }

  // Función principal para generar y descargar PDF
  function generarPDF(event) {
    event.preventDefault(); // Prevenir envío al PHP (puedes descomentarlo si quieres mantener el guardado en servidor)

    // Validar que todos los campos requeridos estén llenos
    const form = document.getElementById('formRecibo');
    const formData = new FormData(form);
    const tipo = document.getElementById('tipoDocumento').value;
    const comercio = document.getElementById('comercio').value.trim();
    const responsable = document.getElementById('responsable').value.trim();
    const cargo = document.getElementById('cargo').value.trim();
    const direccion = document.getElementById('direccion').value.trim();

    if (!comercio || !responsable || !cargo || tipo === '') {
      alert('Por favor, completa todos los campos requeridos.');
      return;
    }

    // Generar número de recibo y nombre de archivo
    const fecha = getFechaFormato();
    const numero = getNextNumeroRecibo();
    const letra = getLetraTipo(tipo);
    const nombreArchivo = fecha + numero + letra + '.pdf';

    // Obtener cantidades de materiales
    const materiales = [
      'Aluminio', 'Archivo', 'Carton', 'Hierro', 'Pelicula limpia', 'Pelicula sucia',
      'Plastico mixto', 'Plastico Pet', 'Plastico tobo y cesta', 'Soplado blanco',
      'Soplado color', 'Vidrio', 'Laton', 'Calamina'
    ];
    const cantidades = Array.from(formData.getAll('cantidad[]')).map(q => parseFloat(q) || 0);
    const totalKg = parseFloat(document.getElementById('total_cantidad').value) || 0;
    const totalPuntos = parseInt(document.getElementById('total_puntos').value) || 0;

    // Crear PDF con jsPDF
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Configuración de fuente y márgenes
    doc.setFontSize(16);
    doc.text('RECIBO DE MATERIALES', 105, 20, { align: 'center' });

    // Datos de Envío
    doc.setFontSize(12);
    doc.text('Datos de Envío', 20, 40);
    doc.setFontSize(10);
    doc.text(`Comercio o Institución: ${comercio}`, 20, 50);

    // Datos de Recibo
    doc.text('Datos de Recibo', 20, 70);
    doc.text(`Responsable: ${responsable}`, 20, 80);
    doc.text(`Cargo: ${cargo}`, 20, 90);
    doc.text(`Dirección: ${direccion || 'N/A'}`, 20, 100);

    // Detalles del material
    doc.setFontSize(12);
    doc.text('Detalles del material retirado', 20, 120);
    doc.setFontSize(10);

    // Crear tabla simple (texto alineado para simular tabla)
    let yPos = 130;
    materiales.forEach((material, index) => {
      if (yPos > 270) { // Nueva página si es necesario
        doc.addPage();
        yPos = 20;
      }
      doc.text(`${material}: ${cantidades[index].toFixed(2)} Kg`, 20, yPos);
      yPos += 10;
    });

    // Totales
    doc.setFontSize(12);
    doc.text('Totales', 20, yPos + 10);
    doc.setFontSize(10);
    doc.text(`Total de Material: ${totalKg.toFixed(2)} Kg`, 20, yPos + 20);
    doc.text(`Total de Puntos: ${totalPuntos}`, 20, yPos + 30);

    // Fecha de generación (sin mostrar número de recibo en el PDF, solo en nombre de archivo)
    const fechaCompleta = new Date().toLocaleDateString('es-ES');
    doc.text(`Generado el: ${fechaCompleta}`, 20, yPos + 50);

    // Descargar el PDF (se guarda en "Descargas" por defecto del navegador)
    doc.save(nombreArchivo);

    // Opcional: Si quieres mantener el envío al PHP para guardado en servidor, descomenta lo siguiente
    // form.action = '../php/guardar_recibo.php';
    // form.submit();

    alert(`Recibo guardado como: ${nombreArchivo}`);
  }

  document.getElementById('abrirForm2').addEventListener('click', function(e){
    e.preventDefault();
    document.getElementById('form_recibo2').style.display = 'block';
  });

  document.getElementById('abrirForm').addEventListener('click', function(e) {
    e.preventDefault(); 
    document.getElementById('form_recibo2').style.display = 'none';
  });

  // Función para actualizar totales (kg acumulables y puntos basados en total kg)
  function updateTotals() {
    var quantityInputs = document.querySelectorAll('input[name="cantidad[]"]');
    var totalKg = 0;
    
    quantityInputs.forEach(function(input) {
      var qty = parseFloat(input.value) || 0;
      totalKg += qty;
    });
    
    var totalPoints = Math.floor(totalKg / 10); // Puntos acumulables: floor(total_kg / 10)
    
    document.getElementById('total_cantidad').value = totalKg.toFixed(2); // Mostrar con 2 decimales
    document.getElementById('total_puntos').value = totalPoints;
  }

  // Event listeners para calcular totales automáticamente
  document.addEventListener('DOMContentLoaded', function() {
    var quantityInputs = document.querySelectorAll('input[name="cantidad[]"]');
    
    quantityInputs.forEach(function(input) {
      input.addEventListener('input', updateTotals);
      
      // Inicializar totales al cargar (si hay valores iniciales)
      updateTotals();
    });
  });
</script>
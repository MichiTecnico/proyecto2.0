<!DOCTYPE html>
<html>
<head>
  <title>Prueba formulario recibo pdf</title>
      <link rel="stylesheet" href="../css/estilos_vistas.css">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

</head>
<body>
<div class="contenedor_form_recibo" id="form_recibo">
  <form id="formRecibo" action="../recibo_pdf.php" method="post">
    <h2>Datos de Envio</h2>

<div class="input-group mb-3">    
      <span class="input-group-text"><label for="fecha">Fecha</label></span>
      <input type="date" name="fecha" id="fecha" required autocomplete="off">
</div >
<div class="input-group mb-3">
      <span class="input-group-text"><label for="comercio">Nº de recibo</label></span>
      <span class="input-group-text"><i class="bi bi-hash"></i></span>
      <input type="int" name="correlativo" id="correlativo" placeholder="Escriba el numero de recibo" required autocomplete="off">
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

    <!-- Aquí se incluye el segundo formulario como parte del mismo <form> principal para que todos los datos se envíen juntos al submit -->
    <div id="form_recibo2">  
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
</body>
</html>


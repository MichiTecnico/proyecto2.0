<div class="contenedor_form_recibo" id="form_recibo" style="display: none;">
  <!DOCTYPE html>
  <html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Formulario Recibo</title>
    <style>
      body { font-family: Arial, sans-serif; margin: 20px; }
      h2 { color: black; }
      label { display: block; margin-top: 10px; }
      input, select, textarea { width: 100%; padding: 6px; margin-top: 4px; }
      table { width: 100%; border-collapse: collapse; margin-top: 20px; }
      th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
      th { background: #f4f 4f4; }
      button { margin-top: 20px; padding: 10px 15px; background: #27ae60; color: #fff; border: none; cursor: pointer; }
      button:hover { background: #219150; }
    </style>
  </head>
  <body>
    <h2>Crear Recibo</h2>
    <form action="../php/guardar_recibo.php" method="POST">
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
      <label>Responsable:
        <input type="text" name="responsable" required autocomplete="off">
      </label>
      <label>Cargo:
        <input type="text" name="cargo" required autocomplete="off">
      </label>
      <label>Dirección:
        <textarea name="direccion" rows="2" autocomplete="off"></textarea>
      </label>

      <h3>Detalles del material retirado</h3>
      <table id="tablaMateriales">
        <thead>
          <tr>
            <th>Tipo de material</th>
            <th>Cantidad (Kg)</th>
            <th>Puntos</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><select name="material[]" required>
              <option value="" disabled selected>Material</option>
              <option value="Aluminio">Aluminio</option>
              <option value="Archivo">Archivo</option>
              <option value="Carton">Carton</option>
              <option value="Hierro">Hierro</option>
              <option value="Pelicula limpia">Pelicula limpia</option>
              <option value="Pelicula sucia">Pelicula sucia</option>
              <option value="Plastico mixto">Plastico mixto</option>
              <option value="Plastico PET">Plastico PET</option>
              <option value="Plastico tobo y cesta">Plastico tobo y cesta</option>
              <option value="Soplado blanco">Soplado blanco</option>
              <option value="Soplado color">Soplado color</option>
              <option value="Vidrio">Vidrio</option>
              <option value="Laton">Laton</option>
              <option value="Calamina">Calamina</option>
            </select></td>
            <td><input type="number" name="cantidad[]" step="0.01" required autocomplete="off"></td>
            <td><input type="number" name="puntos[]" required autocomplete="off"></td>
            <td><button type="button" onclick="eliminarFila(this)">❌</button></td>
          </tr>
        </tbody>
      </table>
      <button type="button" onclick="agregarFila()">➕ Agregar material</button>
      <br>
      <button type="submit">Guardar Recibo</button>
    </form>
</div>
    <script>
      function agregarFila() {
        const tabla = document.getElementById("tablaMateriales").getElementsByTagName("tbody")[0];
        const fila = tabla.insertRow();
        fila.innerHTML = `
          <td><select name="material[]" required>
              <option value="" disabled selected>Material</option>
              <option value="Aluminio">Aluminio</option>
              <option value="Archivo">Archivo</option>
              <option value="Carton">Carton</option>
              <option value="Hierro">Hierro</option>
              <option value="Pelicula limpia">Pelicula limpia</option>
              <option value="Pelicula sucia">Pelicula sucia</option>
              <option value="Plastico mixto">Plastico mixto</option>
              <option value="Plastico PET">Plastico PET</option>
              <option value="Plastico tobo y cesta">Plastico tobo y cesta</option>
              <option value="Soplado blanco">Soplado blanco</option>
              <option value="Soplado color">Soplado color</option>
              <option value="Vidrio">Vidrio</option>
              <option value="Laton">Laton</option>
              <option value="Calamina">Calamina</option>
            </select></td>
          <td><input type="number" name="cantidad[]" step="0.01" required autocomplete="off"></td>
          <td><input type="number" name="puntos[]" required autocomplete="off"></td>
          <td><button type="button" onclick="eliminarFila(this)">❌</button></td>
        `;
      }
      function eliminarFila(btn) {
        const fila = btn.closest("tr");
        fila.remove();
      }
    </script>
  </body>
  </html>
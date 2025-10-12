<div class="contenedor_form_comunidad" id="form_comunidad" style="display: none;">
    <form action="../recibo_pdf.php" method="POST" class="p-4 shadow rounded bg-white">
        <h5 class="mb-3 text-success" style="text-align: center;">Registrar Comercio o Institución</h5>
        
        <div class="input-group mb-3">
            <span class="input-group-text"><label for="0">Nombre del Comercio o Institucion</label></span>
            <span class="input-group-text"><i class="bi bi-building-add"></i></span>
            <input type="text" name="nombre" class="form-control" id="0" placeholder="Escriba el nombre" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><label for="1">Ubicacion</label></span>
            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
            <input type="text" name="ubicacion" class="form-control" id="1" placeholder="Escriba la ubicacion exacta" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><label for="2">Responsable</label></span>
            <span class="input-group-text"><i class="bi bi-person-up"></i></span>            
            <input type="text" name="nombre_responsable" class="form-control" id="2" placeholder="Escriba el nombre del responsable" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><label for="3">Cedula del Responsable</label></span>
            <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
            <input type="text" name="cedula_responsable" id="3" class="form-control" placeholder="Escriba la cedula del responsable" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><label for="4">Telefono del Responsable</label></span>
            <span class="input-group-text"><i class="bi bi-phone"></i></span>
            <input type="text" name="telefono_responsable" id="4" placeholder="Escriba el telefono del responsable" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><label for="5">Tipo</label></span>
            <span class="input-group-text"><i class="bi bi-question-circle"></i></span>
            <select name="tipo" id="5" class="form-select" required>
                <option value="" disabled selected>Seleccione el tipo de lugar</option>
                <option value="Comercio">Comercio</option>
                <option value="Institución">Institución</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>
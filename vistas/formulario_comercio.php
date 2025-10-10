<form action="../php/registrar_comercio.php" method="POST" class="p-4 shadow rounded bg-white">
    <h5 class="mb-3 text-success">Registrar Comercio o Institución</h5>
    
    <div class="mb-3">
        <label class="form-label">Nombre del Comercio o Institución</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Ubicación</label>
        <input type="text" name="ubicacion" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre del Responsable</label>
        <input type="text" name="nombre_responsable" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Cédula del Responsable</label>
        <input type="text" name="cedula_responsable" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono del Responsable</label>
        <input type="text" name="telefono_responsable" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Tipo</label>
        <select name="tipo" class="form-select" required>
            <option value="">Seleccione...</option>
            <option value="Comercio">Comercio</option>
            <option value="Institución">Institución</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Registrar</button>
</form>
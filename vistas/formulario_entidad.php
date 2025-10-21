<div class="contenedor_form_entidad" id="form_entidad" style="display: none;">
    <form action="../php/register_entity.php" method="post" class="p-4 shadow rounded bg-white">
        <h5 class="mb-3 text-success" style="text-align: center;">Registrar entidad</h5>
        
        <div class="input-group mb-3">
            <span class="input-group-text"><label for="0">Nombre</label></span>
            <span class="input-group-text"><i class="bi bi-building-add"></i></span>
            <input type="text" name="nombre" class="form-control" id="0" placeholder="Escriba el nombre de la entidad" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><label for="1">Comite</label></span>
            <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
            <select name="comite" id="1" class="form-select" required>
                <option value="" disabled selected>Seleccione el comite al que pertenece la entidad</option>
                <option value="COIR">COIR</option>
                <option value="COLOR">COLOR</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><label for="2">Ubicacion</label></span>
            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
            <input type="text" name="ubicacion" class="form-control" id="2" placeholder="Escriba la ubicacion exacta de la entidad" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><label for="3">Responsable</label></span>
            <span class="input-group-text"><i class="bi bi-person-up"></i></span>            
            <input type="text" name="nombre_responsable" class="form-control" id="3" placeholder="Escriba el nombre del responsable" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><label for="4">Cedula del Responsable</label></span>
            <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
            <input type="int" name="cedula_responsable" id="4" class="form-control" placeholder="Escriba la cedula del responsable" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><label for="5">Telefono del Responsable</label></span>
            <span class="input-group-text"><i class="bi bi-phone"></i></span>
            <input type="text" name="telefono_responsable" id="5" placeholder="Escriba el telefono del responsable" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><label for="6">Tipo</label></span>
            <span class="input-group-text"><i class="bi bi-question-circle"></i></span>
            <select name="tipo" id="6" class="form-select" required>
                <option value="" disabled selected>Seleccione el tipo de entidad</option>
                <option value="Comercio">Comercio</option>
                <option value="Institución">Institución</option>
            </select>
        </div>

        <button type="submit" name="btn_register_entity" class="btn btn-success">Registrar</button>
    </form>
</div>
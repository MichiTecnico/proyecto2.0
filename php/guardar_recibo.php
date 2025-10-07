<?php
// ===== ACTIVAR MOSTRAR TODOS LOS ERRORES =====
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "🔧 Iniciando procesamiento...<br>";
flush(); // Forzar envío al navegador

// ===== 1. CONEXIÓN A LA BASE DE DATOS =====
echo "Conectando a base de datos...<br>";
flush();

require 'main.php';

if (!$con) {
    die("❌ Error: No se pudo conectar a la base de datos");
}
echo "✅ Conexión a BD exitosa<br>";
flush();

// ===== 2. VERIFICAR MÉTODO POST =====
echo "Verificando método de envío...<br>";
flush();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("❌ Error: Este archivo solo acepta envíos por formulario POST");
}
echo "✅ Método POST correcto<br>";
flush();

// ===== 3. MOSTRAR DATOS RECIBIDOS (PARA DEPURAR) =====
echo "<h3>📨 Datos recibidos:</h3>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
flush();

// ===== 4. VALIDAR DATOS OBLIGATORIOS =====
echo "Validando datos obligatorios...<br>";
flush();

function validarDatosRequeridos() {
    $camposObligatorios = ['fecha', 'numero', 'tipo', 'comercio', 'responsable', 'cargo'];
    
    foreach ($camposObligatorios as $campo) {
        if (empty($_POST[$campo])) {
            throw new Exception("❌ El campo '$campo' es obligatorio");
        }
    }
    
    if (empty($_POST['material']) || empty($_POST['cantidad']) || empty($_POST['puntos'])) {
        throw new Exception("❌ Debe agregar al menos un material");
    }
    
    // Verificar que todos los arrays tengan la misma longitud
    if (count($_POST['material']) !== count($_POST['cantidad']) || 
        count($_POST['material']) !== count($_POST['puntos'])) {
        throw new Exception("❌ Error: Los arrays de materiales no coinciden en longitud");
    }
}

try {
    validarDatosRequeridos();
    echo "✅ Validación de datos exitosa<br>";
    flush();
} catch (Exception $e) {
    die($e->getMessage());
}

// ===== 5. SANITIZAR DATOS =====
echo "Sanitizando datos...<br>";
flush();

function sanitizarDatos() {
    return array(
        'fecha'       => htmlspecialchars(trim($_POST['fecha'])),
        'numero'      => htmlspecialchars(trim($_POST['numero'])),
        'tipo'        => htmlspecialchars(trim($_POST['tipo'])),
        'comercio'    => htmlspecialchars(trim($_POST['comercio'])),
        'responsable' => htmlspecialchars(trim($_POST['responsable'])),
        'cargo'       => htmlspecialchars(trim($_POST['cargo'])),
        'direccion'   => htmlspecialchars(trim($_POST['direccion'] ?? '')), // Usar operador null coalescing
        'materiales'  => array_map('htmlspecialchars', $_POST['material']),
        'cantidades'  => $_POST['cantidad'],
        'puntos'      => $_POST['puntos']
    );
}

$datos = sanitizarDatos();
echo "✅ Datos sanitizados<br>";
flush();

// ===== 6. GUARDAR EN BASE DE DATOS =====
echo "Guardando en base de datos...<br>";
flush();

function guardarEnBaseDeDatos($conexion, $datos) {
    echo "Iniciando transacción...<br>";
    flush();
    
    $conexion->begin_transaction();
    
    try {
        // 6.1 GUARDAR RECIBO PRINCIPAL
        echo "Preparando inserción de recibo principal...<br>";
        flush();
        
        $sql_recibo = "INSERT INTO recibos (fecha, numero_recibo, tipo, comercio, responsable, cargo, direccion) 
                       VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conexion->prepare($sql_recibo);
        if (!$stmt) {
            throw new Exception("Error al preparar consulta: " . $conexion->error);
        }
        
        $stmt->bind_param("sssssss", 
            $datos['fecha'],
            $datos['numero'], 
            $datos['tipo'],
            $datos['comercio'],
            $datos['responsable'],
            $datos['cargo'],
            $datos['direccion']
        );
        
        if (!$stmt->execute()) {
            throw new Exception("Error al guardar recibo: " . $stmt->error);
        }
        
        $id_recibo = $stmt->insert_id;
        $stmt->close();
        
        echo "✅ Recibo principal guardado. ID: $id_recibo<br>";
        flush();
        
        // 6.2 GUARDAR MATERIALES
        echo "Guardando materiales...<br>";
        flush();
        
        $sql_material = "INSERT INTO materiales_recibo (id_recibo, tipo_material, cantidad_kg, puntos) 
                         VALUES (?, ?, ?, ?)";
        
        $stmt_mat = $conexion->prepare($sql_material);
        if (!$stmt_mat) {
            throw new Exception("Error al preparar consulta de materiales: " . $conexion->error);
        }
        
        $total_kg = 0;
        $total_puntos = 0;
        $contador_materiales = 0;
        
        for ($i = 0; $i < count($datos['materiales']); $i++) {
            $cantidad_kg = floatval($datos['cantidades'][$i]);
            $puntos_mat = intval($datos['puntos'][$i]);
            
            // Validar valores
            if ($cantidad_kg <= 0) {
                throw new Exception("❌ Cantidad inválida para material: " . $datos['materiales'][$i]);
            }
            
            $stmt_mat->bind_param("isdi", $id_recibo, $datos['materiales'][$i], $cantidad_kg, $puntos_mat);
            
            if (!$stmt_mat->execute()) {
                throw new Exception("Error al guardar material '{$datos['materiales'][$i]}': " . $stmt_mat->error);
            }
            
            $total_kg += $cantidad_kg;
            $total_puntos += $puntos_mat;
            $contador_materiales++;
        }
        
        $stmt_mat->close();
        
        echo "✅ $contador_materiales materiales guardados<br>";
        flush();
        
        // 6.3 CONFIRMAR TRANSACCIÓN
        echo "Confirmando transacción...<br>";
        flush();
        $conexion->commit();
        
        return array(
            'id_recibo' => $id_recibo,
            'total_kg' => $total_kg,
            'total_puntos' => $total_puntos
        );
        
    } catch (Exception $e) {
        echo "❌ Error, haciendo rollback...<br>";
        flush();
        $conexion->rollback();
        throw $e;
    }
}

try {
    $resultado_bd = guardarEnBaseDeDatos($con, $datos);
    echo "✅ Base de datos guardada exitosamente<br>";
    flush();
} catch (Exception $e) {
    die("❌ Error en base de datos: " . $e->getMessage());
}

// ===== 7. CREAR DIRECTORIO DE RECIBOS =====
echo "Creando directorio para recibos...<br>";
flush();

$directorio_base = dirname(__DIR__);
$directorio_recibos = $directorio_base . '/recibos/';

if (!is_dir($directorio_recibos)) {
    if (!mkdir($directorio_recibos, 0755, true)) {
        die("❌ No se pudo crear el directorio: $directorio_recibos");
    }
    echo "✅ Directorio creado: $directorio_recibos<br>";
    flush();
} else {
    echo "✅ Directorio ya existe: $directorio_recibos<br>";
    flush();
}

// ===== 8. GENERAR ARCHIVO WORD =====
echo "Generando archivo Word...<br>";
flush();

function generarContenidoHTML($datos, $totales) {
    $fecha_formateada = date('d/m/Y', strtotime($datos['fecha']));
    $fecha_actual = date('d/m/Y H:i:s');
    $tipo_recibo = ($datos['tipo'] == 'pre') ? 'Pre-Recibo' : 'Recibo Final';
    
    // Contenido HTML simplificado para prueba
    $html = "<html>
    <head><meta charset='UTF-8'><title>Recibo {$datos['numero']}</title></head>
    <body>
        <h1>RECIBO DE MATERIALES</h1>
        <p><strong>Número:</strong> {$datos['numero']}</p>
        <p><strong>Fecha:</strong> $fecha_formateada</p>
        <p><strong>Comercio:</strong> {$datos['comercio']}</p>
        <p><strong>Responsable:</strong> {$datos['responsable']}</p>
        
        <h2>Materiales:</h2>
        <ul>";
    
    for ($i = 0; $i < count($datos['materiales']); $i++) {
        $html .= "<li>{$datos['materiales'][$i]}: {$datos['cantidades'][$i]} kg, {$datos['puntos'][$i]} puntos</li>";
    }
    
    $html .= "</ul>
        <p><strong>Total:</strong> {$totales['total_kg']} kg, {$totales['total_puntos']} puntos</p>
        <p><em>Generado el: $fecha_actual</em></p>
    </body>
    </html>";
    
    return $html;
}

$nombre_archivo = "recibo_{$datos['numero']}.doc";
$ruta_completa = $directorio_recibos . $nombre_archivo;

$contenido_html = generarContenidoHTML($datos, $resultado_bd);

if (file_put_contents($ruta_completa, $contenido_html) === false) {
    die("❌ No se pudo guardar el archivo Word en: $ruta_completa");
}

echo "✅ Archivo Word generado: $nombre_archivo<br>";
flush();

// ===== 9. MOSTRAR RESULTADO FINAL =====
echo "Procesamiento completado. Mostrando resultado...<br>";
flush();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Recibo Guardado</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f0f8ff; }
        .contenedor { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .exito { color: #27ae60; font-size: 24px; }
        .boton { display: inline-block; padding: 10px 20px; margin: 10px; background: #3498db; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class='contenedor'>
        <div class='exito'>✅ ¡Procesamiento Completado Exitosamente!</div>
        
        <h3>📊 Resumen:</h3>
        <ul>
            <li><strong>ID del Recibo:</strong> <?php echo $resultado_bd['id_recibo']; ?></li>
            <li><strong>Número:</strong> <?php echo $datos['numero']; ?></li>
            <li><strong>Comercio:</strong> <?php echo $datos['comercio']; ?></li>
            <li><strong>Total Materiales:</strong> <?php echo count($datos['materiales']); ?></li>
            <li><strong>Peso Total:</strong> <?php echo $resultado_bd['total_kg']; ?> kg</li>
            <li><strong>Puntos Total:</strong> <?php echo $resultado_bd['total_puntos']; ?> puntos</li>
            <li><strong>Archivo Generado:</strong> <?php echo $nombre_archivo; ?></li>
        </ul>
        
        <div>
            <a href='../recibos/<?php echo $nombre_archivo; ?>' class='boton' download>📄 Descargar Recibo</a>
            <a href='../vistas/eco_circulante.php' class='boton'>↩️ Volver al Sistema</a>
        </div>
    </div>
</body>
</html>

<?php
// ===== 10. CERRAR CONEXIÓN =====
$con->close();
echo "✅ Conexión cerrada. Proceso finalizado.<br>";
?>
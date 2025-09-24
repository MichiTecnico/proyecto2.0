<?php
require 'php/main.php';

// ===== CAPTURA DE DATOS DEL FORMULARIO =====
$fecha       = $_POST['fecha'];
$numero      = $_POST['numero'];
$tipo        = $_POST['tipo']; // pre o final
$comercio    = $_POST['comercio'];
$responsable = $_POST['responsable'];
$cargo       = $_POST['cargo'];
$direccion   = $_POST['direccion'];

$materiales  = $_POST['material'];
$cantidades  = $_POST['cantidad'];
$puntos      = $_POST['puntos'];

// ===== GUARDAR RECIBO PRINCIPAL =====
$sql_recibo = "INSERT INTO recibos (fecha, numero_recibo, tipo, comercio, responsable, cargo, direccion) 
               VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql_recibo);
$stmt->bind_param("sssssss", $fecha, $numero, $tipo, $comercio, $responsable, $cargo, $direccion);

if ($stmt->execute()) {
    $id_recibo = $stmt->insert_id; // ID autogenerado del recibo

    // ===== GUARDAR MATERIALES =====
    $sql_material = "INSERT INTO materiales_recibo (id_recibo, tipo_material, cantidad_kg, puntos) 
                     VALUES (?, ?, ?, ?)";
    $stmt_mat = $con->prepare($sql_material);

    for ($i = 0; $i < count($materiales); $i++) {
        $tipo_material = $materiales[$i];
        $cantidad_kg   = $cantidades[$i];
        $puntos_mat    = $puntos[$i];
        $stmt_mat->bind_param("isdi", $id_recibo, $tipo_material, $cantidad_kg, $puntos_mat);
        $stmt_mat->execute();
    }

    echo "✅ Recibo guardado correctamente con ID: " . $id_recibo;
    echo "<br><a href='../vistas/formulario_recibo.php'>Volver al formulario</a>";
} else {
    echo "❌ Error al guardar el recibo: " . $stmt->error;
}

$conn->close();
?>
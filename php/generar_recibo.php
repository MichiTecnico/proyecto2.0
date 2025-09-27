<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$fecha       = htmlspecialchars($_POST['fecha']);
		$numero      = htmlspecialchars($_POST['numero']);
		$tipo        = htmlspecialchars($_POST['tipo']); // pre o final
		$comercio    = htmlspecialchars($_POST['comercio']);
		$responsable = htmlspecialchars($_POST['responsable']);
		$cargo       = htmlspecialchars($_POST['cargo']);
		$direccion   = htmlspecialchars($_POST['direccion']);
		$materiales  = htmlspecialchars($_POST['material']);
		$cantidades  = htmlspecialchars($_POST['cantidad']);
		$puntos      = htmlspecialchars($_POST['puntos']);

		$fecha = date('d/m/Y');

		$contenido = "
    <html>
    <head>
        <meta charset=\"UTF-8\">
        <title>Documento Generado</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 2cm; }
            .titulo { text-align: center; font-size: 18pt; margin-bottom: 30px; }
            .fecha { text-align: right; margin-bottom: 20px; }
            .contenido { line-height: 1.5; text-align: justify; }
            .firma { margin-top: 50px; }
            .datos-personales { margin-bottom: 20px; border: 1px solid #ccc; padding: 15px; }
        </style>
    </head>
    <body>
        <div class=\"titulo\">".ucfirst($tipo_documento)."</div>
        <div class=\"fecha\">$fecha</div>
        
        <div class=\"datos-personales\">
            <strong>Datos de transaccion:</strong><br>
            Responsable: $responsable<br>
            Cargo: $cargo
            Comercio: $comercio<br>
            Tipo: $tipo<br>
            Material: $materiales<br>
            Cantidad: $cantidades<br>
            Puntos: $puntos<br>
        </div>
        
        <div class=\"contenido\">
            ".nl2br($mensaje)."
        </div>
        
        <div class=\"firma\">
            <strong>Atentamente</strong><br><br><br>
            $Responsable<br>
            $cargo<br>
            $comercio
        </div>
    </body>
    </html>
    ";
    
    // Configurar headers para descarga de Word
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment; filename=documento_$tipo_documento.doc");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    // Imprimir el contenido
    echo $contenido;
    exit;
}
	
?>
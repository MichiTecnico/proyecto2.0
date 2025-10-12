<?php
$fecha = $_POST['fecha'];
$correlativo = $_POST['correlativo'];
$responsable = $_POST['responsable'];
$tipo = $_POST['tipo'];
$comercio = $_POST['comercio'];
$cargo = $_POST['cargo'];
$direccion = $_POST['direccion'];












require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$contenidoHTML = "

<style>

table{
	border-collapse: collapse; 
	width: 100%;
}

td{
	border: 1px solid black; 
	padding: 8px; 
}

</style>

<h5 style='text-align:center';>GOBIERNO DE CARACAS<br>
CORPORACION CARACAS RECICLA, S.A.</h5>

	<table style='margin-left: 60%;
	margin-right: auto;'>

		<tr>
			<td style='text-align: right;'>FECHA:</td>
			<td style='text-align: right;'>".$fecha."</td>
		</tr>

		<tr>
			<td style='text-align: right;'>N° DE PRE-RECIBO:</td>
			<td style='text-align: right;'>".$correlativo."</td>
		</tr>
	</table>

	<h5 style='text-align:center';>GERENCIA DE GESTION COMERCIAL</h5>

	<table style='margin-left: 30%;
	margin-right: 50%;'>

		<tr>
			<td>COMERCIO O INSTITUCION:</td>
			<td>".$comercio."</td>
		</tr>

		<tr>
			<td>RESPONSABLE</td>
			<td>".$responsable."</td>
		</tr>

		<tr>
			<td>CARGO</td>
			<td>".$cargo."</td>
		</tr>

		<tr>
			<td>DIRECCION</td>
			<td>".$direccion."</td>
		</tr>

	</table>


	";
$html2pdf->writeHTML($contenidoHTML);
$html2pdf->output();

?>
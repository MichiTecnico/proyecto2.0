<?php
include './php/main.php';

$fecha = date("d-m-Y");
$correlativo = $_POST['correlativo'];
$encargado = $_POST['encargado'];
$entidad = $_POST['entidad'];
$cargo = $_POST['cargo'];


$sql = "SELECT ubicacion FROM entidad WHERE nombre = '$entidad'";
$result = mysqli_query($con, $sql);
$direccion = mysqli_fetch_array($result);


//ALUMINIO
$aluminio_c = $_POST['aluminio_cantidad'];
$aluminio_p = $_POST['aluminio_puntos'];

//ARCHIVO
$archivo_c = $_POST['archivo_cantidad'];
$archivo_p = $_POST['archivo_puntos'];

//CARTON
$carton_c = $_POST['carton_cantidad'];
$carton_p = $_POST['carton_puntos'];

//CALAMINA
$calamina_c = $_POST['calamina_cantidad'];
$calamina_p = $_POST['calamina_puntos'];

//HIERRO
$hierro_c = $_POST['hierro_cantidad'];
$hierro_p = $_POST['hierro_puntos'];

//LATON
$laton_c = $_POST['laton_cantidad'];
$laton_p = $_POST['laton_puntos'];

//PELICULA LIMPIA
$pelicula_limpia_c = $_POST['pelicula_limpia_cantidad'];
$pelicula_limpia_p = $_POST['pelicula_limpia_puntos'];

//PELICULA SUCIA
$pelicula_sucia_c = $_POST['pelicula_sucia_cantidad'];
$pelicula_sucia_p = $_POST['pelicula_sucia_puntos'];

//PLASTICO MIXTO
$plastico_mixto_c = $_POST['plastico_mixto_cantidad'];
$plastico_mixto_p = $_POST['plastico_mixto_puntos'];

//PLASTICO PET
$plastico_pet_c = $_POST['plastico_pet_cantidad'];
$plastico_pet_p = $_POST['plastico_pet_puntos'];

//PLASTICO TOBO
$plastico_tobo_c = $_POST['plastico_tobo_cantidad'];
$plastico_tobo_p = $_POST['plastico_tobo_puntos'];

//SOPLADO BLANCO
$soplado_blanco_c = $_POST['soplado_blanco_cantidad'];
$soplado_blanco_p = $_POST['soplado_blanco_puntos'];

//SOPLADO COLOR
$soplado_color_c = $_POST['soplado_color_cantidad'];
$soplado_color_p = $_POST['soplado_color_puntos'];

//VIDRIO
$vidrio_c = $_POST['vidrio_cantidad'];
$vidrio_p = $_POST['vidrio_puntos'];

//TOTALES
$total_c = $_POST['total_cantidad'];
$total_p = $_POST['total_puntos'];




require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

$contenidoHTML = "

<style>

img{
	width: 150px;
	height: 100px;
	margin-left: 10%;
}

table{
	border-collapse: collapse; 
	width: 100%;
	color: #255E2B;
}

td{
	border: 1px solid #255E2B; 
	padding: 8px; 
}

</style>


	<img src='./img/ccs_recicla_logo.png'>
	<img src='./img/logo.png' height='150px'>

	<h5 style='text-align:center;'>GOBIERNO DE CARACAS<br>
	CORPORACION CARACAS RECICLA, S.A.</h5>

	<table style='margin-left: 60%;
	margin-right: auto;'>	

		<tr>
			<td style='text-align: right; border: 0px; border-right: 1px solid #255E2B;'><i>FECHA:</i></td>
			<td style='text-align: right border: 1px; border-left: none;'>".$fecha."</td>
		</tr>

		<tr>
			<td style='text-align: right; border: 0px; border-right: 1px solid #255E2B;'><i>N° DE PRE-RECIBO:</i></td>
			<td style='text-align: right; border: 1px; border-left: none'>".$correlativo."</td>
		</tr>
	</table>

	<h5 style='text-align:center; color: #255E2B;'>GERENCIA DE GESTION COMERCIAL</h5>

	<table align='center'>

		<tr>
			<td>COMERCIO O INSTITUCION:</td>
			<td>".$entidad."</td>
		</tr>

		<tr>
			<td>RESPONSABLE</td>
			<td>".$encargado."</td>
		</tr>

		<tr>
			<td>CARGO</td>
			<td>".$cargo."</td>
		</tr>

		<tr>
			<td>DIRECCION</td>
			<td>".$direccion['ubicacion']."</td>
		</tr>

	</table>

	<h5 style='text-align:center; color: #255E2B;'>DETALLES DEL MATERIAL RETIRADO</h5>

	<table align='center'>

		<tr>
			<td>TIPO DE MATERIAL RECIBIDO</td>
			<td>CANTIDAD KG</td>
			<td>PUNTOS</td>
		</tr>

		<tr>
			<td>ALUMINIO</td>
			<td>".$aluminio_c."</td>
			<td>".$aluminio_p."</td>
		</tr>

		<tr>
			<td>ARCHIVO</td>
			<td>".$archivo_c."</td>
			<td>".$archivo_p."</td>
		</tr>

		<tr>
			<td>CARTON</td>
			<td>".$carton_c."</td>
			<td>".$carton_p."</td>
		</tr>

		<tr>
			<td>CALAMINA</td>
			<td>".$calamina_c."</td>
			<td>".$calamina_p."</td>
		</tr>

		<tr>
			<td>HIERRO</td>
			<td>".$hierro_c."</td>
			<td>".$hierro_p."</td>
		</tr>

		<tr>
			<td>LATON</td>
			<td>".$laton_c."</td>
			<td>".$laton_p."</td>
		</tr>

		<tr>
			<td>PELICULA LIMPIA</td>
			<td>".$pelicula_limpia_c."</td>
			<td>".$pelicula_limpia_p."</td>
		</tr>

		<tr>
			<td>PELICULA SUCIA</td>
			<td>".$pelicula_sucia_c."</td>
			<td>".$pelicula_sucia_p."</td>
		</tr>

		<tr>
			<td>PLASTICO MIXTO</td>
			<td>".$plastico_mixto_c."</td>
			<td>".$plastico_mixto_p."</td>
		</tr>

		<tr>
			<td>PLASTICO PET</td>
			<td>".$plastico_pet_c."</td>
			<td>".$plastico_pet_p."</td>
		</tr>

		<tr>
			<td>PLASTICO TOBO Y CESTA</td>
			<td>".$plastico_tobo_c."</td>
			<td>".$plastico_tobo_p."</td>
		</tr>

		<tr>
			<td>SOPLADO BLANCO</td>
			<td>".$soplado_blanco_c."</td>
			<td>".$soplado_blanco_p."</td>
		</tr>

		<tr>
			<td>SOPLADO COLOR</td>
			<td>".$soplado_color_c."</td>
			<td>".$soplado_color_p."</td>
		</tr>

		<tr>
			<td>VIDRIO</td>
			<td>".$vidrio_c."</td>
			<td>".$vidrio_p."</td>
		</tr>

		<tr>
			<td>TOTALES</td>
			<td>".$total_c."</td>
			<td>".$total_p."</td>
		</tr>

	</table>

	";
$html2pdf->writeHTML($contenidoHTML);
$html2pdf->output();


?>
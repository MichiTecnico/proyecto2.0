<div class="contenedor_lista_usu" id="lista_usuarios" style="display: none;">
	<style>

		th{
			padding: 15px;
		}

		tr{
			padding: 15px;
		}

		td{
			padding: 15px;
		}

	</style>
	<table class="table table-striped table-bordered table-secondary" style="border: 1px solid;">
		<thead style="padding: 2px">
			<th style="text-align: center;">ID</th>
			<th style="text-align: center;">Nacionalidad</th>
			<th style="text-align: center;">Cedula</th>
			<th style="text-align: center;">Nacimiento</th>
			<th style="text-align: center;">Nombre</th>
			<th style="text-align: center;">Apellido</th>
			<th style="text-align: center;">Rol</th>
			<th style="text-align: center;">Gerencia</th>
			<th style="text-align: center;">Division</th>
			<th colspan="2" style="text-align: center;">Status</th>
			<th style="text-align: center;">Actualizar</th>
		</thead>

		<tbody>
			
			<?php

			include_once "../php/read_user.php";

			

			while ($row = mysqli_fetch_array($result)) {


				$gerencia = $row['id_gerencia'];
			    switch($gerencia){
			        case "1":
			            $row['id_gerencia'] = 'Gestion Interna';
			        break;
			        case "2";
			            $row['id_gerencia'] = 'Consultoria Juridica';
			        break;
			        case "3";
			            $row['id_gerencia'] = 'Operaciones';
			        break;
			        case "4";
			            $row['id_gerencia'] = 'Gestion Comercial';
			        break;
			    }

			    $division = $row['id_division'];
			    switch($division){
			        case "1":
			            $row['id_division'] = 'Administracion';
			        break;
			        case "2":
			            $row['id_division'] = 'Gestion Humana';
			        break;
			        case "3":
			            $row['id_division'] = 'Seguridad Integral';
			        break;
			        case "4":
			            $row['id_division'] = 'Planificacion y Presupuesto';
			        break;
			        case "5":
			            $row['id_division'] = 'Tecnologia';
			        break;
			        case "6":
			            $row['id_division'] = 'Gestion Comunicacional';
			        break;
			        case "7":
			            $row['id_division'] = 'Servicios';
			        break;
			        case "8":
			            $row['id_division'] = 'Recoleccion';
			        break;
			        case "9":
			            $row['id_division'] = 'Comercializacion';
			        break;
			        case "10":
			            $row['id_division'] = 'Economia Circulante';
			        break;
			    }

			    $id_rol = $row['id_rol'];
			    switch($id_rol){
			        case "1":
			            $row['id_rol'] = 'Administrador';
			        break;
			        case "2":
			            $row['id_rol'] = 'Gerente';
			        break;
			        case "3":
			            $row['id_rol'] = 'Empleado';
			        break;
			    }
			    $status = $row['status'];
			    switch($status){
			    	case "1":
			    		$row['status'] = '<h5 class="text-success">Activo';
			    	break;
			    	case "0":
			    		$row['status'] = '<h5 class="text-danger">Inactivo';
			    	break;
			    	
			    }


			 ?>
				
				<tr>
					<td scope="col" style="text-align: center;"><?= $row['id']?></td>
					<td scope="col" style="text-align: center;"><?= $row['nacionalidad']?></td>
					<td scope="col" style="text-align: center;"><?= $row['cedula']?></td>
					<td scope="col" style="text-align: center;"><?= $row['fecha_nac']?></td>
					<td scope="col" style="text-align: center;"><?= $row['nombre']?></td>
					<td scope="col" style="text-align: center;"><?= $row['apellido']?></td>
					<td scope="col" style="text-align: center;"><?= $row['id_rol']?></td>
					<td scope="col" style="text-align: center;"><?= $row['id_gerencia']?></td>
					<td scope="col" style="text-align: center;"><?= $row['id_division']?></td>
					<td scope="col" style="text-align: center;"><?= $row['status']?></td>
					<td style="text-align: center;"><a class="btn btn-warning btn-sm" href="../php/on_off_user.php?id=<?=$row['id']?>">Cambiar</a></td>
					<td scope="col" style="text-align: center;"><a class="btn btn-primary btn-sm" href="../vistas/update.php?id=<?=$row['id']?>">Actualizar</a></td>
				</tr>

			<?php } ?>
		</tbody>
	</table>	
</div>

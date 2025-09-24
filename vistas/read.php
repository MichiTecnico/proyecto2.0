

<div class="contenedor_lista_usu" id="lista_usuarios" style="display: none">
	<table style="border-collapse: collapse;">
		<thead>
			<th style="border: 1px solid black;text-align: center;">ID</th>
			<th style="border: 1px solid black;text-align: center;">Nacionalidad</th>
			<th style="border: 1px solid black;text-align: center;">Cedula</th>
			<th style="border: 1px solid black;text-align: center;">Nacimiento</th>
			<th style="border: 1px solid black;text-align: center;">Nombre</th>
			<th style="border: 1px solid black;text-align: center;">Apellido</th>
			<th style="border: 1px solid black;text-align: center;">Clave</th>
			<th style="border: 1px solid black;text-align: center;">ID_Rol</th>
			<th style="border: 1px solid black;text-align: center;">ID_Gerencia</th>
			<th style="border: 1px solid black;text-align: center;">ID_Division</th>
			<th style="border: 1px solid black;text-align: center;">Actualizar</th>
			<th style="border: 1px solid black;text-align: center;">Borrar</th>
		</thead>

		<tbody>
			
			<?php

			include_once "../php/read_user.php";

			while ($row = mysqli_fetch_array($result)) { ?>
				
				<tr>
					<td style="border: 1px solid black;text-align: center;"><?= $row['id']?></td>
					<td style="border: 1px solid black;text-align: center;"><?= $row['nacionalidad']?></td>
					<td style="border: 1px solid black;text-align: center;"><?= $row['cedula']?></td>
					<td style="border: 1px solid black;text-align: center;"><?= $row['fecha_nac']?></td>
					<td style="border: 1px solid black;text-align: center;"><?= $row['nombre']?></td>
					<td style="border: 1px solid black;text-align: center;"><?= $row['apellido']?></td>
					<td style="border: 1px solid black;text-align: center;"><?= $row['clave']?></td>
					<td style="border: 1px solid black;text-align: center;"><?= $row['id_rol']?></td>
					<td style="border: 1px solid black;text-align: center;"><?= $row['id_gerencia']?></td>
					<td style="border: 1px solid black;text-align: center;"><?= $row['id_division']?></td>
					<td style="border: 1px solid black;text-align: center;"><a href="../vistas/update.php?id=<?=$row['id']?>">Actualizar</a></td>
					<td style="border: 1px solid black;text-align: center;"><a href="../php/delete_user.php?id=<?=$row['id']?>">Borrar</a></td>
				</tr>

			<?php } ?>
		</tbody>
	</table>	
</div>


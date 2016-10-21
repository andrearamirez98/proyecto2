<?php
require_once('encabezado.php');
require_once('configuracion.php');
$conexion = mysqli_connect ($configuracion['servidor'],$configuracion['usuario'],$configuracion['contrasena'],$configuracion['base_datos']);
if(!$conexion){
	die("error de conexion de la base de datos: " .mysql_connect_error());
}
	$consulta = mysqli_query($conexion,"SELECT * FROM usuarios");
	$usuarios = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
?>
<div class="container">
<h2 class="text-center">Listar Usuarios</h2>
<a href="crear_usuario.php" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Añadir Nuevo Usuario</a>
	<table class="table table-bordered table-striped">
	<tr>
		<th class="text-center">Id</th>
		<th class="text-center">Nombre</th>
		<th class="text-center">Apellido</th>
		<th class="text-center">Email</th>
		<th class="text-center">Tipo de usuario</th>
		<th class="text-center">Fecha creación</th>
		<th class="text-center">Opciones</th>

	</tr>
	<?php foreach($usuarios as $usuario): ?>
		<tr>
			<td class="text-center"><?php echo $usuario['id']; ?></td>
			<td class="text-center"><?php echo $usuario['nombre']; ?></td>
			<td class="text-center"><?php echo $usuario['apellido']; ?></td>
			<td class="text-center"><?php echo $usuario['email']; ?></td>
			<td class="text-center"><?php echo $usuario['tipo_usuario']; ?></td>
			<td class="text-center"><?php echo $usuario['fecha_creacion']; ?></td>

			<td class="text-center">
				<a href="ver_usuario.php?id = <?php echo $usuario['id']; ?>" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></a>
				<a href="editar_usuario.php?id = <?php echo $usuario['id']; ?>" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
				<a href="eliminar_usuario.php?id = <?php echo $usuario['id'];?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
			</td>
		</tr>

	<?php endforeach; ?>
	</table>
	</div>

<?php
require_once('pie_pagina.php');
?>

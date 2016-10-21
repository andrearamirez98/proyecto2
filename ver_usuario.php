<?php
	require_once('encabezado.php');
	$id = $_GET['id'];
	echo "Hola mundo: ".$id;

	require_once('configuracion.php');
$conexion = mysqli_connect ($configuracion['servidor'],$configuracion['usuario'],$configuracion['contrasena'],$configuracion['base_datos']);
if(!$conexion){
	die("error de conexion de la base de datos: " .mysql_connect_error());
}
	$consulta = mysqli_query($conexion,"SELECT * FROM usuarios WHERE id= $id");
	$usuario= mysqli_fetch_array($consulta);
	
	if(mysqli_num_rows($consulta));
	
?>

<div class="container">
	<h2 class="text-center">Detalle Usuario <?php echo $usuario['nombre']."".$usuario['apellido']; ?></h2>
	<div class="row">
	<div class="col-md-2"></div>
	<form  class="col-md-8">

	<div class="form-group">
	<label for="nombre">Nombre</label>	
	<input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre" required="" readonly value="<?php echo $usuario['nombre']; ?>">	
	</div>

	<div class="form-group">
	<label for="nombre">Apellido</label>	
	<input type="text" name="apellido" class="form-control" placeholder="Ingrese apellido" required=" <?php echo $usuario['apellido']; ?>">
	</div>

	<div class="form-group">
	<label for="nombre">Email</label>	
	<input type="email" name="email" class="form-control" placeholder="Ingrese email" required="" value="<?php echo $usuario['email']; ?>">	
	</div>

	<div class="form-group">
	<label for="tipo_usuario">Tipo de usuario</label>
	<input type="text" name="tipo_usuario" class="form-control" placeholder="Ingrese tipo de usuario" required="" value="<?php echo $usuario['tipo_usuario']; ?>">
	</div>
	
	<div>
		<a href="listar_usuarios.php" class="btn btn-success">Volver atras</a>

	</div>
	</form>
	</div>
	</div>

<?php

 endif;
	require_once('pie_pagina.php');
?>
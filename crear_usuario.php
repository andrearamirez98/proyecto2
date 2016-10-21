<?php
require_once('encabezado.php');

//VAlidar si las variables estan inicializadas
if (isset($_POST['nombre'])
	&& isset($_POST['apellido'])
	&& isset($_POST['email'])
	&& isset($_POST['tipo_usuario'])
	&& isset($_POST['contrasena'])
	&& isset($_POST['contrasena2'])
	)
{
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$tipo_usuario = $_POST['tipo_usuario'];
	$contrasena = $_POST['contrasena'];
	$contrasena2 = $_POST['contrasena2'];

	if($contrasena == $contrasena2)
	{
			$contrasena_enc =sha1($contrasena);
			require_once('configuracion.php');
			$conexion = mysqli_connect ($configuracion['servidor'],$configuracion['usuario'],$configuracion['contrasena'],$configuracion['base_datos']);
			if(!$conexion)
		{
			die("error de conexion de la base de datos: " .mysql_connect_error());
		}
		$insertar = mysqli_query($conexion, "INSERT INTO usuarios(nombre, apellido, email, tipo_usuario, contrasena) VALUES('$nombre', '$apellido', '$email', '$tipo_usuario', '$contrasena_enc')");
		$consulta = mysqli_affected_rows($conexion);

		if ($consulta==1) 
		{
			?>
				<div class="alert alert-success">
				<button type="button" class="close" data dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Alerta!</strong> El usuario fue registrado con exito...
				</div>
			<?php
		}
		else{
				?>
		<div class="alert alert-danger">
		<button type="button" class="close" data dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Alerta!</strong> El usuario no pudo ser registrado, intentelo de nuevo ...
		</div>
		<?php
		}
	}
	else
	{
		?>
		<div class="alert alert-danger">
		<button type="button" class="close" data dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Alerta!</strong> Las contraseñas ingresadas no coinciden ...
		</div>
		<?php
	}
}

?>
	<div class="container">
	<h2 class="text-center">Crear Nuevo Usuario</h2>
	<div class="row">
	<div class="col-md-2"></div>
	<form action="crear_usuario.php" class="col-md-8" method="POST">

	<div class="form-group">
	<label for="nombre">Nombre</label>	
	<input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre" required="">	
	</div>

	<div class="form-group">
	<label for="nombre">Apellido</label>	
	<input type="text" name="apellido" class="form-control" placeholder="Ingrese apellido" required="">	
	</div>

	<div class="form-group">
	<label for="nombre">Email</label>	
	<input type="email" name="email" class="form-control" placeholder="Ingrese email" required="">	
	</div>

	<div class="form-group">
	<label for="tipo_usuario">Seleccione un tipo de usuario</label>
	<select name="tipo_usuario" class="form-control">
		<option value="administrador">Administrador</option>
		<option value="cliente">Cliente</option>
	</select>
	</div>
	
	<div class="form-group">
	<label for="nombre">Contraseña</label>	
	<input type="password" name="contrasena" class="form-control" placeholder="Ingrese contraseña" required="">	
	</div>

	<div class="form-group">
	<label for="nombre">Repetir Contraseña</label>	
	<input type="password" name="contrasena2" class="form-control" placeholder="Ingrese contraseña de nuevo" required="">	
	</div>

	<div>
		<button type="submit" class="btn btn-primary">Crear Usuario</button>
		<a href="listar_usuarios.php" class="btn btn-success">Volver atras</a>

	</div>

	</form>
	</div>
	</div>
<?php
require_once('pie_pagina.php');
?>
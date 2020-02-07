<?php
session_start();
ini_set('error_reporting', 0);
if(isset($_SESSION['nom'])){
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesión</title>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			background-color: #999;
		}
		#caja{
			background-color: #33e;
			height: 470px;
			width: 300px;
			margin-top: 80px;
			border-radius: 20px;
		}
		input{
			margin-top: 40px;
			border-radius: 20px;
			font-size: 20px;
			text-align: center;
		}
		#btnr{
			border-radius: 20px;
			background-color: #00f;
			margin-top: 40px;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div align="center">
		<div id="caja" align="center">
			<br>
			<h1>Registro</h1>
			<hr>
			<form method="post">
				<input id="nom" type="text" name="nom" placeholder="Nombre" required>
				<input id="user" type="email" name="user" placeholder="Correo Electrónico" required>
				<input id="pass" type="password" name="pass" placeholder="Contraseña" required>
				<button id="btnr" name="btnr">Regístrate</button>
			</form>
			<br>
			<hr>
			<br>
			¿Ya tienes una cuenta? <a href="index.php">Inicia Sesión</a>
		</div>
	</div>
<?php
	if(isset($_POST['btnr'])){
		$con=mysql_connect("localhost","id7171999_joranome","raulito48") or die("Error en la conexion");
		mysql_select_db("id7171999_rs");
		$nombre=($_POST['nom']);
		$correo=($_POST['user']);
		$contra=($_POST['pass']);
		$cu=mysql_num_rows(mysql_query($con,"SELECT * FROM Usuarios WHERE Correo='$correo'"));
		$cn=mysql_num_rows(mysql_query($con,"SELECT * FROM Usuarios WHERE Nombre='$nombre'"));
		if($cu>0){
			?>
			<script type="text/javascript">
				alert("El correo ya está en uso");
			</script>
			<?php
		}
		else
			{
			if($cn>0){
				?>
				<script type="text/javascript">
					alert("El nombre ya está en uso");
				</script>
				<?php
			}
				//$contra=md5($contra);
					$insertar=mysql_query("INSERT into usuarios (Nombre, Correo, Pass, fecha_reg) values('$nombre','$correo','$contra',now())",$con) or die("Error");
					if($insertar){
						?>
						<script type="text/javascript">
							alert("Se ha registrado con éxito");
						</script>
						<?php
						header('Location: index.php');
					}else{
						?>
						<script type="text/javascript">
							alert("Ha ocurrido un error");
						</script>
						<?php
					}
				}
		}
?>
</body>
</html>
<?php
session_start();
if(isset($_SESSION['nom'])){
	header("Location: index.php");
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
			height: 450px;
			width: 300px;
			margin-top: 95px;
			border-radius: 20px;
		}
		input{
			margin-top: 40px;
			border-radius: 20px;
			font-size: 20px;
			text-align: center;
		}
		#btnis{
			cursor: pointer;
			border-radius: 20px;
			background-color: #00f;
			margin-top: 40px;
			font-size: 20px;
		}
		#error{
			background-color: #e55;
			color: #f00;
			font-size: 20px;
			margin-top: 15px;
			border-radius: 15px;
		}
	</style>
</head>
<body>
	<div align="center">
		<div id="caja" align="center">
			<br>
			<h1>Iniciar Sesión</h1>
			<hr>
			<form method="post">
			<input id="user" type="text" name="user" placeholder="Correo Electrónico">
			<input id="pass" type="password" name="pass" placeholder="Contraseña">
			<button id="btnis" name="btnis">Iniciar Sesión</button>
			</form>
			<br>
			<br>
			<span id="error">
				
<?php
	if(isset($_POST['btnis'])){
		$con=mysql_connect("localhost","id7171999_joranome","raulito48") or die("Error en la conexion");
		mysql_select_db("id7171999_rs");
		$Correo=$_POST['user'];
		$pass=md5($_POST['pass']);
		$q=mysql_query("SELECT * from usuarios WHERE Correo='$Correo' and Pass='$pass'",$con);
		$contar=mysql_num_rows($q);
		if($contar == 1){
			while($row=mysql_fetch_array($q)){
				echo $row['Nombre'];
				if($Correo=$row['Correo'] && $pass=$row['Pass']){
					$_SESSION['nom']=$row['Nombre'];
					$_SESSION['id']=$row['id'];
					header('Location: index.php');
				}else{
					echo "Usuario incorrecto";
				}
			}
		}
		else{
			echo "Usuario incorrecto";
		}
	}
?>
			</span>
			<br>
			<hr>
			<br>
			¿No tienes una cuenta? <a href="registro.php">Regístrate</a>
		</div>
	</div>
</body>
</html>
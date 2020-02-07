<?php
session_start();
include "bm.php";
$a=1;
$b=0;
if(!isset($_SESSION['nom'])){
	header('Location: is.php');
}
$con=mysqli_connect("localhost","root","","rs");
$yo=$_SESSION['nom'];
$qcolor=mysqli_query($con,"SELECT * from usuarios where nombre='$yo'");
$color="";
$colorfont="#000";
$colorhoverfont="";
	$colorbg="#00f";
			while($w=mysqli_fetch_array($qcolor)){
				$color=$w['color'];	
				$colorhoverfont="";
			}
			if($colorhoverfont==""){
				$colorhoverfont="#FFF";
			}
			if($color==""){
				$color="#00F";
			}elseif ($color=="#000") {
				$colorfont="#fff";
				$colorbg="#333";
			}elseif($color=="#FFF"){
				$colorbg="#ddd";
				$colorhoverfont="#000";
			}elseif($color=="#00F"){
				$colorbg="#55e";
			}elseif($color=="#0F0"){
				$colorbg="#3e3";
			}elseif($color=="#F00"){
				$colorbg="#e55";
			}elseif($color=="#F0F"){
				$colorbg="#e5E";
			}elseif($color=="#0FF"){
				$colorbg="#5Ee";
			}elseif($color=="#FF0"){
				$colorbg="#Ee3";
			}elseif($color=="#999"){
				$colorbg="#AAA";
			}elseif($color=="#909"){
				$colorbg="#850085";
			}elseif($color=="#990"){
				$colorbg="#CC5";
			}elseif($color=="#900"){
				$colorbg="#C33";
			}
?>
<!DOCTYPE html>
<html>
<head>
	<title id="title">Inicio</title>
	<meta charset="utf-8">
	<style type="text/css">
		#Like:hover{
			color:#fff;
			cursor: pointer;
		}
		#txtpublicacion{
			margin-top:20px;
			margin-bottom: 0px;
			width: 420px;
			height: 100px;
			border-radius: 20px;
			text-align: center;
			max-width: 420px;
			max-height:100px;
			min-width: 420px;
			min-height: 100px;
		}
		#publicacion{
			text-align: center;
			background-color: <?php echo $color; ?>;
			border-radius: 20px;
			width: 450px;
			height: 200px;
			float: none;
		}
		#amigolink{
			cursor: pointer;
			text-decoration: underline;

			background-color: #aaa;
		}
		#amigolink:hover{
			background-color: #fff;
		}
		#espacio{
			height: 50px;
		}
		#pt{
			border-radius: 20px;
			text-align: center;
			background-color: <?php echo $color; ?>;
		}
		#TextToSearch{
			border-radius: 20px;
			margin-left: 75px;
			text-align: center;
		}
		#inicio{
			margin-left: 200px;
		}
		#btnPublicar{
			margin-top: 10px;
			min-width: 100px;
			min-height: 30px;
			background-color: <?php echo $color; ?>;
			border-radius: 20px;
			cursor: pointer;
			color: #111;
			font-weight: bold;
		}
		body{
			background-color: #bfbfbf;
		}
		.btnBM:hover{
			color: <?php echo $colorhoverfont; ?>;
		}
	</style>
</head>

<!---->


<body>
	<div id="espacio"></div>
		<!--Mensajes
			<table style="background-color: #33e; border-radius: 20px; min-width: 120px; min-height: 100%; display: table-cell;  vertical-align: middle; text-align: center;">
				<div align="center">
				<tr><th><p style="text-align: center;">Mensajes</p></th></tr>
				<tr><th><hr><p style="text-align: center;"><strong>Nombre</strong><br>Mensaje</p></th></tr>
				</div>
			</table>-->

		<!--PerfilAmigo-->
			<?php
			if (isset($_GET['amigolink'])){
				$NA=$_GET['amigolink'];?>
				<script type="text/javascript">
					document.getElementById('title').innerHTML="<?php echo $NA; ?>";
				</script>
				<?php
				$fotoAmigo="";
				$queryAmigo=mysqli_query($con,"SELECT * FROM Usuarios where Nombre='$NA'");
				while($row=mysqli_fetch_array($queryAmigo)){
					$fotoAmigo=$row['img_perfil'];
					$amcolor=$row['color'];
				}
				if($amcolor==""){
					$amcolor="#00F";
					$amcolorfont="#FFF";
					$amcolorbg="#55e";
				}elseif ($amcolor=="#000") {
				$amcolorfont="#fff";
				$amcolorbg="#333";
				}elseif($amcolor=="#FFF"){
				$amcolorbg="#ddd";
				}elseif($amcolor=="#00F"){
				$amcolorbg="#55e";
				}elseif($amcolor=="#0F0"){
				$amcolorbg="#3e3";
				}elseif($amcolor=="#F00"){
				$amcolorbg="#e55";
				}elseif($amcolor=="#F0F"){
				$amcolorbg="#e5E";
				}elseif($amcolor=="#0FF"){
				$amcolorbg="#5Ee";
				}elseif($amcolor=="#FF0"){
				$amcolorbg="#Ee3";
				}elseif($amcolor=="#999"){
				$amcolorbg="#AAA";
				}elseif($amcolor=="#909"){
				$amcolorbg="#850085";
				}elseif($amcolor=="#990"){
				$amcolorbg="#CC5";
				}elseif($amcolor=="#900"){
				$amcolorbg="#C33";
			}
				if($fotoAmigo==""){
					$fotoAmigo="http://emser.es/wp-content/uploads/2016/08/usuario-sin-foto.png";
				}
				
			}
			?>
			<div align="center" style="margin-left: 75px; display: table; background-color: <?php echo $amcolor; ?>">

			<div style="width: 50px;"></div>
			<table style="background-color: <?php echo $color; ?>; border-radius: 20px; min-width: 120px; min-height: 100%; display: table-cell;  vertical-align: middle; text-align: center; display: none;">
				<div align="center">
					<?php
					if(isset($_GET['amigolink'])){?>
					<img style="border-style: solid;border-width: 5px;background-color:#fff; border-color: #fff;" onclick="window.open(this.src)" width="100" height="100" src="<?php echo $fotoAmigo;?>">	
						<p style="color: <?php echo $amcolorfont; ?>"><?php
						echo $_GET['amigolink'];
					?></p>
					<br>
					<?php
					if($_GET['amigolink']!=$_SESSION['nom']){
						$_SESSION['namigo']=$_GET['amigolink'];
						$nse=$_GET['amigolink'];
						$nso=$_SESSION['nom'];
						$mnsj="Mandar Solicitud";
						$rsr=mysqli_query($con,"SELECT * FROM Solicitudes where Nombre_Solicitante='$nse' and Nombre_Solicitado='$nso'");
						if(mysqli_num_rows($rsr)>0){
							$mnsj="Solicitud recibida";
						}
						$rse=mysqli_query($con,"SELECT * FROM Solicitudes where Nombre_Solicitante='$nso' and Nombre_Solicitado='$nse'");
						if(mysqli_num_rows($rse)>0){
							$mnsj="Solicitud enviada";
						}
						$rsa=mysqli_query($con,"SELECT * FROM Amigos where (Nom1='$nso' or Nom1='$nse') and (Nom2='$nse' or Nom2='$nso')");
						if(mysqli_num_rows($rsa)>0){
							$mnsj="Amigos";
						}
						if($mnsj!="Amigos" && $mnsj!="Solicitud enviada" && $mnsj!="Solicitud recibida"){
						?>
						<form method="post" action="mandarsoli.php">
							<button name="Msoli"><?php echo $mnsj; ?></button>
						</form>
						<?php
					}else{
						?>
						<p><?php echo $mnsj; ?></p>
						<?php
					}
					}}

					?>
				</div>
			</table>

		<!--Publicar-->
		<div id="publicacion">
			<form method="post" enctype="multipart/form-data">
				<textarea type="text" id="txtpublicacion" name="txtpublicacion" placeholder="Escribe lo que quieras"></textarea>
				<input type="file" style="border-radius: 20px;" name="file" id="file">
				<button id="btnPublicar" name="btnPublicar">Publicar</button>
			</form>
		</div>
		<?php
			if(isset($_POST['btnPublicar'])){
				$nombre=$_SESSION['nom'];
				$destino="";
				if(isset($_FILES['file'])){
						$rFoto=$_FILES["file"]["tmp_name"];
						$name=$_FILES["file"]["name"];
						if(is_uploaded_file($rFoto)){
							$destino="ImagenesPosts/".$name;
							copy($rFoto, $destino);
						}
						else{
							?>
							<script type="text/javascript">
								alert("Error en la imagne");
							</script>
							<?php
						}
				}
				$cont=$_POST['txtpublicacion'];
				$qIP=mysqli_query($con,"INSERT INTO Publicaciones (nombre,contenido,fechaP,imagen) VALUES('$nombre','$cont',now(),'$destino')");
				if($qIP){
					?>
						<script type="text/javascript">
							alert("Se ha realizado la publicación");
						</script>
						<?php
				}
			}
		?>

				<script type="text/javascript">
					function ocultar(){
					document.getElementById('pt').style.display = 'none';
					}
				</script>
		<div style="height: 20px;"></div>
		
		<!--Inicio-->
		<?php
			if (isset($_POST['btnSalir'])) {
				?>
					<script type="text/javascript">
						location.replace('logout.php');
					</script>
					<?php
			}

			if(isset($_POST['btnInicio']) || $a==1){
				$a=1;
				if(isset($_POST['btnInicio'])){
					?>
					<script type="text/javascript">
						location.replace('index.php');
					</script>
					<?php
				}
		?>
		<div id="inicio" align="center">
			<?php
				$yo=$_SESSION['nom'];
				$qp1=mysqli_query($con,"SELECT * FROM Amigos where Nom1='$yo' || Nom2='$yo'");
				while($r=mysqli_fetch_array($qp1)){
					if($r['nom1']!=$yo){
						$n=$r['nom1'];}
					elseif($r['nom2']!=$yo){
						$n=$r['nom2'];
					}
					$likes=0;
				$qP=mysqli_query($con,"SELECT * FROM Publicaciones where Nombre='$n' order by fechaP asc");
				while($row=mysqli_fetch_array($qP)){
					$contenido=$row['contenido'];
					$nombre=$row['Nombre'];
					$fecha=$row['fechaP'];
					$imagen=$row['imagen'];
					$idp=$row['idP'];
					?>
					<div style="background-color: <?php echo $colorbg; ?>;">
						<br>
						<div id="pt">
							<form method="post">
								<a style="color:#fff; margin-left: 20px; margin-top: 10px;" href="index.php?amigolink=<?php echo $nombre; ?>" name="amigolink"  onclick="x('<?php echo $nombre;?>')"><?php echo $nombre;?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="margin-right: 20px;"><?php echo $fecha;?></b>
								<p><?php echo $contenido;?></p>
								<?php
									if($imagen!=""){
								?>
									<img style="max-height: 150px; max-width: 150px; margin-left: auto;margin-right: auto;display: block;" src="<?php echo $imagen;?>">
									<br>
								<?php } 
								$qPl=mysqli_query($con,"SELECT * FROM Likes where id_publicacion='$idp'");
								while($RPL=mysqli_fetch_array($qPl)){
									$likes++;
								}
								$yo=$_SESSION['nom'];
								$qPel=mysqli_query($con,"SELECT * FROM Likes where id_publicacion='$idp' and nombre_dl='$yo'");
								if(mysqli_num_rows($qPel)>0){
									$estadolike="Ya no me gusta";
								}else{
									$estadolike="Me gusta";
								}
								?>
								<hr>
								<a style=" color:#fff" href="like.php?n=<?php echo $n; ?>&idp=<?php echo $idp; ?>&est=<?php echo $estadolike; ?>" id="Like" name="Like" ><?php echo $estadolike; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:#fff;"><?php echo $likes; ?></b>
								<br>
								<!--Comentarios-->
								<?php
								$qec=mysqli_query($con,"SELECT * FROM Comentarios where id_publicacion='$idp'");
								while($rowqec=mysqli_fetch_array($qec)){
									$nc=$rowqec['nombre'];
									$cc=$rowqec['contenido'];
									$f=$rowqec['fecha'];
									?>
									<hr>
									<p><b><?php echo $nc ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $f; ?></p>
									<p><?php echo $cc; ?></p>
									<hr>
									<?php
								}
								?>

								<!--Caja de comentarios-->
								<form method="post">
									<input style="display: none;" type="" name="idpub" value="<?php echo $idp; ?>">
									<textarea name="comentario" style="border-radius: 20px; margin-top: 5px; max-width: 180px;min-width: 180px; max-height: 20px;min-height: 20px;" placeholder="Comenta lo que quieras"></textarea>
									<button name="btncomentar" style="background-color: #fff;" name="btncomentar">Comentar</button>
								</form>
							</form>
						</div>
					<br>
					<hr>
					<br>
					</div>
								<br><br>
					<?php
				}
			}

				if(isset($_POST['btncomentar'])){
						$idpu=$_POST['idpub'];
					//insertar notificacion
						$qsp=mysqli_query($con,"SELECT * from Publicaciones where idP='$idpu'");
					while($rsp=mysqli_fetch_array($qsp)){
						$nombrenoti=$rsp['Nombre'];
					}
						$title="Han comentado";
						$nombren=$_SESSION['nom'];
						$contenidon=$nombren." ha comentado una publicacion";
						$qinc=mysqli_query($con,"INSERT into notificaciones (nombre,titulo,contenido,fecha) VALUES('$nombrenoti','$title','$contenidon',now())");
					//insertar comentario
						$coment=$_POST['comentario'];
						$qanc=mysqli_query($con,"INSERT into Comentarios (id_publicacion,nombre,contenido,fecha) VALUES('$idpu','$yo','$coment',now())");
						if($qanc && $qinc){
							?>
							<script type="text/javascript">
								alert("Se ha comentado");
								location.replace("index.php");
							</script>
							<?php
						}else{
							?>
							<script type="text/javascript">
								alert("Error,no se ha comentado");
							</script>
							<?php
						}
					}
			?>
		</div>
				<?php
			}
			
			//Amigo
			if (isset($_GET['amigolink'])){
				?>
				<script type="text/javascript">
					function x(a){
						jQuery('').load('index.php?name='+a);	
					}
				document.getElementById('inicio').style.display = 'none';
				document.getElementById('publicacion').style.display = 'none';
				document.getElementById('pt').style.display = 'block';
				</script>
				<?php
				$a=2;
				$NAL=$_GET['amigolink'];
				$queryAmigoLinkPosts=mysqli_query($con,"SELECT * FROM Publicaciones where Nombre='$NAL'");
				while($row=mysqli_fetch_array($queryAmigoLinkPosts)){
					$contenido=$row['contenido'];
					$nombre=$row['Nombre'];
					$fecha=$row['fechaP'];
					$imagen=$row['imagen'];
					?>
					<div id="pt" style="background-color: <?php if($amcolorbg!=""){echo $amcolorbg;} ?>">
						<form method="get">
							<a style="color:#fff; margin-left: 20px; margin-top: 10px;" href="index.php?amigolink=<?php echo $nombre; ?>" name="amigolink"  onclick="x('<?php echo $nombre;?>')"><?php echo $nombre;?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="margin-right: 20px;"><?php echo $fecha;?></b>
							<p><?php echo $contenido;?></p>
							<?php
									if($imagen!=""){
								?>
									<img style="max-height: 150px; max-width: 150px; margin-left: auto;margin-right: auto;display: block;" src="<?php echo $imagen;?>">
									<br>
								<?php } ?>
						</form>
					</div>
					<hr>
					<?php
				}
			}
		?>

	</div>
</body>
</html>
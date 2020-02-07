<?php
$con=mysql_connect("localhost","id7171999_joranome","raulito48") or die("Error en la conexion");
mysql_select_db("id7171999_rs");
$yo=$_SESSION['nom'];
$qcolor=mysql_query("SELECT * from usuarios where nombre='$yo'",$con);
$color="";
$colorbg="#33e";
$colorfont="#000";
$colorhoverfont="";
			while($w=mysql_fetch_array($qcolor)){
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
			}
			if ($color=="#000") {
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
	<style type="text/css">
		#btnS{
			background-color: #f00;
			color:#faa;
		}
		#btnS:hover{
			background-color: #faa;
			color:#f00;
		}
		#btnC:hover{
			background-color: #888;
			color:#fff;
		}
		#btnC{
			background-color: #bbb;
			color:#000;
		}
		*{
			padding: 0px;
			margin:0px;
		}
		#header{
			margin:auto;
			width: 100%;
			height: 20px;
			font-family: Arial,Helvetica, sans-serif;
		}
		ul, ol {
			list-style: none;
		}
		.nav li a{
			background-color:  <?php echo $color; ?>;
			color: <?php echo $colorfont; ?>;
			text-decoration: none;
			padding: 10px 15px;
			display: block;
		}
		.nav li a:hover{
			background-color: <?php echo $colorbg; ?>;
			color: <?php echo $colorhoverfont; ?>;
		}
		.nav li ul{
			display: none;
			position: absolute;
			min-width: 140px;
		}
		.nav li:hover > ul{
			display: block;
		}

		.nav > li{
			float: left;
		}
		ul li{
			border-left: 2px solid;
		}

	</style>
</head>
<body>
	<!--Barra de menú-->
	<div>
		<form method="post" enctype="multipart/form-data">
			<?php
			$ide=$_SESSION['id'];?>
			<?php
			$qF=mysql_query("SELECT * from usuarios where id='$ide'",$con);
			while($row=mysql_fetch_array($qF)){
				$link=$row['img_perfil'];
			}
			if($link==""){
				$link="http://emser.es/wp-content/uploads/2016/08/usuario-sin-foto.png";
			}
			?>
			<div id="header">
		<ul class="nav">
		<li><a  style="border-bottom-right-radius: 20px;"><button name="btnMyImg"><img style="background-color: #fff;" src="<?php echo $link;?>" id="MyImg" width="30" height="30" onclick="window.open(this.src)"></button></a>
			<ul>
				<li><a href=""><input type="file" id="NewImg" name="NewImg"/>
			<button name="btnA">Aceptar</button></a></li>
				<li><a href="colors.php">Colores del tema</a></li>
			</ul>
		</li>
		<li><a style="height: 19px;" href="<?php echo 'inicio.php?amigolink='.$_SESSION['nom']; ?>"><?php echo $_SESSION['nom'];?></a></li>
		<li style="background-color: <?php echo $color; ?>; height: 39px;"><input type="text" name="TextToSearch" id="TextToSearch" placeholder="Buscar"><button name="btnB" style="background-color: #fff; border-radius: 20px;">Buscar</button>
			<ul><?php
					if(isset($_POST['btnB'])){
						$txtS=$_POST['TextToSearch'];
						if($txtS!=""){
							$comprobar=mysql_query("SELECT * From Usuarios where Nombre like '%".$txtS."%'",$con);
							if(mysql_num_rows($comprobar)>0){
								while($r=mysql_fetch_array($comprobar)){
									$l="index.php?amigolink=".$r['Nombre'];?>
										<li><a href="<?php echo $l; ?>"><?php echo $r['Nombre']; ?></a></li>
									
								<?php
								}
							}
							else{
							?>
									<li><a><?php echo "No se encontraron resultados" ?></a></li>
							<?php
						}
						}
					}
					?>
			</ul>
		</li> 
		<li style="min-width: 250px; height: 39px; background-color:  <?php echo $color; ?>;"></li>
		<li><a href="" style="height: 19px;">Solicitudes</a>
			<ul>
				<?php
				$nm=$_SESSION['nom'];
				$vsa=mysql_query("SELECT * From Solicitudes where Nombre_solicitado='$nm'",$con);
				while($row=mysql_fetch_array($vsa)){
					$nse=$row['Nombre_solicitante'];
				?>
				<form method="post" action="">
					<li>
						<input name="nse" readonly="readonly" value="<?php echo $nse; ?>"></input>
						<button name="btnSA">Aceptar</button>
						<button name="btnSD">Denegar</button>
					</li>
				</form>
			<?php } ?>
			</ul>
		</li>
		<?php
			$nombre=$_SESSION['nom'];
			$qvsn=mysql_query("SELECT * From Notificaciones where Nombre='$nombre'",$con);
				while($rowqvsn=mysql_fetch_array($qvsn)){
					$state=$rowqvsn['estado'];
					$colornotificaciones="#00F";
					if($state!=0){
						$colornotificaciones=$color;
					}
				}
		?>
		<li><a href="" style="background-color: <?php  echo $colornotificaciones; ?>; height: 19px;">Notificaciones</a>
			<ul>
				<?php
				$nm=$_SESSION['nom'];
				$vsn=mysql_query("SELECT * From Notificaciones where Nombre='$nm'",$con);
				while($rowvsn=mysql_fetch_array($vsn)){
					$idn=$rowvsn['id_noti'];
					$tit=$rowvsn['titulo'];
					$cont=$rowvsn['contenido'];
					$fechanoti=$rowvsn['fecha'];
					$estado=$rowvsn['estado'];
					if($estado==0){
						$clr="#00F";
					}else{
						$clr="#55F";
					}
				?>
				<form method="post" action="">
					<li style="background-color: <?php echo $clr; ?>">
						<a href="vernoti.php?id=<?php echo $idn; ?>"><p><?php
							echo $tit."   ".$fechanoti;
						?></p>
						<p><?php
							echo $cont;
						?></p></a>
					</li>
				</form>
			<?php } ?>
			</ul>
		</li>
		<li><a href="" style="height: 19px;">Mensajes</a>
			<ul>
				<li><a href="">1</a></li>
				<li><a href="">2</a></li>
				<li><a href="">3</a></li>
			</ul>
		</li>
		<li><a href="inicio.php" name="btnInicio" class="btnBM" style="height: 19px;" onclick="ocultar()">Inicio</a></li>
		<li><a id="btnC" href="" name="btnConfig" class="btnBM" style="height: 19px;">Configuración</a></li>
		<ul><li><a style="text-align: center;" id="btnS" style="height: 19px;" href="logout.php">Salir</a></li></ul>
		</ul></div>
		</form>
	</div>
</body>
</html>		
		<?php
		if(isset($_POST['btnSD'])){
			$noste=$_POST['nse'];
			$yo=$_SESSION['nom'];
			$qSD=mysql_query("DELETE From Solicitudes where (Nombre_solicitado='$yo' && Nombre_solicitante='$noste')",$con);
			if($qSD){
				?>
				<script type="text/javascript">
					alert("Solicitud Denegada");
				</script>
				<?php
			}
		}
		if(isset($_POST['btnSA'])){
			$nste=$_POST['nse'];
			$yo=$_SESSION['nom'];
			$inc=1;
			$qAS=mysql_query("INSERT INTO Amigos (nom1,nom2) values('$nste','$yo')",$con);
			if($qAS){
				$inc=2;
				header('Location: index.php');
			}
			$qSS=mysql_query("DELETE From Solicitudes where (Nombre_solicitado='$yo' && Nombre_solicitante='$nste')",$con);
			if($qSS && $inc=2){
				?>
				<script type="text/javascript">
					alert("Ahora tu y <?php echo $nste; ?> son amigos");
				</script>
				<?php
			
			$title="Solicitud Aceptada";
			$contenido=$yo." ha aceptado tu solicitud";
			$qAN=mysql_query("INSERT into Notificaciones (nombre,titulo,contenido,fecha) values('$nste','$title','$contenido',now())",$con);
			if($qAN){
				header('Location: index.php');
			}
		}}
		if(isset($_POST['btnA'])){
			$rFoto=$_FILES["NewImg"]["tmp_name"];
			$name=$_FILES["NewImg"]["name"];
			if(is_uploaded_file($rFoto)){
				$destino="ImagenesPerfil/".$name;
				copy($rFoto, $destino);
				$n=$_SESSION['nom'];
			$subir=mysql_query("UPDATE usuarios set img_perfil = '$destino' where Nombre='$n'",$con);
			if($subir){
				?>
				<script type="text/javascript">
					alert("Subida");
					header.Location="inicio.php";
				</script>
				<?php
			}else{
				?>
				<script type="text/javascript">
					alert("Error");
				</script>
				<?php
			}
			}else{
				?>
				<script type="text/javascript">
					alert("Error");
				</script>
				<?php
			}
		}
		?>

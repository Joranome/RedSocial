<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
					
				<?php
				$a=2;
				$NAL=$_GET['amigolink'];
				$queryAmigoLink=mysqli_query($con,"SELECT * FROM Publicaciones where Nombre='$NAL'");
				while($row=mysqli_fetch_array($queryAmigoLink)){
					$contenido=$row['contenido'];
					$nombre=$row['Nombre'];
					$fecha=$row['fechaP'];
					$imagen=$row['imagen'];
					?>
					<div id="pt">
						<form method="get">
							<button name="amigolink" id="amigolink" value="<?php echo $nombre;?>" onclick="x('<?php echo $nombre;?>')"> <?php echo $nombre;?></button> <?php echo $fecha;?>
							<p><?php echo $contenido;?></p>
						</form>
					</div>
					<hr>
					<?php
				}
</body>
</html>
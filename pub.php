<?php
session_start();
$con=mysqli_connect("localhost","root","","rs");
if(isset($_GET['comentario'])){
	?>

		<script type="text/javascript">
			alert("comentario on");
		</script>
	<?php
}
if(isset($_GET['comentario']) && isset($_GET['id'])){?>

									<script type="text/javascript">
										alert("Hola mundo");
									</script>
	<?php
	$yo=$_SESSION['nom'];
	$idpu=$_GET['id'];
	$coment=$_GET['comentario'];
	$qanc=mysqli_query($con,"INSERT into Comentarios (id_publicacion,nombre,contenido,fecha) VALUES('$idpu','$yo','$coment',now())");
	if($qanc){ ?>
		<script type="text/javascript">
			alert("Se ha comentado");
		</script>
		<?php
		header('Location: index.php');
	}
	else{ ?>
		<script type="text/javascript">
			alert("Error,no se ha comentado");
		</script>
		<?php
	}	} ?>
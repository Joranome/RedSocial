<?php
session_start();
$con=mysqli_connect("localhost","root","","rs");
	if(isset($_POST['Msoli'])){
		$nsolicitante=$_SESSION['nom'];
		$nsolicitado=$_SESSION['namigo'];
		$qMS=mysqli_query($con,"INSERT INTO Solicitudes (Nombre_solicitante,Nombre_solicitado) values('$nsolicitante','$nsolicitado')");
		if($qMS){
			?>
				<script type="text/javascript">
					alert("Ha mandado la solicitud de amistad");
				</script>
			<?php
			header('Location: index.php');
		}
	}
?>
<?php
//Like
session_start();
$con=mysqli_connect("localhost","root","","rs");
	if(isset($_GET['n']) && isset($_GET['idp']) && isset($_GET['est'])){
		$n=$_GET['n'];
		$yo=$_SESSION['nom'];
		$idp=$_GET['idp'];
		$est=$_GET['est'];
		if($est=="Me gusta"){
			$queryaggLike=mysqli_query($con,"INSERT INTO LIKES (id_publicacion,nombre_dl,nombre_rl) VALUES('$idp','$yo','$n')");
			if($queryaggLike){
				header('Location: index.php');
			}else{
				?>
				<script type="text/javascript">
					alert("Error");
				</script>
				<?php
			}
		}
		elseif($est=="Ya no me gusta"){
			$queryaggLike=mysqli_query($con,"DELETE FROM LIKES where id_publicacion='$idp' and nombre_dl = '$yo' and nombre_rl='$n'");
			if($queryaggLike){
				header('Location: index.php');
			}else{
				?>
				<script type="text/javascript">
					alert("Error");
				</script>
				<?php
			}
		}
	}
?>
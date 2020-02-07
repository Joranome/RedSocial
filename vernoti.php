<?php 
	$con=mysqli_connect("localhost","root","","rs");
	if($_GET['id']){
		$id_n=$_GET['id'];
		$qMEN=mysqli_query($con,"UPDATE Notificaciones set estado=1 where id_noti='$id_n'");
		if($qMEN){
			header('Location: index.php');
		}
	}
?>
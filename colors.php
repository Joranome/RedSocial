<?php
	session_start();
	$con=mysqli_connect("localhost","root","","rs");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Colores</title>
	<style type="text/css">
		button{
			cursor: pointer;
		}
	</style>
</head>
<body>
				<button onclick="f(this.value)" style="background-color: #00f;" value="Azul" name="Azul">Azul</button>
				<button onclick="f(this.value)" style="background-color: #f00;" value="Rojo" name="Rojo">Rojo</button>
				<button onclick="f(this.value)" style="background-color: #0f0;" value="Verde" name="Verde">Verde</button>
				<button onclick="f(this.value)" style="background-color: #f0f;" value="Rosa" name="Rosa">Rosa</button>
				<button onclick="f(this.value)" style="background-color: #0ff;" value="Celeste" name="Celeste">Celeste</button>
				<button onclick="f(this.value)" style="background-color: #ff0;" value="Amarillo" name="Amarillo">Amarillo</button>
				<button onclick="f(this.value)" style="background-color: #fff;" value="Blanco" name="Blanco">Blanco</button>
				<button onclick="f(this.value)" style="background-color: #000;color:#fff;" value="Negro" name="Negro">Negro</button>
				<button onclick="f(this.value)" style="background-color: #999;" value="Gris" name="Gris">Gris</button>
				<button onclick="f(this.value)" style="background-color: #909;" value="Lila" name="Lila">Lila</button>
				<button onclick="f(this.value)" style="background-color: #990;" value="Cafe" name="Cafe">Cafe</button>
				<button onclick="f(this.value)" style="background-color: #900;" value="Tinto" name="Tinto">Tinto</button>
			<script type="text/javascript">
				function f(a){
					location.replace('colors.php?color='+a);
				}
			</script>
			<?php
			if(isset($_GET['color'])){
				$c=$_GET['color'];
				$color="";
				if($c=="Azul"){
					$color="#00F";
				}elseif($c=="Rojo"){
					$color="#F00";
				}elseif($c=="Verde"){
					$color="#0F0";
				}elseif($c=="Rosa"){
					$color="#F0F";
				}elseif($c=="Celeste"){
					$color="#0FF";
				}elseif($c=="Amarillo"){
					$color="#FF0";
				}elseif($c=="Blanco"){
					$color="#FFF";
				}elseif($c=="Negro"){
					$color="#000";
				}elseif($c=="Gris"){
					$color="#999";
				}elseif($c=="Lila"){
					$color="#909";
				}elseif($c=="Cafe"){
					$color="#990";
				}elseif($c=="Tinto"){
					$color="#900";
				}
				$yo=$_SESSION['nom'];
				$qIC=mysqli_query($con,"UPDATE Usuarios set color='$color' where Nombre='$yo'");
				if($qIC){
					?>
					<script type="text/javascript">
						alert("<?php echo $yo."---".$color; ?>");
					</script>
					<?php
					header('Location: index.php');
				}else{
					?>
					<script type="text/javascript">
						alert("Error");
					</script>
					<?php
				}
			}
			?>
</body>
</html>
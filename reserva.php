<?php
	## Eliminar Reserva
	## @autor : Bryan Soto
	## @fecha : revision 19/08
	

	header ('Content-type: text/html; charset=ISO-8859-1');
	session_start();
	include('conexionbd.php');     
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="keywords" content="">
	    <meta name="description" content="">
	    <link rel="shortcut icon" type="image/png" href="img/LOGO2.png" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
	    <link rel="stylesheet" id="ppstyle" type="text/css" href="style.css">
	    <link rel='stylesheet' href='./css/font-awesome.min.css'/><link rel='stylesheet' href='./css/ionicons.min.css'/><link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	    <script src="./js/jquery-2.1.0.min.js"></script>
	    <script src="./js/bootstrap.js"></script>
	    <script src="./js/blocs.js"></script>
	    <script src='./js/jqBootstrapValidation.js'></script>
		<script type="text/javascript">
			function refresh (argument) {
				window.opener.location.reload();
			}
		</script>
		<title>Reserva Cancha</title>
	</head>
	<body>

		<?php
				
			$id_h=$_GET['id_horario'];
		?>
		<form class="form-horizontal text-center" role="form" id="registro_reserva" name="regReserva" 
		method="POST" action="confirma_reserva.php" onsubmit="refresh();">
		<div class="container" name="reserva">
			<h2 class="text-center">Reserva Cancha</h2>
				<div class="row">
				    <input type="hidden" name="id_horario" <?php echo "value='".$id_h."'"?>>	
					<input type="hidden" name="rut" <?php echo "value='".$_SESSION['rut']."'"?>>	
				      	<?php 
				      	$con=mysqli_connect($host,$user,$pass,$db); 
				      		

				      	?>
				        	<div class="form-group">
				        		<h4>
					        		<br>
					        		<?php
					        			$result=mysqli_query($con,"CALL datos_horario($id_h)");
										if ($row=mysqli_fetch_array($result)) {
											echo "Fecha:".$row[0];
										}
					        		?>
										
									<br><br>
										Reservante: <?php echo $_SESSION['nombre'];?>
									<br><br>
									<?php
										$con2=mysqli_connect($host,$user,$pass,$db); 
										$result=mysqli_query($con2,"SELECT precio_horario($id_h)");
										if ($row=mysqli_fetch_array($result)) {
											echo "Precio: $ ".$row[0];
										}
									?>
									<br><br>
				<input type="submit" class="btn btn-success" value="Reservar">
				</h4>
			</form>
		</div>

		<?php
			mysqli_close($con);
			mysqli_close($con2);
		?>
	</body>
</html>
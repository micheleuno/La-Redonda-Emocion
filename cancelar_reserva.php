<?php
	
	## Registro Registro de Cancha en BD.
	## @autor : Bryan Soto
	## @fecha : revision 12/08
	## @obs: 

	
	

	include("conexionbd.php");

	$id=$_POST['id_horario'];

	$result=mysqli_query($conexion,"CALL datos_horario($id)");
		

		$resp = mysqli_fetch_row($result);

		
			$aux = mysqli_connect($host,$user,$pass,$db);
			$res=mysqli_query($aux,"SELECT cancelar_reserva($id)");
			echo "<script>
			alert('Reserva Cancelada Exitosamente');
			window.location.href='perfil_cancha.php?idc=$_POST[idc]';
			</script>";
		
?>
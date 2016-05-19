<?php
	## Registro Registro de Cancha en BD.
	## @autor : Victor Toledo
	## @fecha : revision 12/08
	## @obs: 
	include("conexionbd.php");

	$estado = array (
        "exito" => 0,
        "error" => 0,
        "error_msg" => ""
    );

	if(isset($_POST['numero']))
	{
		$reg = mysqli_query($conexion,"SELECT editar_cancha('$_POST[id_cancha]','$_POST[numero]','$_POST[cantidad]',
		'$_POST[precio_noche]','$_POST[precio_dia]');"); 
		
		if(!$reg)
		{
			$estado["error"] = 1;
			$estado["error_msg"] = "Error al registrar cancha";
			echo json_encode($estado);
		}
		else
		{
			$resp = mysqli_fetch_row($reg);
			if($resp[0]==1)
			{
				$estado["exito"] = 1;
				echo json_encode($estado);
			}
		}
	}

	mysqli_close($conexion);
?>
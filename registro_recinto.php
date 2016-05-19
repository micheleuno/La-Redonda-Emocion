<?php
	##Registro Recinto
	##@autor : Victor Toledo
	##fecha : 15/06/15

	
	include("conexionbd.php");
	session_start();

	$estado = array (
        "exito" => 0,
        "error" => 0,
        "error_msg" => ""
    );

	if(isset($_POST['nombre']))
	{

		$registro=mysqli_query($conexion,"SELECT insertar_recinto('$_SESSION[rut]','$_POST[direccion]',
		'$_POST[telefono]','$_POST[nombre]','$_POST[correo]','$_POST[comuna]','$_POST[cx]',
		'$_POST[cy]');");

		if(!$registro)
		{
			$estado["error"] = 2;
			$estado["error_msg"] = "Error de consulta";
			echo json_encode($estado);
		}
		else
		{
			$resp=mysqli_fetch_row($registro);
			if($resp[0]==0)
			{
				$estado["error"] = 1;
				$estado["error_msg"] = "No se pudo registrar recinto";
				echo json_encode($estado);
			}
			else{
				$estado["exito"] = 1;
				echo json_encode($estado);
			}	
		}
	}

	mysqli_close($conexion);
?>
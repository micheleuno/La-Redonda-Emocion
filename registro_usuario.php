<?php

	## Registro en bd de usuario/administrador
	## @autor : Victor Toledo
	## @fecha : 25/11

	include("conexionbd.php");
	require_once 'funciones.php';
	
    $estado = array (
        "exito" => 0,
        "error" => 0,
        "error_msg" => ""
    );
      
    if(isset($_POST['rut']))
	{
		$ruts = separar_rut($_POST['rut']);
    	$dv = separar_dv($_POST['rut']);

    	$rut = implode("",$ruts);

    	$consulta=mysqli_query($conexion,"SELECT confirmar_registro('$_POST[tipo]','$rut');"); 

		if(!$consulta)
		{
			$estado["error"] = 1;
			$estado["error_msg"] = "Error en conectar al servidor, intentelo luego";
			echo json_encode($estado) ;
		}
		else
		{
			$resp=mysqli_fetch_row($consulta);

			if($resp[0]==0){

				$registro=mysqli_query($conexion,"SELECT ingresar_persona('$_POST[tipo]','$rut','$dv',
				'$_POST[nombre]','$_POST[email]','$_POST[bday]','$_POST[fono]','$_POST[contra]');");

				if(!$registro){

					$estado["error"] = 2;
					$estado["error_msg"] = "Error en conectar al servidor, intentelo luego";
					echo json_encode($estado);
				}
				else
				{
					$rep=mysqli_fetch_row($registro);

					if($rep[0]==1)
					{
						$estado["exito"] = $_POST['tipo']; 
		            	echo json_encode($estado);
					} 
					else
					{
						$estado["error"] = 1;
						$estado["error_msg"] = "Usuario ya registrado";
						echo json_encode($estado);
					}
				}
			}
			else if($resp[0]==1)
			{
				$estado["error"] = 1;
				$estado["error_msg"] = $_POST['tipo'];
				echo json_encode($estado);
			}
		}
	}

	mysqli_close($conexion);
?>
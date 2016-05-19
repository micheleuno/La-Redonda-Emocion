<?php 

	include("conexionbd.php");
	require_once 'funciones.php';

	$estado = array (
        "exito" => 0,
        "error" => 0,
        "error_msg" => ""
    );

	if(isset($_POST["rut"]))
    {
    	$ruts = separar_rut($_POST["rut"]);
    	$dv  = separar_dv($_POST["rut"]);

    	$rut = implode("",$ruts);

    	$resultado = mysqli_query($conexion,"CALL mail_por_rut('$_POST[tipo]','$rut');");

    	if(!$resultado)
    	{
    		$estado["error"] = 1;
    		$estado["error_msg"] = "Error en conectar al servidor, intentelo luego";
			echo json_encode($estado);
    	}
    	else
    	{
    		$row=mysqli_fetch_row($resultado);
    		if(mysqli_num_rows($resultado)!=0)
    		{
    			$destinatario = $row[0]; 
				$asunto = "Recuperacion de contraseña"; 
				$cuerpo = 'Estimado Usuario, su contraseña es: '.$row[1].". Le Recomendamos cambiarla lo más antes posible, Saludos";

				//dirección del remitente 
				$headers .= "From: laredondaemocion <laredondaemocionchile@gmail.com>\r\n"; 


				//ruta del mensaje desde origen a destino 
				$headers .= "Return-path: laredondaemocionchile@gmail.com\r\n"; 
	 
	 
				mail($destinatario,$asunto,$cuerpo,$headers);

				$estado["exito"] = 1;

                
				echo json_encode($estado);
 			}
 			else
 			{
 				$estado["error"] = 2;
	    		$estado["error_msg"] = "Combinación RUT/Contraseña no registrada";
				echo json_encode($estado);
 			}
    	}
    }
    mysqli_close($conexion);
?>
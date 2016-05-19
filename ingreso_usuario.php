<?php

	## Ingreso al sistema
	## @autor : Victor Toledo
	## @fecha : 27/11
	## obs:

	include("conexionbd.php");
	require_once 'funciones.php';

	$estado = array (
        "exito" => 0,
        "error" => 0,
        "error_msg" => "",
        "tipo" => 0
    );

    if(isset($_POST["rut"]))
    {
    	$ruts = separar_rut($_POST["rut"]);
    	$dv  = separar_dv($_POST["rut"]);

    	$rut = implode("",$ruts);

    	$resultado=mysqli_query($conexion,"SELECT confirmar_ingreso('$_POST[tipo]','$rut',
		'$_POST[contra]');");

    	if(!$resultado)
    	{
    		$estado["error"] = 1;
    		$estado["error_msg"] = "Error en conectar al servidor, intentelo luego";
			echo json_encode($estado);
    	}
    	else
    	{
    		$row=mysqli_fetch_row($resultado);
    		if($row[0]==1)
    		{
    			if($_POST['tipo']==2){
					$sql="CALL nombre_usuario_rut($rut);";
				}else{
					$sql="CALL nombre_administrador_rut($rut);";
				}

				$res=mysqli_query($conexion,$sql);
				$nom=mysqli_fetch_array($res);

				$estado["exito"] = 1;
				$estado["tipo"] = $_POST['tipo'];

				session_start();
				$_SESSION["rut"] = $rut;
                $_SESSION["dv"] = $dv;
				$_SESSION["nombre"] = $nom[0];
                $_SESSION["tipo"] = $_POST['tipo'];

                if($_POST['tipo']==1)
                {
                    $_SESSION["tipe"] = "Administrador";
                }
                else
                {
                    $_SESSION["tipe"] = "Usuario";
                }
                
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
<?php

	## Registro en bd de usuario/administrador
	## @autor : Victor Toledo
	## @fecha : 25/11

	include("conexionbd.php");
	require_once 'funciones.php';
	session_start();
    $estado = array (
        "exito" => 0,
        "error" => 0,
        "error_msg" => ""
    );
      
    if(isset($_SESSION['rut']))
	{
		if($_SESSION['tipo']==1)
		{
			$registro=mysqli_query($conexion,"SELECT editar_administrador('$_SESSION[rut]',
			'$_POST[nombre]','$_POST[email]','$_POST[bday]','$_POST[fono]','$_POST[contra1]');");
		}else{
			$registro=mysqli_query($conexion,"SELECT editar_usuario('$_SESSION[rut]',
			'$_POST[nombre]','$_POST[email]','$_POST[bday]','$_POST[fono]','$_POST[contra1]');");
		}

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
		 		$estado["exito"] = $_SESSION['tipo']; 
            	echo json_encode($estado);
			}
			
		}
	
	}
	

	mysqli_close($conexion);
?>
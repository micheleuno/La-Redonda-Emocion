<?php

	include("conexionbd.php");
	session_start();

   	if (isset ($_FILES["img"])) 
   	{

		if($_SESSION['tipo']==1)
		{
			$ruta= "/home/laredond/public_html/img/perfiles/admin"."/".$_SESSION['rut'];
			 
			if(move_uploaded_file($_FILES['img']['tmp_name'],$ruta))
			{
				echo "<script>
               window.location.href='perfil_admin.php';
               </script>";
			}
			
		}
		if($_SESSION['tipo']==2)
		{
			$ruta= "/home/laredond/public_html/img/perfiles/user"."/".$_SESSION['rut'];

		
		    if(move_uploaded_file($_FILES['img']['tmp_name'],$ruta))
			{
				echo "<script>
               window.location.href='perfil_usuario.php';
               </script>";
			}
			
		}
	}
?>
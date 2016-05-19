 <?php
 session_start();
 include("conexionbd.php");

 			$auxi = mysqli_connect($host,$user,$pass,$db);
            $resultado=mysqli_query($auxi,"SELECT agregar_favorito($_SESSION[rut],$_GET[idc]);")
            or die(mysqli_error($auxi));
 echo "<script>
 
 window.location='perfil_cancha.php?idc=$_GET[idc]';
 </script>";
 ?>
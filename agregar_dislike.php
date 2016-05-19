 <?php
 session_start();
 include("conexionbd.php");

 			$auxi = mysqli_connect($host,$user,$pass,$db);
            $resultado=mysqli_query($auxi,"SELECT dar_dislike($_GET[idc],$_SESSION[rut]);")
            or die(mysqli_error($auxi));
 echo "<script>
 
 window.location='perfil_cancha.php?idc=$_GET[idc]';
 </script>";
 ?>
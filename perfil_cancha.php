<?php 
  session_start();
  include("conexionbd.php");
?>
<!doctype html>
<html>
<head>
    <?php include("head_comun.php");?>
     <link href="/barIndicator/css/bi-style.css" rel="stylesheet" />
     <script src="/jquery-2.1.4.js"></script>
     <script src="/barIndicator/jquery-barIndicator.js"></script>
    <script>
        var opt = {
         foreColor:'#e25a48',
         backColor:'rgb(126,196,107)'
        };
        $('#bar').barIndicator(opt);

    function registro_final(registro) {
        var fecha=document.getElementById("horita"+registro).value;
        var valor=document.getElementById("valor"+registro).value;
        document.getElementById("horario_f").value=registro;
        document.getElementById("precio_final").innerHTML='$'+valor;
        document.getElementById("fecha_final").innerHTML=fecha;
        openVentana3();
    }
    function info_reserv(registro){
        var fecha=document.getElementById("horita"+registro).value;
        var valor=document.getElementById("valor"+registro).value;
        var reservante=document.getElementById("reserv"+registro).value;
        var telefono=document.getElementById("telefono"+registro).value;
        document.getElementById("horario_f2").value=registro;
        document.getElementById("precio_final2").innerHTML='$'+valor;
        document.getElementById("fecha_final2").innerHTML=fecha;
        document.getElementById("reserv2").innerHTML=reservante;
        document.getElementById("telefono").innerHTML=telefono;
        openVentana4();
    }
    function enviarformulario(){
      document.getElementById("fomulario_final").submit();
    }
    function enviarformulario2(){
      document.getElementById("fomulario_info").submit();
    }
    function openVentana3() {
                  
        $(".ventana3").slideDown("fast");
    }
    function closeVentana3() {
        $(".ventana3").slideUp("fast");
    }
    function openVentana4() {
                
        $(".ventana4").slideDown("fast");
    }
    function closeVentana4() {
        $(".ventana4").slideUp("fast");
    }
    </script>


    <script type="text/javascript">
    
     
     

      $(document).ready( function() {
        $("a[rel='pop-up']").click(function () {
          nueva=window.open(this.href, 'Reserva','height=700,width=800,resizable=false,scrollbars=true,location=false');
          return false;
        });

      });

      $(document).ready( function() {
        $("a[rel='pop']").click(function () {
          nuevo=window.open(this.href, 'Info-Reserva','height=700,width=800,resizable=false,scrollbars=true,location=false');
          return false;
        });
      });


        function openfileDialog() {
        $("#fileLoader").click();
        }
  

    </script>
	<script src='./js/formHandler.js'></script>
    <title>Perfil Cancha</title>
</head>
<body>
<!-- Main container -->
<div class="page-container">
    <?php include("menu_comun.php");?>
    <!-- perfil-cancha --><div class="bloc tc-napier-green bgc-mint-cream l-bloc" id="perfil-cancha">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-5">
				<h3 class="mg-md tc-napier-green">
					Especificaciones Cancha:
				</h3>
				<div class="panel bgc-mint-cream">
					<div class="panel-body">
						<ul class="list-unstyled">
							<li>
                <?php 
                if($_SESSION['tipo']==2){
                        $auxi1= mysqli_connect($host,$user,$pass,$db);
                              $resultado3=mysqli_query($auxi1,"SELECT es_favorito($_SESSION[rut],$_GET[idc]);")
                              or die(mysqli_error($auxi1));
                if($raw=mysqli_fetch_array($resultado3)){
                  if ($raw[0]==1) {
                  echo "<a href='eliminar_favorito.php?idc=$_GET[idc]'; ><span class='fa fa-heart icon-md pull-left' style='color:green;' data-placement='top' data-toggle='tooltip' title='Eliminar de favoritos'></span></a>"  ;
                  }else{
                  echo "<a href='agregar_favoritos.php?idc=$_GET[idc]'; ><span class='fa fa-heart-o icon-md pull-left' style='color:green;' data-placement='top' data-toggle='tooltip' title='Añadir a favoritos'></span></a>";
                  }
                }
                mysqli_close($auxi1);
                }
                ?>
								<form id="form-1487" novalidate>
									<div class="form-group">
										<?php
                			                $auxi = mysqli_connect($host,$user,$pass,$db);
							                $resultado=mysqli_query($auxi,"CALL datos_cancha('$_GET[idc]');")
							                or die(mysqli_error($auxi));

							                if(!($rew=mysqli_fetch_array($resultado))) 
							                

							                  ?>
										<label>
											Numero de Cancha: # <?php echo "$rew[numero_cancha]";?>
										</label>
									</div>
								</form>
							</li>
							<li>
								<form id="form-1616" novalidate>
									<div class="form-group">
										<label>
											Tipo de Cancha: <?php echo "$rew[tipo_cancha]";?>
										</label>
									</div>
								</form>
							</li>
							<li>
								<form id="form-1231" novalidate>
									<div class="form-group">
										<label>
											Superficie: <?php echo "$rew[superficie]";?>
										</label>
									</div>
									<ul class="list-unstyled">
										<li>
											<div class="form-group">
												<label>
													Jugadores por lado: <?php echo "$rew[jugadores_lado]";?>
												</label>
											</div>
										</li>
										<li>
											<div class="form-group">
												<label>
													Precio Horario Diurno: <?php echo "$ $rew[precio_cancha_hora_dia]";?>
												</label>
											</div>
										</li>
										<li>
											<div class="form-group">
												<label>
													Precio Horario Nocturno: <?php echo "$ $rew[precio_cancha_hora_noche]";?>
												</label>
											<?php
							                
							                mysqli_close($auxi);
							              ?>
											</div>
										</li>
                    <li>
                      <div class="form-group">
                    <?php
                      if($_SESSION['tipo']==2){?>
                        
                        <?php
                       
                        $auxi13= mysqli_connect($host,$user,$pass,$db);
                              $resultado33=mysqli_query($auxi13,"SELECT verificar_puntuacion($_GET[idc],$_SESSION[rut]);")
                              or die(mysqli_error($auxi13));
                       if($raw4=mysqli_fetch_array($resultado33)){
                        if($raw4[0]==1){
                          
                          echo "<a href='agregar_like.php?idc=$_GET[idc]'; ><span class='fa fa-thumbs-up icon-md pull-left' style='color:green;' data-placement='top' data-toggle='tooltip' title='Like'></span></a>"  ;  
                          echo "<a href='agregar_dislike.php?idc=$_GET[idc]'; ><span class='fa fa-thumbs-o-down icon-md pull-left' style='color:green;' data-placement='top' data-toggle='tooltip' title='Dislike'></span></a>"  ;  
                         }else if ($raw4[0]==0) {
                          
                          echo "<a href='agregar_like.php?idc=$_GET[idc]'; ><span class='fa fa-thumbs-o-up icon-md pull-left' style='color:green;' data-placement='top' data-toggle='tooltip' title='Like'></span></a>"  ;  
                          echo "<a href='agregar_dislike.php?idc=$_GET[idc]'; ><span class='fa fa-thumbs-down icon-md pull-left' style='color:green;' data-placement='top' data-toggle='tooltip' title='Dislike'></span></a>"  ;  
                         }else{

                          echo "<a href='agregar_like.php?idc=$_GET[idc]'; ><span class='fa fa-thumbs-o-up icon-md pull-left' style='color:green;' data-placement='top' data-toggle='tooltip' title='Like'></span></a>"  ;  
                          echo "<a href='agregar_dislike.php?idc=$_GET[idc]'; ><span class='fa fa-thumbs-o-down icon-md pull-left' style='color:green;' data-placement='top' data-toggle='tooltip' title='Dislike'></span></a>"  ;  
                         }
                             
                       }
                       }
                      mysqli_close($auxi13);

                      
                      ?>
                     </div>
                    </li> 
									</ul>
								</form>
							</li>
						</ul>
					</div>
				</div>
				<?php

					if(isset($_SESSION['rut']) && $_SESSION['tipo']==1){
 
                        $aux1 = mysqli_connect($host,$user,$pass,$db);
                        $resultado1=mysqli_query($aux1,"SELECT administrador_de_cancha($_SESSION[rut],$_GET[idc]);") 
                        or die(mysqli_error($aux1));
                        if ($row1=mysqli_fetch_array($resultado1)) {
  
                          if ($row1[0]==1) {
                           		echo "<a href='editar-cancha.php?idc=$_GET[idc]' class='btn (null) btn-napier-green'><span class='fa fa-cog icon-spacer'></span>Editar Cancha</a>";
                           }
                          
                        }
                      }
                       mysqli_close($aux1);
				?>
				
			</div>
			<div class="col-sm-7">
				<h3 class="mg-md tc-napier-green">
					Imagenes
				</h3>
        <div id="imagenes-recinto" class="carousel no-shadows slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php

                  $recimag = mysqli_connect($host,$user,$pass,$db);

                  $casrb = mysqli_query($recimag,"CALL multimedias_cancha('$_GET[idc]');") or die(mysqli_error($casrb));

                  $ronald = 0;
                  while($eng=mysqli_fetch_array($casrb))
                  {
                    if($ronald==0)
                    {
                      echo '<li data-target="#imagenes-recinto" data-slide-to="'.$ronald.'" class="active">
                    </li>';  
                    }
                    else
                    {
                      echo '<li data-target="#imagenes-recinto" data-slide-to="'.$ronald.'">
                    </li>';
                    }
                    
                    $ronald++;
                  }
                  mysqli_close($recimag);
                ?>
              </ol>
              <div class="carousel-inner">
                <?php

                  $recimag2 = mysqli_connect($host,$user,$pass,$db);

                  $casrb2 = mysqli_query($recimag2,"CALL multimedias_cancha('$_GET[idc]');") or die(mysqli_error($casrb2));

                  $ronaldo = 0;

                  while($eng2=mysqli_fetch_array($casrb2))
                  {
                    if($ronaldo==0)
                    {
                      echo '<div class="item active">';
                      echo "<IMG SRC=".$eng2['direccion']." />" ;
                      echo '
                      <div class="carousel-caption">
                      </div>
                      </div>';
                    }
                    else
                    {
                      echo '<div class="item">';
                      echo "<IMG SRC=".$eng2['direccion']." />" ;
                      echo '
                      <div class="carousel-caption">
                      </div>
                      </div>'; 
                    }
                    $ronaldo++;
                  }
                  mysqli_close($casrb2);
                ?>
              </div>

              <a class="left carousel-control" href="#imagenes-recinto" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#imagenes-recinto" role="button" data-slide="next"><span class="fa fa-chevron-right"></span><span class="sr-only">Next</span></a>
            </div>
					
        <?php
            if(isset($_SESSION['rut']) && $_SESSION['tipo']==1){
                            $aux1 = mysqli_connect($host,$user,$pass,$db);
                            $resultado1=mysqli_query($aux1,"SELECT administrador_de_cancha($_SESSION[rut],$_GET[idc]);") 
                            or die(mysqli_error($aux1));
                            if ($row1=mysqli_fetch_array($resultado1)) {  
                              if ($row1[0]==1) {
                               ?>
                               <form name="cargador" id="cargador" method="post" action="subida_cancha.php" enctype="multipart/form-data">
                                <input type="text" name="cancha"  hidden value=<?php echo $_GET['idc'];?>>
                                <input type="file" id="fileLoader" name="img[]" style="width:0; height:0;" multiple accept="image/*" title="Load File" onchange="javascript:this.form.submit();" />
                              </form>
                                <span class="fa fa-image icon-md pull-left icon-napier-green" data-placement="right" data-toggle="tooltip" title="Añadir imágenes" id="icanchas"></span>
                               <?php

                              }
                              
                            }
                          }
                          mysqli_close($aux1);
            ?>
        
			   </div>
        </div>
      </div>
		</div>
	</div>
</div><!-- perfil-cancha END --><!-- horario --><div class="bloc bgc-mint-cream l-bloc" id="horario">
	<div class="container b-divider bloc-xl">
		<div class="row">
			<div class="col-sm-12" >
				<h3 class="mg-md text-center  tc-napier-green">
					Calendario de Reservas
				</h3>
				<div class="panel">
					<div class="panel-body">
						<span class="empty-column" style=" overflow-y:scroll; height: 500px; weight:300px;">
							<table>
								<tr>
                    <td>Hora</td>
                    <?php
                      $time = time();
                      $cont=0;  
                      for($i=(date("N", $time)-1); $i<7;$i++){
                      $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
                      $fecha = $dias[$i];

                      echo "<td>$fecha<br>".($cont+date("d", $time)).date("-M", $time)."</td>";
                      $cont++;
                      }
                      for ($x=0; $x <(date("N", $time)-1) ; $x++) { 
                        $fecha = $dias[$x];
                        if ($cont+date("d", $time)<32) {
                        	echo "<td>$fecha<br>".($cont+date("d", $time)).date("-M", $time)."</td>";
                        }else{
                        	echo "<td>$fecha<br>".(date("d", $time)).date("-M", $time)."</td>";
                        }

                        
                        $cont++;
                      }
                    ?>
                  </tr>

                  <?php

                    $conexion_aux = mysqli_connect($host,$user,$pass,$db);  
                    if (isset($_SESSION['rut'])) {
                      $rut=$_SESSION['rut'];
                      $idc=$_GET['idc'];

                      $resultado=mysqli_query($conexion_aux,"SELECT administrador_de_cancha($rut,$idc)") 
                      or die(mysqli_error($conexion_aux));
                        
                      if($row=mysqli_fetch_array($resultado)){
                        $admin=$row[0];
                      }
                      mysqli_close($conexion_aux);
                    }

                    for ($i=0; $i <=22 ; $i++){ 
                      echo "<tr> <td>$i:00-".($i+1).":00</td>";
                      for ($l=1; $l <=7 ; $l++) { 

                        if (empty($_SESSION['tipo'])) {
                          echo "<td><a href='ingreso.php?idc=$_GET[idc]' class='btn btn-info col-md-11'>Registrarse</a></td>";
                        }else if ($_SESSION['tipo']==1 && $admin==1 ) { // If que dice ser Arministrador de la cancha.

                          $aux = mysqli_connect($host,$user,$pass,$db);

                          $resultado=mysqli_query($aux,"CALL `horario_cancha`($idc,$l,$i)") or die(mysqli_error($aux));

                          if($row=mysqli_fetch_array($resultado)){
                                
                            $id_hora=$row['idhorario'];
                              $hora=$row['fecha'];
    
                            if ($row['diaonoche']==2) {
                              echo "<td>
                              <h5 class='btn btn-danger col-md-11' disabled>CERRADO</h5>
                              </td>";
                            }else if($row['diaonoche']==1 || $row['diaonoche']==0){

                              if($row[1]==0){
                                echo "<td><a class='btn btn-electric-blue col-md-11' disabled>  Libre  </a></td>";
                              }else{

                                $con_res = mysqli_connect($host,$user,$pass,$db);
                                $resultad=mysqli_query($con_res,"CALL datos_usuario_idhorario($id_hora)");
                                $resp = mysqli_fetch_array($resultad);
                                
                                    echo "<form id='$id_hora'>";
                                    echo "<input type='hidden' id='horita".$id_hora."' value='$hora'>";
                                    echo "<input type='hidden' id='reserv".$id_hora."' value='$resp[nombre_usuario]'>";
                                    echo "<input type='hidden' id='telefono".$id_hora."' value='$resp[telefono_usuario]'>";
                                    if ($row['diaonoche']==0) {
                                      echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_dia]'>";
                                    }else{
                                      echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_noche]'>";
                                    }
                                    echo "</form>";
                                    echo "<td><input type='button' onclick='Javascript: info_reserv($id_hora);' class='btn btn-electric-blue col-md-11' value='Reservada'></input></td>";
                    
                              }
                            }
                          }
                          }else if ($_SESSION['tipo']==1 && $admin==0 ) {//If que dice ser administrador pero no de esta cancha
                            echo "<td><a class='btn btn-carrot-orange col-md-11' disabled>No Disponible</a></td>";
                          }else if ($_SESSION['tipo']==2) { // if que dice ser usuario
                            $aux = mysqli_connect($host,$user,$pass,$db);
                            $resultado=mysqli_query($aux,"CALL `horario_cancha`($idc,$l,$i);");
                            if($row=mysqli_fetch_array($resultado)){
                              $id_hora=$row['idhorario'];
                              $hora=$row['fecha'];

                              if ($row['diaonoche']==2) {
                                echo "<td>
                                <h5 class='btn btn-danger col-md-11' disabled>CERRADO</h5>
                                </td>";
                              }else if($row['diaonoche']==1 || $row['diaonoche']==0  ){

                                if($row[1]==0){
                                  echo "<form id='$id_hora'>";
                                  echo "<input type='hidden' id='horita".$id_hora."' value='$hora'>";
                                  if ($row['diaonoche']==0) {
                                    echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_dia]'>";
                                  }else{
                                    echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_noche]'>";
                                  }
                                  echo "</form>";
                                  echo "<td><input type='button' onclick='Javascript: registro_final($id_hora);' class='btn (null) btn-napier-green col-md-11' value='Reservar'></input></td>";
                                }else{
                                  $con_res = mysqli_connect($host,$user,$pass,$db);
                                  $resultad=mysqli_query($con_res,"CALL datos_usuario_idhorario($id_hora)");
                                  $resp = mysqli_fetch_array($resultad);
                                  
                                  if(!empty($resp['rut_usuario']) && $resp['rut_usuario']==$_SESSION['rut'] ){
                                    echo "<form id='$id_hora'>";
                                    echo "<input type='hidden' id='horita".$id_hora."' value='$hora'>";
                                    echo "<input type='hidden' id='reserv".$id_hora."' value='$resp[nombre_usuario]'>";
                                    echo "<input type='hidden' id='telefono".$id_hora."' value='$resp[telefono_usuario]'>";
                                    if ($row['diaonoche']==0) {
                                      echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_dia]'>";
                                    }else{
                                      echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_noche]'>";
                                    }
                                    echo "</form>";
                                    echo "<td><input type='button' onclick='Javascript: info_reserv($id_hora);' class='btn btn-electric-blue col-md-11' value='Reservada'></input></td>";
                                  }else{  
                                    echo "<td>
                                    <a class='btn btn-danger col-md-11' disabled>Reservada</a>
                                    </td>";
                                  }
                                  
                                }
                              }
                            }
                          }
                        }
                        echo "</tr>";
                      }

                      echo "<tr><td>23:00-00:00</td>";
                      for ($l=1; $l <=7 ; $l++) { 
                        if (empty($_SESSION['tipo'])) {
                          echo "<td><a href='ingreso.php' class='btn btn-info col-md-11'>Registrarse</a></td>";
                        }else if ($_SESSION['tipo']==1 && $admin==1 ) {// If que dice ser Arministrador de la cancha.
                          $aux = mysqli_connect($host,$user,$pass,$db);

                          $resultado=mysqli_query($aux,"CALL `horario_cancha`($idc,$l,$i)") or die(mysqli_error($aux));

                          if($row=mysqli_fetch_array($resultado)){
                            $id_hora=$row['idhorario'];
                            $hora=$row['fecha'];    
                            if ($row['diaonoche']==2) {
                              echo "<td>
                                    <h5 class='btn btn-danger col-md-11' disabled>CERRADO</h5>
                                    </td>";
                            }else if($row['diaonoche']==1 || $row['diaonoche']==0){
                              if($row[1]==0){
                                echo "<td><a class='btn btn-electric-blue col-md-11' disabled>  Libre  </a></td>";
                              }else{
                                
                                $con_res = mysqli_connect($host,$user,$pass,$db);
                                $resultad=mysqli_query($con_res,"CALL datos_usuario_idhorario($id_hora)");
                                $resp = mysqli_fetch_array($resultad);
                                
                                    echo "<form id='$id_hora'>";
                                    echo "<input type='hidden' id='horita".$id_hora."' value='$hora'>";
                                    echo "<input type='hidden' id='reserv".$id_hora."' value='$resp[nombre_usuario]'>";
                                    echo "<input type='hidden' id='telefono".$id_hora."' value='$resp[telefono_usuario]'>";
                                    if ($row['diaonoche']==0) {
                                      echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_dia]'>";
                                    }else{
                                      echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_noche]'>";
                                    }
                                    echo "</form>";
                                    echo "<td><input type='button' onclick='Javascript: info_reserv($id_hora);' class='btn btn-electric-blue col-md-11' value='Reservada'></input></td>";
                    
                              }
                            }
                          }
                        }else if ($_SESSION['tipo']==1 && $admin==0 ) { //If que dice ser administrador pero no de esta cancha
                          echo "<td><a class='btn btn-carrot-orange col-md-11' disabled>No Disponible</a></td>";
                        }else if ($_SESSION['tipo']==2) { // if que dice ser usuario
                          $aux = mysqli_connect($host,$user,$pass,$db);
                          $resultado=mysqli_query($aux,"CALL `horario_cancha`($idc,$l,$i);");
                          if($row=mysqli_fetch_array($resultado)){
                            $id_hora=$row['idhorario'];
                            if ($row['diaonoche']==2) {
                              echo "<td>
                              <h5 class='btn btn-dark-pastel-red col-md-11' disabled>CERRADO</h5>
                              </td>";
                            }else if($row['diaonoche']==1 || $row['diaonoche']==0  ){
                              if($row[1]==0){
                                echo "<form id='$id_hora'>";
                                  echo "<input type='hidden' id='horita".$id_hora."' value='$hora'>";
                                  if ($row['diaonoche']==0) {
                                    echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_dia]'>";
                                  }else{
                                    echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_noche]'>";
                                  }
                                  echo "</form>";
                                  echo "<td><input type='button' onclick='Javascript: registro_final($id_hora);' class='btn (null) btn-napier-green col-md-11' value='Reservar'></input></td>";
                              }else{

                                $con_res = mysqli_connect($host,$user,$pass,$db);
                                $resultad=mysqli_query($con_res,"CALL datos_usuario_idhorario($id_hora)");
                                $resp = mysqli_fetch_array($resultad);
                                if(!empty($resp['rut_usuario']) && $resp['rut_usuario']==$_SESSION['rut'] ){
                                    echo "<form id='$id_hora'>";
                                    echo "<input type='hidden' id='horita".$id_hora."' value='$hora'>";
                                    echo "<input type='hidden' id='reserv".$id_hora."' value='$resp[nombre_usuario]'>";
                                    echo "<input type='hidden' id='telefono".$id_hora."' value='$resp[telefono_usuario]'>";
                                    if ($row['diaonoche']==0) {
                                      echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_dia]'>";
                                    }else{
                                      echo "<input type='hidden' id='valor".$id_hora."' value='$row[precio_cancha_hora_noche]'>";
                                    }
                                    echo "</form>";
                                    echo "<td><input type='button' onclick='Javascript: info_reserv($id_hora);' class='btn btn-electric-blue col-md-11' value='Reservada'></input></td>";
                                  }else{  
                                    echo "<td>
                                    <a class='btn btn-dark-pastel-red col-md-11' disabled>Reservada</a>
                                    </td>";
                                  }
                              }
                            }
                          }
                        }
                      }

                      echo "</tr>";
                    ?>
							</table>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
  <div class="ventana3">
    <div class="panel panel-fondo mensaje">
      <form id="fomulario_final" method="POST" action="confirma_reserva.php">
        <h2 style="color:green;">Confirmación de reserva</h2><br>
        <h3 style="color:green;">
        <input type="hidden" name="id_horario" id="horario_f"></input>
        <input type="hidden" name="rut" <?php echo "value='".$_SESSION['rut']."'"?>>
        <input type="hidden" name="idc" <?php echo "value='".$_GET['idc']."'";?>></input>
        Fecha <div id="fecha_final"></div>
        Reservante <label id="reserv"><?php echo "$_SESSION[nombre]"?></label><br>
        Precio  <div id="precio_final"></div><br><br><br>
        <button onclick='closeVentana3();'>Cancelar</button>
        <button onclick='enviarformulario();'>Confirmar</button>
        </h3>
      </form>
    </div>
  </div>
  <div class="ventana4">
    <div class="panel panel-fondo mensaje">
      <form id="fomulario_info" method="POST" action="cancelar_reserva.php">
        <h2 style="color:green;">Información de Reserva</h2><br>
        <h3 style="color:green;">
        <input type="hidden" name="id_horario" id="horario_f2"></input>
        <input type="hidden" name="rut" <?php echo "value='".$_SESSION['rut']."'"?>>
        <input type="hidden" name="idc" <?php echo "value='".$_GET['idc']."'";?>></input>
        Fecha <div id="fecha_final2"></div>
        Reservante <div id="reserv2"></div>
        Precio  <div id="precio_final2"></div>
        Telefono <div id="telefono"></div><br>
        <button onclick='enviarformulario2();'>Cancelar Reserva</button>
        <button onclick='closeVentana4();'>Cerrar</button>
          </h3>
      </form>
    </div>
  </div>
</div><!-- horario END -->
<?php include("footer_comun.php");?>
</div>
<!-- Main container END -->

</body>
<script type="text/javascript">
$("#icanchas").click(function()
  {
    openfileDialog(); 
  });




</script>
    
<!-- Google Analytics -->

<!-- Google Analytics END -->


</html>

<?php 
  session_start();
  include("conexionbd.php");
?>
<!doctype html>
<html>
<head>
    <?php include("head_comun.php");?>
	<script src='./js/formHandler.js'></script>
	<script type="text/javascript">

      function openfileDialog() {
        $("#fileLoader").click();
      }

      $(document).ready( function() {
        $("a[rel='pp']").click(function () {
          nova=window.open(this.href, 'Eliminar Imagen Cancha','height=700,width=800,resizable=false,scrollbars=true,location=false');
          return false;
        });

      });
    </script>  
    <title>Perfil Recinto</title>
</head>
<script type="text/javascript">
	function openfileDialog() {
        $("#fileLoader").click();
  	}
	</script>
<body>
<!-- Main container -->
<div class="page-container">
    
<?php include("menu_comun.php");?>

<!-- añadir-imagen-cancha -->
<div class="bloc tc-napier-green bgc-mint-cream l-bloc" id="añadir-imagen-cancha">
	<div class="container bloc-sm2">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel bgc-mint-cream">
					<div class="panel-heading">
						<?php
              
			                $resultado=mysqli_query($conexion,"CALL recinto_por_id('$_GET[id_recinto]');")
			                or die(mysqli_error($conexion));

			                if(!($row=mysqli_fetch_array($resultado)))

			                 
			                mysqli_close($conexion);
			            ?>
						<h3 class="mg-clear tc-napier-green">
							<?php echo " $row[nombre_recinto]"?>
						</h3>
					</div>
					<div class="panel-body">
						<ul class="list-unstyled">
							<li>
								<form id="form-1524" novalidate>
									<div class="form-group">
										<label>
											Dirección: <?php echo " $row[direccion]";?>
										</label>
									</div>
								</form>
							</li>
							<li>
								<form id="form-2468" novalidate>
									<div class="form-group">
										<label>
											Teléfono: <?php echo " $row[telefono_recinto]";?>
										</label>
									</div>
								</form>
							</li>
							<li>
								<form id="form-993" novalidate>
									<div class="form-group">
										<label>
											Correo Electrónico: <?php echo "$row[correo_recinto]";?>
										</label>
									</div>
								</form>
							</li>
						</ul>
					</div>
				</div>
				<?php
				if(isset($_SESSION['rut']) && $_SESSION['tipo']==1){
                        $aux1 = mysqli_connect($host,$user,$pass,$db);
                        $resultado1=mysqli_query($aux1,"SELECT administrador_de_recinto($_SESSION[rut],$_GET[id_recinto]);") 
                        or die(mysqli_error($aux1));
                        if ($row1=mysqli_fetch_array($resultado1)) {  
                          if ($row1[0]==1) {
                           	
                			echo "<a href='editar-recinto.php?id_recinto=$_GET[id_recinto]' class='btn (null)  btn-napier-green'><span class='fa fa-cog icon-spacer'></span>Editar Recinto</a>";
                           

                          }
                          
                        }
                      }
                      mysqli_close($aux1);
				?>
				

				<div class="row">
					<div class="col-sm-6">
						<h4 class="mg-md tc-napier-green">
							Canchas:
						</h4>
						<div class="panel bgc-mint-cream">
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-12" style=" overflow-y:scroll; height: 210px;">
										<span class="empty-column">
											<ul class="list-unstyled">
											<?php
							                  
							                  $aux = mysqli_connect($host,$user,$pass,$db);
							                  $cont=0;
							                  $resultado=mysqli_query($aux,"CALL canchas_recinto('$_GET[id_recinto]');") 
							                  or die(mysqli_error($aux));
							                  while($rew=mysqli_fetch_array($resultado)){
							                    if($cont!=0)echo "<br><br>";
							                    	echo "<li>
																<form id='form-1524' novalidate>
																	<div class='form-group'>
																		<label>";
													echo "Numero Cancha: # $rew[numero_cancha]";
													echo "				</label>
																	</div>
																</form>
															</li>";
							                      	
							                    	echo "<li>
																<form id='form-812' novalidate>
																	<div class='form-group'>
																		<label>";
													echo "Tipo de Cancha: $rew[tipo_cancha]";
													echo "				</label>
																	</div>
																</form>
															</li>";

													echo "<li>
																<form id='form-951' novalidate>
																	<div class='form-group'>
																		<label>";
													echo "Precio Dia: $ $rew[precio_cancha_hora_dia]";
													echo "				</label>
																	</div>
																</form>
															</li>";
													echo "<li>
																<form id='form-931' novalidate>
																	<div class='form-group'>
																		<label>";
													echo "Precio Noche: $ $rew[precio_cancha_hora_noche]";
													echo "				</label>
																	</div>
																</form>
															</li>";
							                        
							                        echo "<a href='perfil_cancha.php?idc=$rew[0]' class='btn (null) btn-napier-green'><span class='fa fa-plus icon-spacer'></span>Ver Cancha</a>";

							                    $cont++;

							                    }
							                  if ($cont==0) {
							                    echo "<h3 class='text-center' style='margin-top:10%;'>No existen canchas registradas.</h3>";
							                  }
							                ?>  

											</ul>
										</span>
									</div>
								</div>
							</div>
						</div>
						<?php
						if(isset($_SESSION['rut']) && $_SESSION['tipo']==1){
		                        $aux1 = mysqli_connect($host,$user,$pass,$db);
		                        $resultado1=mysqli_query($aux1,"SELECT administrador_de_recinto($_SESSION[rut],$_GET[id_recinto]);") 
		                        or die(mysqli_error($aux1));
		                        if ($row1=mysqli_fetch_array($resultado1)) {  
		                          if ($row1[0]==1) {
		                           
		                			echo "<a href=registrar-cancha.php?id=$_GET[id_recinto] class='btn (null) btn-napier-green'><span class='fa fa-plus icon-spacer'></span>Agregar Cancha</a>";
		                           

		                          }
		                          
		                        }
		                      }
		                      mysqli_close($aux1);
						?>
						
					
					</div>
					<div class="col-sm-6">
						<h4 class="mg-md tc-napier-green">
							Imagenes
						</h4>	
						<div id="imagenes-recinto" class="carousel no-shadows slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<?php

									$recimag = mysqli_connect($host,$user,$pass,$db);

									$casrb = mysqli_query($recimag,"CALL multimedias_recinto('$_GET[id_recinto]');") or die(mysqli_error($casrb));

									$ronald = 0;
									while($eng=mysqli_fetch_array($casrb))
									{
										echo '<li data-target="#imagenes-recinto" data-slide-to="'.$ronald.'">
										</li>';
										$ronald++;
									}
									mysqli_close($recimag);
								?>
							</ol>
							<div class="carousel-inner">
								<?php

									$recimag2 = mysqli_connect($host,$user,$pass,$db);

									$casrb2 = mysqli_query($recimag2,"CALL multimedias_recinto('$_GET[id_recinto]');") or die(mysqli_error($casrb2));

									$ronaldo =0;
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
		                        $resultado1=mysqli_query($aux1,"SELECT administrador_de_recinto($_SESSION[rut],$_GET[id_recinto]);") 
		                        or die(mysqli_error($aux1));
		                        if ($row1=mysqli_fetch_array($resultado1)) {  
		                          if ($row1[0]==1) {
		                           ?>
		                           	<form name="cargador" id="cargador" method="post" action="subida_recinto.php" enctype="multipart/form-data">
			                          <input type="text" name="recinto" value=<?php echo $_GET['id_recinto'];?> hidden>
			                          <input type="file" id="fileLoader" name="img[]" style="width:0; height:0;" multiple accept="image/*" title="Load File" onchange="javascript:this.form.submit();" />
			                        </form>
		                			<span class="fa fa-photo icon-napier-green pull-right icon-md" data-placement="right" data-toggle="tooltip" title="Añadir imágenes" id="irecinto"></span>
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
	</div>
</div>
<!-- añadir-imagen-cancha END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1')"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


<?php include("footer_comun.php");?>
</div>
<!-- Main container END -->

</body>
<script type="text/javascript">
$("#irecinto").click(function()
	{
		openfileDialog();	
	});
</script>
    
<!-- Google Analytics -->

<!-- Google Analytics END -->

</html>
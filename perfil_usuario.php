<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <?php 
		include("head_comun.php");
		include("conexionbd.php");
		session_start();
		if(isset($_SESSION['rut']))
		{
			if($_SESSION['tipo']!=2)
			{
				echo '<script type="text/javascript">
				window.location="perfil_admin.php";
				</script>';
			}
		}
		else
		{
			echo '<script type="text/javascript">
			window.location="ingreso.php";
			</script>';
			
		}
	?>
    
    <title>Perfil Usuario</title>
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
<!-- perfil-user -->
<div class="bloc tc-napier-green bgc-mint-cream l-bloc" id="perfil-user">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-4">
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-12">
												<h3 class="mg-md tc-napier-green">
													Perfil Usuario
												</h3>
												<div class="panel bgc-mint-cream">
													<div class="panel-body">
														<form name='cargador' id='cargador' method='post' action='subida_perfil.php' enctype='multipart/form-data'>
								                          	<input type='file' id='fileLoader' style="width:0; height:0;" name='img' title='Cargar archivo' onchange='javascript:this.form.submit();' accept="image/*"/>
								                          	<span class="ion ion-camera icon-md pull-left icon-napier-green" data-placement="right" data-toggle="tooltip" title="Cambiar foto de perfil" id="iperfil"></span>
								                        </form>
														<?php
															echo '<img src="img/perfiles/user/'.$_SESSION['rut'].'" class="img-responsive img-circle img-frame-rd" onerror=this.src="img/placeholder-user.png">';
														?>
														<br>
														<ul class="list-unstyled">
															<?php
              
													                $resultado=mysqli_query($conexion,"CALL datos_usuario_por_rut('$_SESSION[rut]');")
													                or die(mysqli_error($conexion));
													
													                if($row=mysqli_fetch_array($resultado)) 
													                {
													                  $fecha=split("-",$row['fecha-nacimiento']);
													
													               
													                } 
													                mysqli_close($conexion);
													              ?>
															<li>
																<div class="form-group">
																	<label>
																		Nombre: <?php echo "$row[nombre_usuario]"; ?>
																	</label>
																</div>
															</li>
															<li>
																<div class="form-group">
																	<label>
																		RUT: <?php echo "$_SESSION[rut]-$_SESSION[dv] ";?>
																	</label>
																</div>
															</li>
															<li>
																<div class="form-group">
																	<label>
																		Correo Electr&oacute;nico: <?php echo "$row[correo_usuario]";?>
																	</label>
																</div>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div><a href="editar-perfil.php" class="btn   btn-napier-green"><span class="fa fa-gear icon-spacer"></span>Editar Perfil</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<h3 class="mg-md tc-napier-green">
					Informaci&oacute;n
				</h3>
				<div class="panel bgc-mint-cream">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="mg-md tc-napier-green">
											Recintos Favoritos:
										</h4>
										<div class="row">
											<div class="col-sm-12">
												<span class="empty-column">
													<?php
										                  
										                  $aux = mysqli_connect($host,$user,$pass,$db);
										                  $cont=0;
										                  $resultado=mysqli_query($aux,"CALL favoritos_usuario('$_SESSION[rut]');") 
										                  or die(mysqli_error($aux));
										                  while($rew=mysqli_fetch_array($resultado)){
										                   
										                     	if ($cont==0) {
											                		echo "<table class='table table-bordered'>";
											                		echo "<tr>
											                        <td>Nombre Recinto</td>
											                        <td>Numero Cancha</td>
											                        <td>Direcci&oacute;n</td>
											                        <td>Telefono</td>
											                        <td>Correo</td>
											                        <td>Enlace</td>
											                      	</tr>";
											                	}
											                	echo "<tr>
											                            <td>$rew[nombre_recinto]</td>
											                            <td># $rew[numero_cancha]</td>
											                            <td>$rew[direccion]</td>
											                            <td>$rew[telefono_recinto]</td>
											                            <td>$rew[correo_recinto]</td>
											                            <td><a href='perfil_cancha.php?idc=$rew[idcancha]' class='btn (null) btn-napier-green'>Ver Cancha</a></td>
											                        </tr>";
											                  
										                    $cont++;
										                    
										                  }
										                  echo "</table>";
										                  if ($cont==0) {
										                    echo "<h3 class='text-center' style='margin-top:40%;'>No existen recintos asociados.</h3>";
										                  }
										                ?> 

												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel bgc-mint-cream">
					<div class="panel-body">
						<h4 class="mg-md tc-napier-green">
							Ultimas Reservas:
						</h4>
						<div class="row">
							<div class="col-sm-12">
								<span class="empty-column">
									<?php
						                $cont=0;
						                $aux1 = mysqli_connect($host,$user,$pass,$db);
						                $resultado=mysqli_query($aux1,"CALL cinco_reservas_usuario('$_SESSION[rut]');")
						                or die(mysqli_error($aux1));
						                
						                      
						                while($row=mysqli_fetch_array($resultado)){
						                      $dat_cancha = mysqli_connect($host,$user,$pass,$db);
						                      $resultado2=mysqli_query($dat_cancha,"CALL datos_cancha('$row[cancha_idcancha]');")
						                or die(mysqli_error($dat_cancha));
						                  if ( $row2=mysqli_fetch_array($resultado2)){
						                	if ($cont==0) {
						                		echo "<table class='table table-bordered'>";
						                		echo "<tr>
						                        <td>Nombre Recinto</td>
						                        <td>Fecha</td>
						                        <td>Enlace</td>
						                      	</tr>";
						                	}
						                	
						                	echo "<tr>
						                            <td>$row2[nombre_recinto]</td>
						                            <td>$row[fecha]</td>
						                            <td><a href='perfil_cancha.php?idc=$row[cancha_idcancha]' class='btn (null) btn-napier-green'>Ver Cancha</a></td>
						                        </tr>";
						                  $cont++;
						                  }
						                  
						                }
						                echo "</table>";
						                if ($cont==0) {
						                  echo "<h3 class='text-center' style='margin-top:10%;'>No tiene historial de reservas.</h3>";
						                }
						                mysqli_close($aux1);
					                ?>  
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- perfil-user END -->
<?php include("footer_comun.php");?>
</div>
<!-- Main container END -->

</body>
<script type="text/javascript">
	$("#iperfil").click(function()
	{
		openfileDialog();	
	});
</script>
    
<!-- Google Analytics -->

<!-- Google Analytics END -->

</html>
<!doctype html>
<html>
<head>
    <?php include("head_comun.php");
    session_start();
    include("conexionbd.php");
    if(isset($_SESSION['rut']))
    {
    	if($_SESSION['tipo']!=1)
    	{
    		echo '<script type="text/javascript">
				window.location="perfil-usuario.php";
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
    
    <title>Perfil Administrador</title>
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
    <!-- perfil-user --><div class="bloc tc-napier-green bgc-mint-cream l-bloc" id="perfil-user">
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
													Perfil Administrador
												</h3>
												<div class="panel bgc-mint-cream">
													<div class="panel-body">
														<form name='cargador' id='cargador' method='post' action='subida_perfil.php' enctype='multipart/form-data'>
								                          	<input type='file' id='fileLoader' style="width:0; height:0;" name='img' title='Cargar archivo' onchange='javascript:this.form.submit();' accept="image/*"/>
								                          	<span class="ion ion-camera icon-md pull-left icon-napier-green" data-placement="right" data-toggle="tooltip" title="Cambiar foto de perfil" id="iperfil"></span>
								                        </form>
														

														<?php
															echo '<img src="img/perfiles/admin/'.$_SESSION['rut'].'" class="img-responsive img-circle img-frame-rd"
															onerror=this.src="img/placeholder-user.png">';
														?>
														<br>
														<ul class="list-unstyled">
															<?php
              
												                $resultado=mysqli_query($conexion,"CALL datos_administrador_por_rut($_SESSION[rut]);")
												                or die(mysqli_error($conexion));

												                if($row=mysqli_fetch_array($resultado)) 
												                {
												                 
												                } 
												                mysqli_close($conexion);
											            	?>
															<li>
																<div class="form-group">
																	<label>
																		Nombre: <?php echo"$row[nombre_administrador]";?>
																	</label>
																</div>
															</li>
															<li>
																<div class="form-group">
																	<label>  
																		RUT: <?php echo "$_SESSION[rut]-$_SESSION[dv]";?>
																	</label>
																</div>
															</li>
															<li>
																<div class="form-group">
																	<label>
																		Correo Electrónico: <? echo "$row[correo_administrador]";?>
																	</label>
																</div>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<a href="editar-perfil.php" class="btn   btn-napier-green"><span class="fa fa-gear icon-spacer"></span>Editar Perfil</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<h3 class="mg-md tc-napier-green">
					Información
				</h3>
				<div class="panel bgc-mint-cream">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-12">
										<h4 class="mg-md tc-napier-green">
											Recintos :
										</h4>
										<div class="row">
											<div class="col-sm-12">
												<span class="empty-column">
													  	<?php
										                  
										                  $aux = mysqli_connect($host,$user,$pass,$db);
										                  $cont=0;
										                  $resultado=mysqli_query($aux,"CALL recintos_administrador('$_SESSION[rut]');") 
										                  or die(mysqli_error($aux));
										                  while($rew=mysqli_fetch_array($resultado)){
										                   
										                     	if ($cont==0) {
											                		echo "<table class='table table-bordered'>";
											                		echo "<tr>
											                        <td>Nombre Recinto</td>
											                        <td>Dirección</td>
											                        <td>Telefono</td>
											                        <td>Enlace</td>
											                      	</tr>";
											                	}
											                	echo "<tr>
											                            <td>$rew[nombre_recinto]</td>
											                            <td>$rew[direccion]</td>
											                            <td>$rew[telefono_recinto]</td>
											                            <td><a href='perfil_recinto.php?id_recinto=$rew[idrecinto]' class='btn (null) btn-napier-green'>Ver Recinto</a></td>
											                        </tr>";
											                  
										                    $cont++;
										                    
										                  }
										                  if ($cont==0) {
										                    echo "<h3 class='text-center' style='margin-top:40%;'>No existen recintos asociados.</h3>";
										                  }
										                ?>  
										            </table>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><a href="registrar-recinto.php" class="btn (null) btn-napier-green"><span class="fa fa-plus icon-spacer"></span>Añadir Recinto</a>
				<br>
				<div class="panel bgc-mint-cream">
					<div class="panel-body">
						<h4 class="mg-md tc-napier-green">
							Proximas Reservas:
						</h4>
						<div class="row">
							<div class="col-sm-12">
								<span class="empty-column">
									<?php
										$aux1 = mysqli_connect($host,$user,$pass,$db);
					                    $cont1=0;
					                    $resultado1=mysqli_query($aux1,"CALL proximas_reservas_administrador('$_SESSION[rut]');") 
					                    or die(mysqli_error($aux1));
					                    while($rews=mysqli_fetch_array($resultado1)){
					                    	if ($cont1==0) {
						                		echo "<table class='table table-bordered'>";
						                		echo "<tr>
						                        <td>Nombre Recinto</td>
						                        <td>Numero Cancha</td>
						                        <td>Nombre Usuario</td>
						                        <td>Telefono Usuario</td>
						                        <td>Correo Usuario</td>
						                        <td>Enlace</td>
						                      	</tr>";
						                	}
						                	echo "<tr>
						                            <td>$rews[nombre_recinto]</td>
						                            <td># $rews[numero_cancha]</td>
						                            <td>$rews[nombre_usuario]</td>
						                            <td>$rews[telefono_usuario]</td>
						                            <td>$rews[correo_usuario]</td>
						                            <td><a href='perfil_recinto.php?id_recinto=$rews[idrecinto]' class='btn (null) btn-napier-green'>Ver Recinto</a></td>
						                        </tr>";
						                  
					                    $cont1++;
					                    
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

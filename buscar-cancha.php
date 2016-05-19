<?php
	##Buscar Recintos para kevin
	##@autor : Victor Toledo
	##fecha : 30/11/15

	header ('Content-type: text/html; charset=ISO-8859-1');
?>
<!doctype html>
<html>
<head>
    <?php include("head_comun.php");
    	session_start();
    ?>
    <title>Buscar Recintos</title>
</head>
	<script language="javascript" >
		
		$(document).ready(function(){
		   $("#region").change(function () {
		           $("#region option:selected").each(function () {
		            id_region = $(this).val();
		            $.post("cargar_provincia.php", { id_region: id_region }, function(data){
		                $("#provincia").html(data);
		            });            
		        });
		   });
		});	
	
		$(document).ready(function(){   
		   $("#provincia").change(function () {
		           $("#provincia option:selected").each(function () {
		            id_provincia = $(this).val();
		            $.post("cargar_comuna.php", { id_provincia: id_provincia }, function(data){
		                $("#comuna").html(data);
		            });            
		        });
		   });
		});	
	</script>
<body>
<!-- Main container -->
<div class="page-container">
    
<?php include("menu_comun.php");?>

<!-- bloc-15 -->
<div class="bloc tc-napier-green bgc-mint-cream" id="bloc-15">
	<div class="container b-divider bloc-lg">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-md-offset-3">
				<div class="panel bgc-mint-cream">
					<div class="panel-heading">
						<h3 class="mg-clear text-center tc-napier-green">
							Buscador de Canchas
						</h3>
					</div>
					<div class="panel-body">
						<form id="buscar_recintos">
							<div class="form-group">
								<label>
									Regi&oacute;n
								</label>
								<select id="region" class="form-control">
									<option value="0">Seleccione Regi&oacute;n</option>
			
									<?php
										include("conexionbd.php");

										$resultado=mysqli_query($conexion,"CALL nombre_regiones();");

										while ($row=mysqli_fetch_array($resultado)) 
										{
											echo "<option value='$row[0]'>$row[1]</option>";
										}

										mysqli_close($conexion);	
									?>
										
								</select> 
							</div>
							<div class="form-group">
								<label>
									Provincia
								</label>
								<select class="form-control" id="provincia">
									<option value="0">Seleccione Provincia</option>
								</select>
							</div>
							<div class="form-group">
								<label>
									Comuna
								</label>
								<select class="form-control" id="comuna">
									<option value="0">Seleccione Comuna</option>
								</select>
							</div>
							<div class="form-group">
								<label>
									Tipo de Cancha:
								</label>
								<select class="form-control" id="tipo" name="tipo">
				        			<option value="0">Seleccione Tipo Cancha</option>
									<?php
									include("conexionbd.php");
									$resultado=mysqli_query($conexion,"CALL tipos_cancha()");

									while ($row=mysqli_fetch_array($resultado)) {
										echo "<option value='$row[0]'>$row[0]</option>";
									} 
									mysqli_close($conexion);  
									?>
								</select>									
							</div>
							<div class="text-center">
								<button class="bloc-button btn btn-napier-green" id="buscar" type="button">
									Buscar Canchas
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-15 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1')"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


<?php include("footer_comun.php");?>
</div>
<!-- Main container END -->

</body>
<script type="text/javascript">
	
	$("#buscar").click(function()
	{
		var region = $("#region").val();
		var comuna = $("#comuna").val();
		var provincia = $("#provincia").val();
		var tipo = $("#tipo").val();

		window.location ="resultados-busqueda.php?region="+region+"&comuna="+comuna+"&provincia="+provincia+"&tipo="+tipo;
	});
	

</script>
    
<!-- Google Analytics -->

<!-- Google Analytics END -->

</html>

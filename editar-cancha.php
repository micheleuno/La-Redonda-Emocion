<!doctype html>
<?php include("conexionbd.php");?>
<html>
<head>
     <?php include("head_comun.php");
     session_start();?>
    <script src='./js/jqBootstrapValidation.js'></script>
	<script src='./js/formHandler.js'></script>
    <title>editar cancha</title>
</head>
<body>
<!-- Main container -->
<div class="page-container">
    <?php include("menu_comun.php");?>
    <div class="bloc tc-napier-green bgc-mint-cream" id="bloc-14">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel bgc-mint-cream">
					<div class="panel-heading">
						<h3 class="mg-clear tc-napier-green">
							Configuración de cancha
						</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12 text-center">
	
								<?php
                			                $auxi = mysqli_connect($host,$user,$pass,$db);
							                $resultado=mysqli_query($auxi,"CALL datos_cancha('$_GET[idc]');")
							                or die(mysqli_error($auxi));

							                if(!($rew=mysqli_fetch_array($resultado))) 
							                ?>
								<form id="form-734" novalidate>
									<div class="form-group">
										<label>
											Numero de cancha:
											<?php echo "<input type='hidden' id='id_cancha'  value='$_GET[idc]'/>"?>
											<?php echo "<input id='numero' class='form-control' value='$rew[numero_cancha]' />";?>
										</label>
									</div>
									<div class="form-group">
										<label>
											Jugadores por lado:
										
										<select class="form-control" id="cantidad" name="cantidad">
						        			<option value="">Elija una opci&oacute;n</option>
						        			<?php
						        			$cont=5;
						        			while($cont<12){
						        				if ($cont==$rew['jugadores_lado']) {
						        				echo "<option value='$cont' selected>$cont</option>";	
						        				}else{
						        				echo "<option value='$cont'>$cont</option>";
						        				}	
						        				$cont++;
						        			}?>
										</select>
										</label>
									</div>
									<div class="form-group">
										<label>
											Precio horario Diurno:
											<?php echo"<input type='text' class='form-control' name='precio_dia' id='precio_dia' value=$rew[precio_cancha_hora_dia]>";?>
										</label>
									</div>
									<div class="form-group">
										<label>
											Precio horario Nocturno:
											<?php echo"<input type='text' class='form-control' name='precio_noche' id='precio_noche'  value=$rew[precio_cancha_hora_noche]>";?>
										</label>
									</div>
									<div class="text-center">
										<button class="bloc-button btn btn-napier-green" id="reg_cancha" type="button">
											Guardar Cambios
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- bloc-14 END --><!-- Footer - footer --><div class="bloc bgc-onyx d-bloc" id="footer">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-sm-4">
				<h3 class="mg-md">
					Acerca de Nosotros
				</h3><a href="index.html" class="a-btn a-block">Equipo</a><a href="index.html" class="a-btn a-block">Contáctanos</a>
			</div>
			<div class="col-sm-4">
				<h3 class="mg-md">
					Siguénos
				</h3><a href="index.html" class="a-btn a-block">Facebook</a>
			</div>
			<div class="col-sm-4">
				<h3 class="mg-md">
					La Redonda Emoción
				</h3><a href="index.html" class="a-btn a-block">Términos y Condiciones</a>
			</div>
		</div>
	</div>
</div><!-- Footer - footer END -->
</div>
<div class="ventana4" name="registro_exitoso" >
	    <div class="panel panel-fondo mensaje" >
	        <div class="panel-body">
	            <div class="form-group" id="mensaje">
	                Registro Exitoso
	            </div>
	            <div class="form-group">
	                <br><br>
	                <button class="bloc-button btn btn-napier-green btn-m" type="button" id="cerrar">
						Aceptar
					</button>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="ventana2" name="error_form" >
	    <div class="panel panel-fondo mensaje" >
	        <div class="panel-body">
	            <div class="form-group" id="mensaje">
	                Debe ingresar todos los datos de manera correcta
	            </div>
	            <div class="form-group">
	                <br><br>
	                <button class="bloc-button btn btn-napier-green btn-m" type="button" id="cerrando">
						Aceptar
					</button>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="ventana3" name="cargando">
	    <div class="panel panel-fondo mensaje" >
	        <div class="panel-body">
	        	Registrando cancha...
	        </div>
	    </div>
	</div>
	<div class="ventana5" name="error">
	    <div class="panel panel-fondo mensaje" >
	        <div class="panel-body">
	        	Error al registrar usuario, intentelo más tarde
	        </div>
	        <div class="form-group">
                <br><br>
                <button class="bloc-button btn btn-napier-green btn-m" type="button" id="cerrandor">
					Aceptar
				</button>
            </div>
	    </div>
	</div>
	<div class="ventana6" name="erroresr">
	    <div class="panel panel-fondo mensaje" >
	        <div class="panel-body">
	        	N&uacute;mero de cancha ya utilizado
	        </div>
	        <div class="form-group">
                <br><br>
                <button class="bloc-button btn btn-napier-green btn-m" type="button" id="cerrando_2">
					Aceptar
				</button>
            </div>
	    </div>
	</div>	
<!-- Main container END -->
<script type="text/javascript">

		$('#cerrar').click(function()
    	{
    		closeVentana4();
    	}
        );
        $('#cerrandor').click(function()
    	{
    		closeVentana5();
    	}
        );
        $('#cerrando').click(function()
    	{
    		closeVentana2();
    	}
        );

        $('#cerrando_2').click(function()
    	{
    		closeVentana6();
    	}
        );
  		
  		function openVentana4() {
                    
            $(".ventana4").slideDown("fast");
        }
        function closeVentana4() {
            $(".ventana4").slideUp("fast");
        }

        function openVentana5() {

            $(".ventana5").slideDown("fast");
        }
        function closeVentana5() {
            $(".ventana5").slideUp("fast");
        }

        function openVentana2() {

            $(".ventana2").slideDown("fast");
        }
        function closeVentana2() {
            $(".ventana2").slideUp("fast");
        }

        function openVentana3() {
                    
            $(".ventana3").slideDown("fast");
        }
        function closeVentana3() {
            $(".ventana3").slideUp("fast");
        }

        function openVentana6() {
                    
            $(".ventana6").slideDown("fast");
        }
        function closeVentana6() {
            $(".ventana6").slideUp("fast");
        }

		$("#numero").change(function()
        {
            var num = $("#numero").val();
            var id = $("#recinto").val();
            
            $.post( "comp_numero.php", {numero : num, recinto: id }, mostrarDatos );
                
        });

        function mostrarDatos( datos ) {

	     	if(datos==0)
	     	{	
	     		aprobar("numero");
	     	}
	     	else{
	     		rechazar("numero");
	     		openVentana6();
	     	}
	    }

	    function rechazar(id)
    	{
			var div = $("#"+id).closest("div");
			div.removeClass("has-success has-feedback");
			div.addClass("has-error has-feedback");
			$("#glypcn"+id).remove();
			div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
			return false;
    	}
    	function aprobar(id)
		{
			var div = $("#"+id).closest("div");
			div.removeClass("has-error has-feedback");
			div.addClass("has-success has-feedback");
			$("#glypcn"+id).remove();
			div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');
		}
		function esVacio(id)
		{
			if($("#"+id).val()==null || $("#"+id).val()=="")
			{
				var div = $("#"+id).closest("div");
				div.removeClass("has-success has-feedback");
				div.addClass("has-error has-feedback");
				$("#glypcn"+id).remove();
				div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
				return false;
			}
			else
			{
				return true;
			}
		}
		function esNumero(id)
		{
			var str=$("#"+id).val();
			for(var i=0;i<str.length;i++)
			{
				var chara=str.substring(i,i+1);
				if(chara<'0' || chara>'9')
				{
					var div = $("#"+id).closest("div");
					div.remove("has-success has-feedback");
					div.addClass("has-error has-feedback");
					$("#glypcn"+id).remove();
					div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
					return false;
				}
			}
			return true;
		}

		$("#reg_cancha").click(function()
		{
			if(!esVacio("numero"))
			{
				openVentana2();
				return false;
			}

			

			if(!esVacio("cantidad"))
			{
				openVentana2();
				return false;
			}
			else
			{
				aprobar("cantidad");
			}

			

			openVentana3();

			var array = new Object();

			array["numero"] = $("#numero").val();
			array["id_cancha"] =$("#id_cancha").val();
			array["cantidad"] = $("#cantidad").val();
			array["precio_dia"] = $("#precio_dia").val();
			array["precio_noche"] = $("#precio_noche").val();
			
			$.ajax({ 
		        type: "POST", 
		        data: array, 
		        url: './editar_cancha.php', 
		        success: function(data) { 
		        var res = jQuery.parseJSON(data); 

		        if(res.exito == 1){ 
		        	closeVentana3();
		        	openVentana4();
		        	window.location="perfil_cancha.php?idc="+array["id_cancha"];
	        	}else
	        	{
		         	closeVentana3();
		         	openVentana5();	
	        	}
		        },
		        error: function(e){ 
		            alert("Error en el servidor, por favor, intentalo de nuevo mas tarde");
		        }
		    });
		});
	</script>
</body>
    
<!-- Google Analytics -->

<!-- Google Analytics END -->

</html>

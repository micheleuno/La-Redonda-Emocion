<!doctype html>
<html>
<head>
    <?php include("head_comun.php");
	    session_start();
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
    <title>Registrar Cancha</title>
</head>
<body>
<!-- Main container -->
<div class="page-container">
    
	<?php include("menu_comun.php");?>
    <div class="bloc tc-napier-green bgc-mint-cream l-bloc" id="bloc-10">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="mg-md text-center tc-napier-green">
					Registro de cancha
				</h3>
				<div class="panel bgc-mint-cream">
					<div class="panel-body">
						<div class="row">
							<form id="registra_cancha">
								<?php 

					      			echo "<input type='text' id='recinto' name='recinto' value='$_GET[id]' hidden>";
					      		?>
								<div class="col-sm-6">
									<div class="form-group">
										<label>
											Numero de cancha:
										</label>
										<input id="numero" class="form-control" placeholder="1" />
									</div>
									<div class="form-group">
										<label>
											Tipo de Cancha:
										</label>
										<select class="form-control" id="tipo" name="tipo">
						        			<option value="">Elija una opci&oacute;n</option>
											<option value="Futbol">Futbol</option>
											<option value="Fubtolito">Futbolito</option>
											<option value="Futsal">Futsal</option>
											<option value="Baby Futbol">Baby Futbol</option>
										</select>									
									</div>
									<div class="form-group">
										<label>
											Superficie:
										</label>
										<select class="form-control" id="superficie" name="superficie">
						        			<option value="">Elija una opci&oacute;n</option>
											<option value="Pasto natural">Pasto natural</option>
											<option value="Pasto sintetico">Pasto sintetico</option>
											<option value="Tierra">Tierra</option>
											<option value="Parquet">Parquet</option>
											<option value="Cemento">Cemento</option>
										</select>
									</div>
									<div class="form-group">
										<label>
											Jugadores por lado:
										</label>
										<select class="form-control" id="cantidad" name="cantidad">
						        			<option value="">Elija una opci&oacute;n</option>
						        			<option value="5">5</option>
						        			<option value="6">6</option>
						        			<option value="7">7</option>
						        			<option value="8">8</option>
						        			<option value="9">9</option>
						        			<option value="10">10</option>
						        			<option value="11">11</option>
										</select>
									</div>
									<div class="form-group">
										<label>
											Precio horario Diurno:
										</label>
										<div class="input-group">
						        			<span class="input-group-addon">$</span>
						        			<input type="text" class="form-control" name="precio_dia" id="precio_dia" placeholder="Precio horario D&iacute;a">
										</div>
									</div>
									<div class="form-group">
										<label>
											Precio horario Nocturno:
										</label>
										<div class="input-group">
						        			<span class="input-group-addon">$</span>
						        			<input type="text" class="form-control" name="precio_noche" id="precio_noche" placeholder="Precio horario Noche">
								        </div>	
									</div>
									<div class="text-center">
										<button class="bloc-button btn btn-napier-green" id="reg_cancha" type="button">
											Registrar
										</button>
									</div>
								</div>
								<div class="col-sm-6">
								
									<div class="form-group">
										<label>
											Inicio horario Diurno:
										</label>
										<input type="time" id="inicio_diurno" class="form-control" value="00:00"/>
									</div>
									<div class="form-group">
										<label>
											Fin horario Diurno - Inicio horario Nocturno:
										</label>
										<input type="time" id="inicio_nocturno" class="form-control" value="19:00" />
									</div>
									<div class="form-group">
										<label>
											Fin horario Nocturno:
										</label>
										<input type="time" class="form-control" id="fin_nocturno" value="22:00" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- bloc-10 END -->

	<?php include("footer_comun.php");?>
</div>
<!-- Main container END -->
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

</body>
    
<!-- Google Analytics -->

<!-- Google Analytics END -->
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

			if(!esVacio("tipo"))
			{
				openVentana2();
				return false;
			}
			else
			{
				aprobar("tipo");
			}

			if(!esVacio("superficie"))
			{
				openVentana2();
				return false;
			}
			else
			{
				aprobar("superficie");
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

			if(!esVacio("precio_dia"))
			{
				openVentana2();
				return false;
			}
			else
			{
				if(!esNumero("precio_dia"))
				{
					openVentana2();
					return false;
				}
				else
				{
					aprobar("precio_dia")
				}
			}

			if(!esVacio("precio_noche"))
			{
				openVentana2();
				return false;
			}
			else
			{
				if(!esNumero("precio_noche"))
				{
					openVentana2();
					return false;
				}
				else
				{
					aprobar("precio_noche");		
				}
			}

			if(!esVacio("inicio_diurno"))
			{
				openVentana2();
				return false;
			}
			else
			{
				aprobar("inicio_diurno");
			}

			if(!esVacio("inicio_nocturno"))
			{
				openVentana2();
				return false;
			}
			else
			{
				aprobar("inicio_nocturno");
			}

			if(!esVacio("fin_nocturno"))
			{
				openVentana2();
				return false;
			}
			else
			{
				aprobar("fin_nocturno");
			}

			openVentana3();

			var array = new Object();

			array["numero"] = $("#numero").val();
			array["tipo"] = $("#tipo").val();
			array["superficie"] = $("#superficie").val();
			array["cantidad"] = $("#cantidad").val();
			array["precio_dia"] = $("#precio_dia").val();
			array["precio_noche"] = $("#precio_noche").val();
			array["inicio_diurno"] = $("#inicio_diurno").val();
			array["inicio_nocturno"] = $("#inicio_nocturno").val();
			array["fin_nocturno"] = $("#fin_nocturno").val();
			array["recinto"] = $("#recinto").val();

			$.ajax({ 
		        type: "POST", 
		        data: array, 
		        url: './registro_cancha.php', 
		        success: function(data) { 
		        var res = jQuery.parseJSON(data); 

		        if(res.exito == 1){ 
		        	closeVentana3();
		        	openVentana4();
		        	window.location="perfil_recinto.php?id_recinto="+array["recinto"];
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
</html>

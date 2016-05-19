<?php 
  session_start();
  include("conexionbd.php");
?>
<html>
<head>
 	  <?php include("head_comun.php");?>
	<script src='./js/formHandler.js'></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <title>Editar Recinto</title>
    
</head>
<body>
<!-- Main container -->
<div class="page-container">
    <?php include("menu_comun.php");?><!-- Navigation Bloc END --><!-- bloc-13 --><div class="bloc tc-napier-green bgc-mint-cream" id="bloc-13">
	<div class="container bloc-lg">
		<?php
							$resultado=mysqli_query($conexion,"CALL recinto_por_id($_GET[id_recinto]);")
			                or die(mysqli_error($conexion));

			                $row1=mysqli_fetch_array($resultado);
		?>
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="panel bgc-mint-cream">
					<div class="panel-heading">
						<h3 class="mg-clear tc-napier-green">
							Configuración de recinto
						</h3>
					</div>
					<div class="panel-body">
						<form id="registro_recinto" novalidate>
							<div class="form-group">
								<label>
									Nombre del recinto:
									<?php echo"<input id='nombre' class='form-control' value='$row1[nombre_recinto]' />
									<input type='hidden' id='id_recinto' class='form-control' value='$_GET[id_recinto]' />";?>
								</label>
							</div>
							
							<div class="form-group">
								<label>
									Dirección:
									<?php echo"<input class='form-control' id='direccion' value='$row1[direccion]' />";?>
								</label>
							</div>
							<div class="form-group">
								<label>
									Teléfono:
									<?php echo "<input class='form-control' id='fono' value='$row1[telefono_recinto]' />";?>
								</label>
							</div>
							<div class="form-group">
								<label>
									Correo Electrónico:
									<?php echo"<input class='form-control' id='correo' value='$row1[correo_recinto]' />";?>
								</label>
							</div>
						</form>
					</div>
				</div>
				<div class="text-center">
					<button class="bloc-button btn btn-napier-green" id="registro" type="button">
										Guardar Cambios
									</button>
				</div>
				<?php echo"<a href='eliminar_recinto.php?id_recinto=$_GET[id_recinto]' class='a-btn a-block ltc-napier-green'>Eliminar recinto</a>"?>
			</div>
			
		</div>
	</div>
</div><!-- bloc-13 END --><!-- Footer - footer --><div class="bloc bgc-onyx d-bloc" id="footer">
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
	<div class="ventana6" name="error_form" >
	    <div class="panel panel-fondo mensaje" >
	        <div class="panel-body">
	            <div class="form-group" id="mensaje">
	                Debe seleccionar la ubicaci&oacute;n de su recinto en el mapa
	            </div>
	            <div class="form-group">
	                <br><br>
	                <button class="bloc-button btn btn-napier-green btn-m" type="button" id="cerrando_24">
						Aceptar
					</button>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="ventana3" name="cargando">
	    <div class="panel panel-fondo mensaje" >
	        <div class="panel-body">
	        	Registrando recinto...
	        </div>
	    </div>
	</div>
	<div class="ventana5" name="error">
	    <div class="panel panel-fondo mensaje" >
	        <div class="panel-body">
	        	Error al registrar el recinto, intentelo m&aacute;s tarde
	        </div>
	        <div class="form-group">
                <br><br>
                <button class="bloc-button btn btn-napier-green btn-m" type="button" id="cerrandor">
					Aceptar
				</button>
            </div>
	    </div>
	</div>
</div><!-- Footer - footer END -->
</div>
<!-- Main container END -->

</body>
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
        $('#cerrando_24').click(function()
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

        function openVentana6() {

            $(".ventana6").slideDown("fast");
        }
        function closeVentana6() {
            $(".ventana6").slideUp("fast");
        }

        function openVentana3() {
                    
            $(".ventana3").slideDown("fast");
        }
        function closeVentana3() {
            $(".ventana3").slideUp("fast");
        }

	//VARIABLES GENERALES
	//declaras fuera del ready de jquery
	

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

	function aprobar(id)
	{
		var div = $("#"+id).closest("div");
		div.removeClass("has-error has-feedback");
		div.addClass("has-success has-feedback");
		$("#glypcn"+id).remove();
		div.append('<span id="glypcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');
	}

	function checkEmail(mail) 
    {

	   var email = $("#"+mail).val();

	    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	    if (!filter.test(email)) {
	    	var div = $("#"+mail).closest("div");
			div.removeClass("has-success has-feedback");
			div.addClass("has-error has-feedback");
			$("#glypcn"+mail).remove();
			div.append('<span id="glypcn'+mail+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
	    	return false;
	    }
	    else
	    {
	    	return true;
	    }
 	}

    $("#registro").click(function()
    {
    	if(!esVacio("nombre"))
    	{
    		openVentana2();
    		return false;
    	}
    	else
    	{
    		aprobar("nombre");
    	}

    	

    	if(!esVacio("direccion")){
    		openVentana2();
    		return false;
    	}else{
    		aprobar("direccion");
    	}

    	if(!esVacio("fono"))
    	{
    		openVentana2();
    		return false;
    	}
    	else
    	{
    		if(!esNumero("fono"))
    		{
    			openVentana2();
    			return false;
    		}
    		else
    		{
    			aprobar("fono");
    		}
    	}

    	if(!esVacio("correo"))
    	{
    		openVentana2();
    		return false;
    	}
    	else
    	{
    		if(!checkEmail("correo"))
			{
				openVentana2();
				return false;
			}
			else{
				aprobar("correo");
			}
    	}

    	

    	openVentana3();

    	var array = new Object();
    	array["nombre"] = $("#nombre").val();
    	array["id_recinto"]=$("#id_recinto").val();
    	array["direccion"] = $("#direccion").val();
    	array["telefono"] = $("#fono").val();
    	array["correo"] = $("#correo").val();
    	

    	$.ajax({ 
	        type: "POST", 
	        data: array, 
	        url: './editar_recinto.php', 
	        success: function(data) { 
	        var res = jQuery.parseJSON(data); 

	        if(res.exito == 1){ 
	        	closeVentana3();
	        	openVentana4();
	        	window.location="perfil_recinto.php?id_recinto="+array['id_recinto'];
        	}else
        	{
	         	closeVentana3();
	         	openVentana5();	  	
        	}
	        },
	        error: function(e){ 
	            //alert("Error en el servidor, por favor, intentalo de nuevo mas tarde");
	        }
	    });
    });
</script> 
<!-- Google Analytics -->

<!-- Google Analytics END -->

</html>

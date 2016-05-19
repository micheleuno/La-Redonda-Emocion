<?php 
  session_start();
  include("conexionbd.php");
?>
<!doctype html>
<html>
<head>
   <?php include("head_comun.php");?>
	<script src='./js/formHandler.js'></script>
    <title>Editar Perfil</title>
</head>
<body>
<!-- Main container -->
<div class="page-container">
    <?php include("menu_comun.php");?>
    <!-- Navigation Bloc END --><!-- bloc-11 --><div class="bloc tc-napier-green bgc-mint-cream" id="bloc-11">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="panel bgc-mint-cream">
					<div class="panel-heading">
						<?php
						if($_SESSION['tipo']==2){
							 	$auxi1= mysqli_connect($host,$user,$pass,$db);
                              	$resultado3=mysqli_query($auxi1,"CALL datos_usuario_por_rut($_SESSION[rut]);")
                              	or die(mysqli_error($auxi1));
                              }else{

							 	$auxi1= mysqli_connect($host,$user,$pass,$db);
                              	$resultado3=mysqli_query($auxi1,"CALL datos_administrador_por_rut($_SESSION[rut]);")
                              	or die(mysqli_error($auxi1));
                              }
                				if($raw=mysqli_fetch_array($resultado3)){
						?>
						<h3 class="mg-clear tc-napier-green">
							Configuración del perfil:
						</h3>
					</div>
					<div class="panel-body">
						<form id="formulario-edicion" novalidate>
							<div class="form-group">
								<label>
									RUT: <?php echo "$_SESSION[rut]-$_SESSION[dv]";?>
								</label>
							</div>
							<div class="form-group">
								<label>
									Nombre:
									<input type='text' class="form-control" id="nombre" name='nombre' <?php echo "value='$_SESSION[nombre]'";?>></input>
									
								</label>
							</div>
							<div class="form-group">
								<label>
									Fecha de Nacimiento: 
									<input type='text' class="form-control" id='dp3' placeholder="31/12/2015"
									date-date-format='dd/mm/yyyy'/ id="fecha" <?php echo "value='$raw[fecha_nacimiento]'";?>>
								</label>
							</div>
							<div class="form-group">
								<label>
									Correo Electrónico:
									<?php 
							
							if($_SESSION['tipo']==1){?>
									<input class="form-control" id="email" name="email" <?php echo "value='$raw[correo_administrador]'";?> />
							<?php }else{?>									
									<input class="form-control" id="email" name="email" <?php echo "value='$raw[correo_usuario]'";?> />
							<?php }?>
									
								</label>
							</div>
							<div class="form-group">
								<label>
									Teléfono:
									<?php 
							
							if($_SESSION['tipo']==1){?>
									<input class="form-control" id="fono" name="fono" placeholder="032 2123456"<?php echo "value='$raw[telefono_administrador]'";?> />
							<?php }else{?>									
									<input class="form-control" id="fono" name="fono" placeholder="032 2123456"<?php echo "value='$raw[telefono_usuario]'";?> />
							<?php }?>
								</label>
							</div>
							<div class="form-group">
								<label>
									Contraseña
									<input id="contra1" class="form-control" type="password" placeholder="Contraseña" />


									<input id="contra2" class="form-control" type="hidden" <?php echo "value='$raw[contrasena]'";?> placeholder="Contraseña" />
								</label>
								
							</div>
							<div class="text-center">
								<button class="bloc-button btn btn-napier-green btn-md" type="button" id="boton-form">
									Guardar Cambios
								</button>
							</div>

									<a href="index.html" class="a-btn a-block ltc-napier-green" title="Cambia tu contraseña aquí">Cambiar contraseña</a>	
							<?php }
							
							if($_SESSION['tipo']==1){?>
									<a href="eliminar_administrador.php" class="a-btn a-block ltc-napier-green">Eliminar Cuenta</a>
							<?php }else{?>									
									<a href="eliminar_usuario.php" class="a-btn a-block ltc-napier-green">Eliminar Cuenta</a>
							<?php }?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- bloc-11 END --><!-- Footer - footer --><div class="bloc bgc-onyx d-bloc" id="footer">
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
	        	Editando usuario...
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
	        	Error al registrar usuario
	        	<br>
	        	el RUT esta ya registrado
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
<script language="javascript">
        $(function () {
            $('#dp3').datepicker();
        });
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

        function comprobarPass(puno,pdos)
		{
			if($("#"+puno).val() != $("#"+pdos).val())
			{	
				var div = $("#"+pdos).closest("div");
				div.removeClass("has-success has-feedback");
				div.addClass("has-error has-feedback");
				$("#glypcn"+pdos).remove();
				div.append('<span id="glypcn'+pdos+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
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
		function esInvalido(rut)
		{
			var div = $("#"+rut).closest("div");
			div.removeClass("has-success has-feedback");
			div.addClass("has-error has-feedback");
			$("#glypcn"+rut).remove();
			div.append('<span id="glypcn'+rut+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
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
        function validaRut(rut)
        {
        	aux = new String($("#"+rut).val());
        	var nrut= [];

        	var resto,suma,digito,factor,dv;
			suma=0;
			factor=2;


        	for(i=0;i < aux.length;i++)
        	{
        		if(aux[i]!=".")
        		{
        			if(aux[i]!="-")
        			{
        				nrut.push(aux[i]);
        			}
        			else{
        				dve=aux[i+1];
        			}
        		}
        		
        	};

        	largo = nrut.length;
        	dv = nrut[largo-1];

				
			for (j=largo - 2;j>=0 ;j--)
		    {
		        suma=suma + (nrut[j] * factor);
		        factor++;
		        if (factor == 8) factor=2;
		    };

    		resto=(suma % 11);
		     
		    digito = 11 - resto;

		    if (digito == 10) 
		        if (dv=="K" || dv=="k")
		           return true
		        else
		           	return false
		    else
		        if (digito==11)
		           if (dv=="0")
		              return true
		           else
		              return false
		        else
		           if (digito == dv)
		              return true
		           	else
		              return false;
		    return true;
        }

        
		$("#boton-form").click(function()
		{
			
			if(!esVacio("nombre"))
			{	alert("1");
				openVentana2();
				return false;
			}
			else{
				aprobar("nombre");
			}

			if(!esVacio("email"))
			{
				openVentana2();
				return false;
			}
			else{
				if(!checkEmail("email"))
				{
					openVentana2();
					return false;
				}
				else{
					aprobar("email");
				}
			}

			if(!esVacio("dp3"))
			{	
				openVentana2();
				return false;
			}
			else
			{
				aprobar("dp3");
			}

			if(!esVacio("fono"))
			{
				openVentana2();
				return false;
			}
			else{
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
			if(!esVacio("contra1") || !esVacio("contra2"))
			{
				openVentana2();
				return false;
			}
			
			if(!comprobarPass("contra1","contra2"))
			{
				openVentana2();
				return false;
			}
			else
			{
				aprobar("contra1");
				aprobar("contra2");
			}

			
			

			openVentana3();

								
			
			var array = new Object();
		    
		    array['nombre'] = $("#nombre").val();
		    array['email'] = $("#email").val();
		    array['bday'] = $("#dp3").val();
		    array['fono'] = $("#fono").val();
		    array['contra1'] = $("#contra1").val();
			
		 
		    $.ajax({ 
		        type: "POST", 
		        data: array, 
		        url: './editar_usuario.php', 
		        success: function(data) { 
		        var res = jQuery.parseJSON(data); 

		        if(res.exito != 0){ 
		        	closeVentana3();
		        	openVentana4();
		        	window.location="ingreso.php";
            	}else if(res.error==2){
		         	closeVentana3();
		         	openVentana5();  	
		        }
		        else if(res.error==1)
		        {
		        	closeVentana3();
		        	openVentana6();
		        	esVacio("rut");
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

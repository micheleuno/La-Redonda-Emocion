<!doctype html>
<html>
<head>
    <?php include("head_comun.php");?>
    <title>Recuperar Contrase&ntilde;a</title>
</head>
<body>
<!-- Main container -->
<div class="page-container">
    
<!-- Navigation Bloc -->
<?php include("menu_comun.php");?>
<!-- Navigation Bloc END -->

<!-- bloc-18 -->
<div class="bloc tc-napier-green bgc-mint-cream" id="bloc-18">
	<div class="container b-divider bloc-lg">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-md-offset-3">
				<div class="panel bgc-mint-cream">
					<div class="panel-heading">
						<h3 class="mg-clear text-center tc-napier-green">
							Recuperar Contraseña
						</h3>
					</div>
					<div class="panel-body">
						<form id="form-1">
							<div class="form-group">
								<label>
									RUT
								</label>
								<input id="rut" class="form-control" placeholder="12345678-9" />
							</div>
							<div class="radio">
								<label>
									<input type="radio" id="admin" name="tipo" value="1" checked/>Administrador
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="tipo" value="2" id="usuar" />Usuario
								</label>
							</div>
							<div class="text-center">
								<button class="bloc-button btn btn-napier-green" id="enviar" type="button">
									Enviar al Correo
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br>
</div>
<!-- bloc-18 END -->

<!-- ScrollToTop Button -->
<!-- ScrollToTop Button END-->
<!-- Footer - footer -->
<?php include("footer_comun.php");?>
<!-- Footer - footer END -->
</div>
<!-- Main container END -->
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
	        	Enviando Correo registrando con ese RUT...
	        </div>
	    </div>
	</div>
	<div class="ventana5" name="error">
	    <div class="panel panel-fondo mensaje" >
	        <div class="panel-body">
	        	Error al intentar mandar correo, intentelo más tarde
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
	        	Error al ingresar
	        	<br>
	        	combinaci&oacute;n RUT/Contrase&ntilde;a no esta registrada
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
<script type="text/javascript">

	$('#cerrando').click(function()
	{
		closeVentana2();
	});

	$('#cerrandor').click(function()
	{
		closeVentana5();
	}
    );

    $('#cerrando_2').click(function()
	{
		closeVentana6();
	}
    );

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

    function openVentana5() {

        $(".ventana5").slideDown("fast");
    }
    function closeVentana5() {
        $(".ventana5").slideUp("fast");
    }

    function openVentana6() {
                
        $(".ventana6").slideDown("fast");
    }
    function closeVentana6() {
        $(".ventana6").slideUp("fast");
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

    $("#enviar").click(function(){

		if(!esVacio("rut"))
		{
			openVentana2();
			return false;
		}
		if(!validaRut("rut")){
			openVentana2();
			esInvalido("rut");
			return false;
		}
		else{
			aprobar("rut");
		}

		openVentana3();
		var radios = document.getElementsByName('tipo');
		var gender = '';
		for(var i=0;i<radios.length;i++)
		{
		   if(radios[i].checked)
	      	gender = radios[i].value;
		}

		var datos = new Object();
		datos["rut"] = $("#rut").val();
		datos["tipo"] = gender;

		$.ajax({
			type: "POST",
			data : datos,
			url : "./envia_correo.php",
			success: function(data){
				
			var res = jQuery.parseJSON(data); 

	        if(res.exito != 0){ 
	            
				window.location="ingreso.php";
	            
        	}else if(res.error==1)
        	{
	         	  	closeVentana3();
	         	  	openVentana5();
	        }
	        else if(res.error==2)
	        {
	        	closeVentana3();
	        	openVentana6();
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

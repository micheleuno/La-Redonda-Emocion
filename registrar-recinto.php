<?php
	##Formulario Registro Recinto
	##@autor : Victor Toledo
	##fecha : revision 13/08/15

	header ('Content-type: text/html; charset=ISO-8859-1');
?>
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
    <title>Registrar Recinto</title>
</head>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false">
	</script>
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

<!-- bloc-9 -->
<div class="bloc tc-napier-green bgc-mint-cream l-bloc" id="bloc-9">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="mg-md text-center tc-napier-green">
					Registro de recinto
				</h3>
				<div class="panel bgc-mint-cream">
					<div class="panel-body">
						<div class="row">
						<form id="registro_recinto">
							<div class="col-sm-6">
								
								<div class="form-group">
									<label>
										Nombre del recinto
									</label>
									<input id="nombre" class="form-control" placeholder="Nombre del recinto" />
								</div>
								<div class="form-group">
									<label>
										Regi&oacute;n
									</label>
									<select id="region" class="form-control">
										<option value="">Seleccione Regi&oacute;n</option>
			
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
										<option value="">Seleccione Provincia</option>
									</select>
								</div>
								<div class="form-group">
									<label>
										Comuna
									</label>
									<select class="form-control" id="comuna">
										<option value="">Seleccione Comuna</option>
									</select>
								</div>
								<div class="form-group">
									<label>
										Direcci&oacute;n
									</label>
									<input class="form-control" id="direccion" placeholder="Direcci&oacute;n" />
								</div>
								<div class="form-group">
									<label>
										Tel&eacute;fono
									</label>
									<input class="form-control" id="fono" placeholder="Telefono" />
								</div>
								<div class="form-group">
									<label>
										Correo Electr&oacute;nico
									</label>
									<input class="form-control" id="correo" placeholder="Correo Electr&oacute;nico" />
								</div>
								<div class="text-center">
									<button class="bloc-button btn btn-napier-green" id="registro" type="button">
										Registrar
									</button>
								</div>
							</div>
							<br>
							<div class="col-sm-6">
								<div class="panel">
									<div class="panel-body">
										<div class="form-group">
											<label>
												Seleccione su recinto en el mapa:
											</label>
											<div id="mapa" class="form-group">
				        						<!-- aqui va el mapa!!!! -->
				   							</div>
										    <div class="form-group" hidden>
										    	<div class="col-sm-6">
											    	<input type="text" class="form-control" readonly  id="cx" name="cx" autocomplete="off" hidden />
											    	<input type="text" class="form-control"  readonly id="cy" name="cy" autocomplete="off" hidden/>
										    	</div>
										    </div>
										</div>
									</div>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-9 END -->

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
	var nuevos_marcadores = [];

    //FUNCION PARA QUITAR MARCADORES DE MAPA
    function limpiar_marcadores(lista)
    {
        for(i in lista)
        {
            //QUITAR MARCADOR DEL MAPA
            lista[i].setMap(null);
        }
    }

    function fn_mal(){ 
    // esta no se usa
	}
    function fn_ok( rta ) { // esta funcion es la geolocalizacion exitosa
        
        var lat = rta.coords.latitude;
        var lon = rta.coords.longitude;

        //VARIABLE DE FORMULARIO
        var formulario = $("#registro_recinto");
        var punto = new google.maps.LatLng(lat,lon); 
        var config = {
            zoom:16,
            center:punto,
            mapTypeId: google.maps.MapTypeId.HYBRID
        };
        var mapa = new google.maps.Map( $("#mapa")[0], config );

        google.maps.event.addListener(mapa, "click", function(event){
           var coordenadas = event.latLng.toString();
           
           coordenadas = coordenadas.replace("(", "");
           coordenadas = coordenadas.replace(")", "");
           
           var lista = coordenadas.split(",");
           
           var direccion = new google.maps.LatLng(lista[0], lista[1]);
           //PASAR LA INFORMACIÓN AL FORMULARIO
           formulario.find("input[name='titulo']").focus();
           formulario.find("input[name='cx']").val(lista[0]);
           formulario.find("input[name='cy']").val(lista[1]);
           
           
           var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:direccion,
               map: mapa, 
               animation:google.maps.Animation.DROP,
               draggable:false
           });
           //ALMACENAR UN MARCADOR EN EL ARRAY nuevos_marcadores
           nuevos_marcadores.push(marcador);
           
           google.maps.event.addListener(marcador, "click", function(){

           });
           
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(mapa);
        });
    }// funcion geolocalizacion correcta

    navigator.geolocation.getCurrentPosition ( fn_ok , fn_mal);

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

    	if(!esVacio("region"))
    	{
    		openVentana2();
    		return false;
    	}
    	else
    	{
    		aprobar("region");
    	}

    	if(!esVacio("comuna"))
    	{
    		openVentana2();
    		return false;
    	}
    	else
    	{
    		aprobar("comuna");
    	}

    	if(!esVacio("provincia"))
    	{
    		openVentana2();
    		return false;
    	}
    	else
    	{
    		aprobar("provincia");
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

    	if(!esVacio("cx"))
    	{
    		openVentana6();
    		return false;
    	}

    	openVentana3();

    	var array = new Object();
    	array["nombre"] = $("#nombre").val();
    	array["region"] = $("#region").val();
    	array["provincia"] = $("#provincia").val();
    	array["comuna"] = $("#comuna").val();
    	array["direccion"] = $("#direccion").val();
    	array["telefono"] = $("#fono").val();
    	array["correo"] = $("#correo").val();
    	array["cx"] = $("#cx").val();
    	array["cy"] = $("#cy").val();

    	$.ajax({ 
	        type: "POST", 
	        data: array, 
	        url: './registro_recinto.php', 
	        success: function(data) { 
	        var res = jQuery.parseJSON(data); 

	        if(res.exito == 1){ 
	        	closeVentana3();
	        	openVentana4();
	        	window.location="perfil_admin.php"
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
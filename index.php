<?php
	include('conexionbd.php');
	session_start();
?>
<html>
<head>
    
    <?php include("head_comun.php");?>
    
    
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script language="javascript" >

		    // Mapa y Geolocalizacion


		    var marcadores_bd= [];
			var mapa = null; //VARIABLE GENERAL PARA EL MAPA


			navigator.geolocation.getCurrentPosition ( fn_ok , fn_mal);

	        function fn_mal(){ 
	            alert("Algo salio mal, danos permiso para usar tu GPS, recarga la pagina.");
	        }
	        function fn_ok( rta ) { // esta funcion es la geolocalizacion exitosa
	            var lat = rta.coords.latitude;
	            var lon = rta.coords.longitude;

	            var punto = new google.maps.LatLng(lat,lon);
	            var config = {
	                zoom:15,
	                center:punto,
	                mapTypeId: google.maps.MapTypeId.ROADMAP
	            };
	            mapa = new google.maps.Map( $("#mapa_index")[0], config );
	            listar();
	        }// funcion geolocalizacion correcta

	        function listar(){
	       		$.ajax({
	               type:"POST",
	               url:"mapas/iajax.php",
	               dataType:"JSON",
	               data:"&tipo=listar",
	               success:function(data){
	                   if(data.estado=="ok")
	                    {   
	                            $.each(data.mensaje, function(i, item){
	                            //OBTENER LAS COORDENADAS DEL PUNTO
	                            var posi = new google.maps.LatLng(item.cx, item.cy);//bien
	                            //CARGAR LAS PROPIEDADES AL MARCADOR
	                            var marca = new google.maps.Marker({
	                                position:posi,
	                                rut:item.administrador_rut_administrador,
	                                idrecinto: item.idrecinto,
	                                direccion: item.direccion,
	                                telefono: item.telefono_recinto,
	                                nombre: item.nombre_recinto,
	                                correo: item.correo_recinto,
	                                idcomuna: item.comunaid,
					icon: 'https://dl.dropboxusercontent.com/u/96166965/soccerfield.png',
					animation:google.maps.Animation.DROP,
					title:item.nombre_recinto

	                            });
	                            
				    var popup = new google.maps.InfoWindow({
				    	content: 'marcador default'
    			    	    });

				    google.maps.event.addListener(marca, "click", function(){
			    	    	if(!popup){
                		        	popup = new google.maps.InfoWindow();
            			        }
			    		var note = "Nombre Recinto: "+marca.title+"<br>"+"Direccion: "+marca.direccion+"<br>"+"Fono: "+marca.telefono+"<br>"+"Presiona de nuevo el icono para ir al recinto!";
				    	popup.setContent(note);
				    	popup.open(mapa, this);                   
				        
                                        //AGREGAR EVENTO CLICK AL MARCADOR
	                                google.maps.event.addListener(marca, "click", function(){
	                                	window.location.href = 'perfil_recinto.php?id_recinto='+marca.idrecinto;
	                             	});
			    	     });


	                            
	                            //AGREGAR EL MARCADOR A LA VARIABLE MARCADORES_BD
	                            marcadores_bd.push(marca);
	                            //UBICAR EL MARCADOR EN EL MAPA
	                            marca.setMap(mapa);
	                        });
	                    }
	                else
	                    {
	                        alert("No hay canchas cercanas a tu posici&oacute;n");
	                    }
	               },
	               beforeSend:function(){
	                   
	               },
	               complete:function(){
	                   
	               }
	           });
	    	}
		</script>
	<title>La Redonda Emoción</title>
</head>
<body>
<!-- Main container -->
<div class="page-container">
    
	<?php 
		include("menu_comun.php"); 
	?>

<!-- bloc-1 -->
<div class="bloc bg-repeat bgc-mint-cream l-bloc" id="bloc-1">
	<div class="container bloc-sm2">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="mg-md text-center tc-napier-green">
					Localiza las canchas más cercanas a ti...
				</h3>
				<div class="panel bgc-mint-cream">
					<div class="panel-body">
						<span class="empty-column">
							<div id="mapa_index">
						        <!-- aqui va el mapa!!!! -->
						    </div>
						</span>
					</div>
				</div>
				<div class="text-center">
					<a href="buscar-cancha.php" class="a-btn ltc-napier-green">O puedes utilizar nuestro buscador…(Solo clickeame)</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-1 END -->
	<?php include("footer_comun.php");?>
</div>
<!-- Main container END -->

</body>
    
<!-- Google Analytics -->

<!-- Google Analytics END -->

</html>
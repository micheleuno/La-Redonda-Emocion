<?php

	## Buscar Cancha
	## @autor : Victor
	## @fecha : revision 13/08
	## obs: consulta implementado 

    include("conexionbd.php");


    $limit_end = 4;
    $init = ($ini-1) * $limit_end;

    $numer = mysqli_query($conexion,"CALL contador_canchas_busqueda('$_GET[region]','$_GET[provincia]','$_GET[comuna]','$_GET[tipo]');") or die(mysqli_error($conexion));

    $valor = mysqli_fetch_row($numer);

    $total = ceil($valor[0]/$limit_end);

    $aux = mysqli_connect($host,$user,$pass,$db);

    $resp = mysqli_query($aux,"CALL buscar_recinto('$_GET[region]','$_GET[provincia]','$_GET[comuna]',
    '$_GET[tipo]','$init','$limit_end');") or die(mysqli_error($aux));

    

    echo "<h3 class='mg-md tc-napier-green'>Canchas</h3>";

    echo "<ul class=list-unstyled>";

    
        while ($pta=mysqli_fetch_array($resp)) {
            echo "<li>                  
                    <div class='form-group'>
                    <label>";
                    echo "Nombre de Recinto: $pta[nombre_recinto]";
                    echo "                              </label>        
                    </div>
                           
            </li>";
            echo "<li>                  
                    <div class='form-group'>
                    <label>";
                    echo "Numero de Cancha: $pta[numero_cancha]";
                    echo "                              </label>        
                    </div>
                           
            </li>";
            echo "<li>                  
                    <div class='form-group'>
                    <label>";
                    echo "Telefono: $pta[telefono_recinto]";
                    echo "                              </label>        
                    </div>
                           
            </li>";

            echo "<li>                  
                    <div class='form-group'>
                    <label>";
                    echo "Email: $pta[correo_recinto]";
                    echo "                              </label>        
                    </div>
                           
            </li>";

            echo "<a href='perfil_cancha.php?idc=$pta[idcancha]' class='btn (null) btn-napier-green'>Ver Cancha</a>";

            echo "<br><br>";
        }
    echo "</ul>";


	echo '<ul class="pagination">';
                                    
        for($k=1; $k<=$total; $k++)
        {
            echo "<li><a href='$url?pos=$k'>".$k."</a></li>";
        }

                                  
    echo '</ul>';


?>
<?php
	include('conexionbd.php');
	if (isset($_GET['pos']))
	{
  		$ini=$_GET['pos'];
	}
	else{
  		$ini=1;
  	} 
?>
<!doctype html>
<html>
<head>
    <?php include("head_comun.php");?>
    <link rel="stylesheet" type="text/css" href="./css/paginador.css">
    
    <title>Resultados Busqueda</title>
</head>
<body>
<!-- Main container -->
<div class="page-container">
    	
	<?php include("menu_comun.php");?>

<!-- bloc-15 -->
<div class="bloc bg-repeat bgc-mint-cream l-bloc" id="bloc-15">
	<br><br><br>
	<div class="container bloc-md">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="mg-md text-center tc-napier-green">
					Resultado Búsqueda:
				</h3>
				<div class="panel bgc-mint-cream">
					<div class="panel-body">
						<div class="panel">
							<div class="panel-body">
								<?php include("busqueda_canchas.php");?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-15 END -->
	<?php include("footer_comun.php");?>
</div>
<!-- Main container END -->

</body>
    
<!-- Google Analytics -->

<!-- Google Analytics END -->

</html>

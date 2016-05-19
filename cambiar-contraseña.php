<!doctype html>
<html>
<head>
    <?php include("head_comun.php");?>
	<script src='./js/formHandler.js'></script>
    <title>cambiar contraseña - </title>
</head>
<body>
<!-- Main container -->
<div class="page-container">
   <?php include("menu_comun.php");?>
   <!-- Navigation Bloc END --><!-- bloc-12 --><div class="bloc tc-napier-green bgc-mint-cream l-bloc" id="bloc-12">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<div class="panel bgc-mint-cream">
					<div class="panel-body">
						<form id="form-14" novalidate>
							<div class="form-group">
								<label>
									Contraseña actual:
								</label>
								<input id="actual" class="form-control" required data-validation-required-message="actual is required." type="password" />
							</div>
							<div class="form-group">
								<label>
									Nueva contraseña:
								</label>
								<input id="nueva" class="form-control" type="password" required data-validation-required-message="nueva is required." />
							</div>
							<div class="form-group">
								<label>
									Vuelva a escribir la nueva contraseña:
								</label>
							</div>
							<div class="form-group">
								<input class="form-control" id="nueva2" data-validation-required-message="nueva2 is required." type="password" />
							</div>
							<div class="text-center">
								<a href="index.html" class="btn (null)  btn-napier-green">Cambiar Contraseña</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- bloc-12 END --><!-- Footer - footer --><div class="bloc bgc-onyx d-bloc" id="footer">
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

</body>
    
<!-- Google Analytics -->

<!-- Google Analytics END -->

</html>

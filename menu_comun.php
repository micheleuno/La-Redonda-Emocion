	<!-- Navigation Bloc -->
	<div class="bloc bgc-black d-bloc" id="nav-bloc">
		<div class="container bloc-sm">
			<nav class="navbar row">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php"><img src="img/LOGO1.png" alt="logo" /></a>
					<button id="nav-toggle" type="button" class="ui-navbar-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
						<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navbar-1">
					<ul class="site-navigation nav navbar-nav">
						<?php
							if($_SESSION["rut"])
							{


								echo '
								<li>
									
									<div class="dropdown">
										<a class="dropdown-toggle" href="#" id="pl-1561" data-toggle="dropdown" aria-expanded="true"><strong>'.$_SESSION['rut'].'-'.$_SESSION['dv'].'</strong><span class="caret"></span></a>
										<ul class="dropdown-menu">
		                                <li>
		                                    <div class="navbar-login">
		                                        <div class="row">
		                                            <div class="col-lg-4">
		                                                <p class="text-center">';
		                                                    if($_SESSION['tipo']==2)
		                                                    {
		                                                        echo '<img width="100" height="100" src="img/perfiles/user/'.$_SESSION['rut'].' " alt="perfil" onerror=this.src="img/placeholder-user.png">';
		                                                    }
		                                                    else
		                                                    {
		                                                        echo '<img width="100" height="100" src="img/perfiles/admin/'.$_SESSION['rut'].' " alt="perfil" onerror=this.src="img/placeholder-user.png">';
		                                                    }
		                                                
		                                                echo '</p>
		                                            </div>
		                                            <div class="col-lg-8">
		                                                <p class="text-left"><strong>'.$_SESSION['nombre'].'</strong></p>
		                                                <p class="text-left small">'.$_SESSION['tipe'].'</p>
		                                                <p class="text-left">';
		                                                    if($_SESSION['tipo'] == 2)
		                                                    {
		                                                        echo '<a href="perfil_usuario.php" class="a-btn a-block ltc-napier-green">Ir al perfil</a>';
		                                                    }
		                                                    else
		                                                    {
		                                                        echo '<a href="perfil_admin.php" class="a-btn a-block ltc-napier-green">Ir al perfil</a>';
		                                                    }
		                                                    echo '
		                                                </p>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </li>
		                                <li class="divider"></li>
		                                <li>
		                                    <div class="navbar-login navbar-login-session">
		                                        <div class="row">
		                                            <div class="col-lg-12">
		                                                <p>
		                                                    <a href="logout.php" class="a-btn a-block ltc-napier-green">Cerrar Sesion</a>
		                                                </p>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </li>
		                            </ul>
									</div>
								</li>';
							}
							else
		                    {
		                		echo '
								<li>
									<a href="ingreso.php">Ingreso</a>
								</li>
								<li>
								<a href="registro.php">Registro</a>
								</li>';
		                    }
						?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- Navigation Bloc END -->	                    
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Embutidos El Aguila </title>
		<link rel="icon" href="imagenes/icono.png" charset="utf-8">
		<link rel="stylesheet" href="css/normalize.css">
	  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/style.css">
	  <link rel="stylesheet" href="css/contacto.css">
		<link href="https://cdn.jsdelivr.net/flexboxgrid/6.3.2/flexboxgrid.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<body>
		<header class="small">
				<nav>
					<img class="logo" id="logo" src="imagenes/logo2.png"/>
					<ul class="center-xs bottom">
						<li id="li">
							<a href="index.php">Inicio</a>
						</li>
						<li>
							<a href="historia.php">Historia</a>
						</li>
						<li>
							<a href="recetas.php">Recetas</a>
						</li>
						<li>
							<a href="galeria.php">Productos</a>
						</li>
						<li>
							<a href="contacto.php">Contacto</a>
						</li>
						<!--==========Botones de social media=========-->
						<div class="mediabuttons" >
							<div class="socialsy bgfc">
								<div>
									<i class="fa fa-facebook"></i>
								</div>
							</div>
							<div class="socialsy bgyt">
								<div href="#">
									<i class="fa fa-youtube"></i>
								</div>
							</div>
							<div class="socialsy bgins">
								<div>
									<i class="fa fa-instagram"></i>
								</div>
							</div>
						</div>
					</ul>
				</nav>
			</header>
	<div id="contacto">
		<!-- Contact with Map - START -->
		<div class="container">
		    <div class="row">
		        <div class="col-md-12">
		            <div>
		                <div class="panel panel-default">
		                    <div class="text-center header middle-xs">Contacto</div>
												<div class="row">
													<div class="col-md-6 col-xs-12">
														<div class="panel-body text-center">
															 <h4><a href="#" id="caracas">Caracas</a></h4>
															 <div>
															 2217 Washington Blvd<br />
															 Washington DC<br />
															 #(703) 1234 1234<br />
															 service@company.com<br />
															 </div>
													 </div>
													</div>
													<div class="col-md-6 col-xs-12">
														<div class="panel-body text-center">
															 <h4><a href="#" id="merida">Merida</a></h4>
															 <div>
															 2217 Washington Blvd<br />
															 Washington DC<br />
															 #(703) 1234 1234<br />
															 service@company.com<br />
															 </div>
													 </div>
													</div>
												</div>
												<hr />
												<div class="panel-body text-center">
													<div id="map1" class="map">
													</div>
											 </div>

		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>

		<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#merida").click(function(event) {
					/* Act on the event */
					$("#contacto").css("background-image","url(imagenes/DSC_0435.JPG)");
				});
				$("#caracas").click(function(event) {
					/* Act on the event */
					$("#contacto").css("background-image","url(imagenes/IMG_4066.jpg)");
				});
			});
		</script>


	</body>
</html>

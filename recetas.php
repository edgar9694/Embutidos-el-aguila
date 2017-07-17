<!DOCTYPE html>
<?php
require_once('admin/includes/config.php');
?>

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
  <link rel="stylesheet" href="css/recetas.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
	<header class="large">
			<nav>
				<img class="logo" src="imagenes/logo2.png"/>
				<ul class="center-xs absolute bottom">
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



<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js'></script>
			<script type="text/javascript">
				$(document).on("scroll",function(){
					if($(document).scrollTop()>100){
						$("header").removeClass("large").addClass("small");
						$("header ul").removeClass('absolute');
						}
					else{
						$("header").removeClass("small").addClass("large");
						$("header ul").addClass('absolute');
						}
					});
			</script>
      </body>
    </html>

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
		<meta content="5" data-name="image-counter">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
		<header class="large">
				<nav>
					<img class="logo" id="logo" src="imagenes/logo2.png"/>
					<ul>
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
			<div id="gallery">
				<div class="inner">
					<div class="image" style="background-image:url('imagenes/DSC_0283.JPG')"></div>
					<div class="image" style="background-image:url('imagenes/DSC_0285.JPG')"></div>
					<div class="image" style="background-image:url('imagenes/DSC_0289.JPG')"></div>
					<div class="image" style="background-image:url('imagenes/DSC_0313.JPG')"></div>
					<div class="image" style="background-image:url('imagenes/DSC_0315.JPG')"></div>
					<div class="image" style="background-image:url('imagenes/DSC_0318.JPG')"></div>
				</div>
			</div>


<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<!--JS code para la barra nav-->
<script type="text/javascript">
let currentPosition = 0
const imageCounter = $("[data-name='image-counter']").attr("content")

//intervalo que se ejecuta cada cierto tiempo, en este cada 5 segundos aumenta el currentPosition lo que aumenta el procentaje
setInterval(()=>{
	if(currentPosition < imageCounter)
	{
			currentPosition++
	} else {
		currentPosition = 0
	}

	$("#gallery .inner").css({
		left: "-"+currentPosition*100+"%"
	})
}, 3000)

	$(document).on("scroll",function(){
		if($(document).scrollTop()>100){
			$("header").removeClass("large").addClass("small");
			}
		else{
			$("header").removeClass("small").addClass("large");
			}
		});
</script>

  </body>
</html>

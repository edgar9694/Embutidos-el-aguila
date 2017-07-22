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
		<link href="https://cdn.jsdelivr.net/flexboxgrid/6.3.2/flexboxgrid.min.css" rel="stylesheet">
		<meta content="5" data-name="image-counter">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
  </head>

  <body>
		<div class="video-container">
			<video autoplay height="720" loop poster="videos/images/embutidos.png" width="1280">
				<source src="videos/mp4/embutidos.mp4" type="video/mp4">
				<source src="videos/webm/embutidos.webm" type="video/webm">
			</video>
		</div>
		<nav class="fixed top up transparent" id="navigation">
				<div class="container-fluid">
					<button class=" toggle">
							<div class="bar1"></div>
							<div class="bar2"></div>
							<div class="bar3"></div>
					</button>
					<div class="overlay">
					</div>
						<div class="navigation-brand"><img src="imagenes/logo2.png" class="hidden" alt="" width="200px" id="logo"></div>
								<ul class="navigation-list list-unstyled pull-right">
									<li>
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
									<li>
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
									</li>
								</ul>
							</div>
				</nav>
    <div class="row full-height middle-xs center-xs up" id="home">
			<div class="col-xs-12">
        <div class="box white-text">
          <img src="imagenes/logo.png" width="500">
        </div>
      </div>
			<div class="absolute black large-padding white-text full-width" id="description">
			</div>
    </div>
		<div class="text-center relative" id="menu">
			<div class="absolute white" id="menu-title">
				<a href="recetas.php" >
					<h2 class="dancing-script title">Recetas</h2>
				</a>
			</div>
			<div class="row">
				<div class="col-md-4 col-lg-3-col-sm-6 col-xs-12 food" >
					<a href="#">
						<img src="imgs/food/club-sandwich-thumb.jpg" >
							<div class="desc">
								<h4>Title 1</h4>
							</div>
					</a>
				</div>
				<div class="col-md-4 col-lg-3-col-sm-6 col-xs-12 food">
					<a href="#">
						<img src="imgs/food/combo-thumb.jpg" >
							<div class="desc">
								<h4>Title 1</h4>
							</div>
					</a>
				</div>
				<div class="col-md-4 col-lg-3-col-sm-6 col-xs-12 food" >
					<a href="#">
						<img src="imgs/food/hamburger-thumb.jpg" >
							<div class="desc">
								<h4>Title 1</h4>
							</div>
					</a>
				</div>
				<div class="col-md-4 col-lg-3-col-sm-6 col-xs-12 food" >
					<a href="#">
						<img src="imgs/food/hot-cakes-thumb.jpg" >
							<div class="desc">
								<h4>Title 1</h4>
							</div>
					</a>
				</div>
				<div class="col-md-4 col-lg-3-col-sm-6 col-xs-12 food" >
					<a href="#">
						<img src="imgs/food/panini-thumb.jpg" >
							<div class="desc">
								<h4>Title 1</h4>
							</div>
					</a>
				</div>
				<div class="col-md-4 col-lg-3-col-sm-6 col-xs-12 food">
					<a href="#">
						<img src="imgs/food/papas-thumb.jpg" >
							<div class="desc">
								<h4>Title 1</h4>
							</div>
					</a>
				</div>
			</div>
		</div>
		<div id="gallery">
      <div class="inner">
        <div class="image" style="background-image:url(imgs/food/club-sandwich.jpg)"></div>
        <div class="image" style="background-image:url(imgs/food/combo.jpg)"></div>
        <div class="image" style="background-image:url(imgs/food/hamburger.jpg)"></div>
        <div class="image" style="background-image:url(imgs/food/hot-cakes.jpg)"></div>
        <div class="image" style="background-image:url(imgs/food/panini.jpg)"></div>
        <div class="image" style="background-image:url(imgs/food/papas.jpg)"></div>
      </div>
    </div>


  <script  src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
	<script src="js/main.js"></script>
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
<script>
$(function () {
    $(".toggle").click(function () {
        showNavDrawer();
        $(this).toggleClass('change')
    });
    $(window).width(function () {
        sideNav();
    });
    $(window).resize(function () {
        sideNav();
    });
    $("nav .overlay").click(function () {
        $("nav .navigation-list").toggleClass("nav-collsaped");
        $("nav .overlay").toggleClass("body-overlay");
        $(".toggle").removeClass("change");

    });
    function sideNav(){
        if($(window).width()<=980){
        }
        else {
            $("nav .navigation-list").removeClass("nav-collsaped");
            $("nav .overlay").removeClass("body-overlay");
            $(".toggle").removeClass("change");
        }
    }
    function showNavDrawer(){
        $("nav .navigation-list").toggleClass("nav-collsaped");
        $("nav .overlay").toggleClass("body-overlay");
    }
});


</script>

  </body>
</html>

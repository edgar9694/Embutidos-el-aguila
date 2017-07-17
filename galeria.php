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
  <link rel="stylesheet" href="css/galeria.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css">
</head>

<body>

		<header class="large">
				<nav>
					<img class="logo" id="logo" src="imagenes/logo2.png"/>
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
<!--Stack de categoria de imagenes-->
<div id="stack">
<div class="toolbar mb2 mt2">
  <button class="btn fil-cat" href="" data-rel="all">Todas</button>
  <?php
		require("admin/includes/config.php");
    $stmt = $db2->prepare("SELECT * FROM categoria");
		$stmt->execute();
    while ($row = $stmt->fetch())
    {
    echo "<button class='btn fil-cat' data-rel='".$row['title']."'>".$row['title']."</button>";
    }
  ?>
</div>

<div style="clear:both;"></div>
<div id="portfolio">
<?php
	$stmt = $db2->prepare("SELECT * FROM galeria");
	$stmt->execute();
	while ($sqlimg = $stmt->fetch())
	{
	  $imgs = explode(";",$sqlimg['location']);
	  foreach ($imgs as $singleimg) {
	    echo '<div class="title scale-anm '.$sqlimg['category'].' all">';
	    echo '<img src="admin/'.$singleimg.'" alt="" />';
	    echo '</div>';
  }

}
 ?>
</div>

<div style="clear:both;"></div>


    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
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
    <script>
    $(function() {
      var selectedClass = "";
      $(".fil-cat").click(function(){
      selectedClass = $(this).attr("data-rel");
       $("#portfolio").fadeTo(100, 0.1);
      $("#portfolio div").not("."+selectedClass).fadeOut().removeClass('scale-anm');
      setTimeout(function() {
        $("."+selectedClass).fadeIn().addClass('scale-anm');
        $("#portfolio").fadeTo(300, 1);
      }, 300);

    });
    });
    </script>
		<script>
		$("#menu-opener").on("click", toggleNav);

		function toggleNav(){
			$(".pull ul").toggleClass("active")
			$("#menu-opener").toggleClass("glyphicon-menu-hamburger")
		}

		var navbarHeight = $('.navbar').height();

		$(window).scroll(function() {
			var navbarColor = "62,195,246";//color attr for rgba
			var smallLogoHeight = $('.small-logo').height();
			var bigLogoHeight = $('.big-logo').height();


			var smallLogoEndPos = 0;
			var smallSpeed = (smallLogoHeight / bigLogoHeight);

			var ySmall = ($(window).scrollTop() * smallSpeed);

			var smallPadding = navbarHeight - ySmall;
			if (smallPadding > navbarHeight) { smallPadding = navbarHeight; }
			if (smallPadding < smallLogoEndPos) { smallPadding = smallLogoEndPos; }
			if (smallPadding < 0) { smallPadding = 0; }

			$('.small-logo-container ').css({ "padding-top": smallPadding});

			var navOpacity = ySmall / smallLogoHeight;
			if  (navOpacity > 1) { navOpacity = 1; }
			if (navOpacity < 0 ) { navOpacity = 0; }
			var navBackColor = 'rgba(' + navbarColor + ',' + navOpacity + ')';
			$('.navbar').css({"background-color": navBackColor});
			$('.navbar').removeClass('hidden');
			var shadowOpacity = navOpacity * 0.4;
			if ( ySmall > 1) {
				$('.navbar').css({"box-shadow": "0 2px 3px rgba(0,0,0," + shadowOpacity + ")"});
			} else {
				$('.navbar').css({"box-shadow": "none"});
			}

			if ($('body').scrollTop() == 0)
			{
				$('.navbar').addClass('hidden');
			}



		});

		</script>
      </body>
    </html>

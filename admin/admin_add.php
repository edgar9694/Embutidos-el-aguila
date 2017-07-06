<?php
 //include config
 require_once('includes/config.php');

 //if not logged in redirect to login page
 if(!$user->is_logged_in()){ header('Location: ../login.php'); }


 extract($_GET);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Embutidos El Aguila - Agregar Imagenes</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.6 -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 	<!-- iCheck for checkboxes and radio inputs -->
 	<link rel="stylesheet" href="plugins/iCheck/all.css">
 	<!--tags style-->
   <link href="resources/tags/css/bootstrap-tagsinput.css" rel="stylesheet">
 	<!--file input style-->
 	<link href="resources/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
 	<!-- bootstrap wysihtml5 - text editor -->
 	<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
   <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="dist/css/skins/skin-yellow.min.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
 </head>
 <body class="hold-transition skin-yellow sidebar-mini">
 <!-- Site wrapper -->
 <div class="wrapper">

 	<?php include("header.php"); ?>

   <!-- =============================================== -->

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
      Administrador
       </h1>
       <ol class="breadcrumb">
 				<li><a href="index_admin.php"><i class="fa fa-dashboard"></i>Inicio</a></li>
				<?php
				switch ($class) {
					case 'blog_posts':
						echo '<li><a href="admin_list.php?class=blog_posts+blog_cats">Blog</a></li>
	          			<li class="active">Agregar Entradas</li>';
						break;
					case 'blog_cats':
						echo '<li><a href="admin_list.php?class=blog_posts+blog_cats">Blog</a></li>
	          			<li class="active">Agregar Categorias</li>';
						break;
					case 'recetas':
						echo '<li class="active">Recetas</li>
									<li class="active">Agregar Recetas</li>';
						break;
					case 'galeria':
						echo '<li class="active">Galeria</li>
									<li class="active">Agregar Imagenes</li>';
						break;
					case 'categoria':
						echo '<li class="active">Categoria</li>
									<li class="active">Agregar Categorias</li>';
						break;

					default:

						break;
				}
				 ?>
       </ol>
     </section>

     <!-- Main content -->
     <section class="content">

			 <div class="box">
		 		<div class="box-header with-border">
		 			<h3 class="box-title">
						<?php
							switch ($class) {
								case 'blog_posts':
									echo 'Entradas del Blog';
									break;
								case 'blog_cats':
									echo 'Categorias del Blog';
									break;
								case 'recetas':
									echo 'Recetas';
									break;
								case 'galeria':
									echo 'Galeria';
									break;
								case 'categoria':
									echo 'Categoria';
									break;
								default:

									break;
							}
						?>
				 	</h3>
		 		</div>
		 		<div class="box-body">
					<?php
						if ($class == "recetas" || $class == "galeria") {
							echo '<form id="form'.$class.'" role="form" action="addcontent.php" enctype="multipart/form-data" method="post">';
						} else {
							echo '<form id="form'.$class.'" role="form" action="addcontent.php" method="post">';
						}

						include ('add.php');
					?>
		 		</div>
				<div class="box-footer">
					<?php echo '<button type="submit" id="enviar" class="btn btn-primary" onclick="form'.$class.'.submit()">Subir</button>' ?>
				</div>
				</form>
		 	</div>
     </section>
     <!-- /.content -->

 		<?php include("menu_admin.php"); ?>


   </div>
   <!-- /.content-wrapper -->

   <footer class="main-footer">

   </footer>

 </div>
 <!-- ./wrapper -->

 <!-- jQuery 2.2.3 -->
 <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
 <!-- Bootstrap 3.3.6 -->
 <script src="bootstrap/js/bootstrap.min.js"></script>
 <!-- SlimScroll -->
 <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="plugins/fastclick/fastclick.js"></script>
 <!--tags-->
 <script src="resources/tags/js/bootstrap-tagsinput.js"></script>
 <!--fileinput-->
 <script src="resources/fileinput/js/fileinput.js" type="text/javascript"></script>
 <!-- iCheck 1.0.1 -->
 <script src="plugins/iCheck/icheck.min.js"></script>
 <!-- Bootstrap WYSIHTML5 -->
 <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
 <!-- AdminLTE App -->
 <script src="dist/js/app.min.js"></script>
 <script>
   $(function () {
     //bootstrap WYSIHTML5 - text editor
     $(".textarea").wysihtml5();

 		//iCheck for checkbox and radio inputs
 	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
 		checkboxClass: 'icheckbox_minimal-blue',
 		radioClass: 'iradio_minimal-blue'
 	});
   });
 </script>
 <script>
 		$("#file-3").fileinput({
 			showUpload: false,
 			showCaption: false,
 			browseClass: "btn btn-primary btn-sm",
 			fileType: "any",
 			maxFileCount: 1,
 			validateInitialCount: true,
 			overwriteInitial: false,
 					previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
 		});
 		$("#file-4").fileinput({
 			showUpload: false,
 			showCaption: false,
 			browseClass: "btn btn-primary btn-sm",
 			fileType: "any",
 			validateInitialCount: true,
 			overwriteInitial: false,
 					previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
 		});
 		</script>
		<script>
$(document).ready(function(){
		var consulta;
		var clase = $("#class").val();

		//hacemos focus
		$("#titulo").focus();

		//comprobamos si se pulsa una tecla
		$("#titulo").keyup(function(e){
					 //obtenemos el texto introducido en el campo
					 consulta = $("#titulo").val();
					 clase = $("#class").val();

					 var parametros = {"b" : consulta, "class" : clase}

					 //hace la búsqueda
					 $("#respuesta").delay(1000).queue(function(n) {

								$("#respuesta").html('<img src="imagenes/ajax-loader.gif" />');

											$.ajax({
														type: "POST",
														url: "comprobar.php",
														data: parametros,
														dataType: "html",
														error: function(){
																	alert("error petición ajax");
														},
														success: function(data){
																	$("#respuesta").html(data);
																	n();
																	if(data == "0"){
																		$("#enviar").attr("disabled", true);
																	}
														}
								});

					 });

		});

});
</script>
 </body>
 </html>

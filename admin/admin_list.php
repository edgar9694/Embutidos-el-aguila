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
   <title>Embutidos El Aguila - Imagenes</title>
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
 	<!-- DataTables -->
 	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
 	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
 	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.bootstrap.min.css">
 	<!-- Lightbox -->
 	<link href="plugins/lightbox/dist/ekko-lightbox.css" rel="stylesheet">
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
						echo '<li>Blog</li>
	          			<li class="active">Administrar Entradas</li>';
						break;
					case 'blog_cats':
						echo '<li>Blog</li>
	          			<li class="active">Administrar Categorias</li>';
						break;
					case 'recetas':
						echo '<li class="active">Recetas</li>
									<li class="active">Administrar Recetas</li>';
						break;
					case 'galeria':
						echo '<li class="active">Galeria</li>
									<li class="active">Administrar Galeria</li>';
						break;
					case 'categoria':
						echo '<li class="active">Categoria</li>
									<li class="active">Administrar Categorias</li>';
						break;

					default:

						break;
				}
				 ?>
       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
			 <?php

			 switch ($status) {
			 	case 'existe':
						echo  ' <div id="mensaje" class="alert alert-warning alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<h4><i class="icon fa fa-warning"></i> Atenci&oacute;n ya existe el archivo en cuesti&oacute;n</h4>
										</div>';
			 		break;
				case 'creada':
					echo  ' <div id="mensaje" class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<h4><i class="icon fa fa-check"></i>Archivo Subido con &eacute;xito</h4>

									</div>';
					break;
			 	default:

			 		break;
			 }

			  ?>

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
							case 'ingredientes':
								echo 'Lista de Ingredientes';
								break;
							default:

								break;
						}
						 ?>
					</h3>
		 		</div>
		 		<div class="box-body">
				<form role="form" action="eliminar.php?class=<?php echo$class; ?>" method="post">
		 		 <table id="<?php echo $class; ?>" class="table table-bordered table-striped">
		 			 <thead>
		 			 <tr>
						 <?php
						 switch ($class) {
						 	case 'blog_posts':
								echo '<th style="text-align:center">T&iacute;tulo</th>
					 		 				<th style="text-align:center">Fecha de creaci&oacute;n</th>
					 		 				<th style="text-align:center">Acci&oacute;n</th>
											<th style="text-align:center;padding:8px">Selecci&oacute;n
												<label>
													<input type="checkbox" class="minimal all" >
												</label>
											</th>';
						 		break;
	////////////////////////////////////////////////////////////////////////////////////////
							case 'blog_cats':
								echo '<th style="text-align:center">T&iacute;tulo</th>
											<th style="text-align:center">Acci&oacute;n</th>
											<th style="text-align:center;padding:8px">Selecci&oacute;n
												<label>
													<input type="checkbox" class="minimal all" >
												</label>
											</th>';
								break;
	////////////////////////////////////////////////////////////////////////////////////////
							case 'recetas':
								echo '<th style="text-align:center">Titulo</th>
											<th style="text-align:center">Fecha de creaci&oacute;n</th>
											<th style="text-align:center">Acci&oacute;n</th>
											<th style="text-align:center;padding:8px">Selecci&oacute;n
												<label>
													<input type="checkbox" class="minimal all" >
												</label>
											</th>';
								break;
	////////////////////////////////////////////////////////////////////////////////////////
							case 'galeria':
								echo '<th style="text-align:center">Titulo</th>
				              <th style="text-align:center">Vista Previa</th>
											<th style="text-align:center">Categoria</th>
				              <th style="text-align:center;padding:8px">Selecci&oacute;n
												<label>
													<input type="checkbox" class="minimal all" >
												</label>
											</th>';
								break;
  ////////////////////////////////////////////////////////////////////////////////////////
							case 'categoria':
								echo '<th style="text-align:center">Titulo</th>
											<th style="text-align:center">N° de imagenes</th>
											<th style="text-align:center">Acci&oacute;n</th>
											<th style="text-align:center;padding:8px">Selecci&oacute;n
												<label>
													<input type="checkbox" class="minimal all" >
												</label>
											</th>';
								break;
	////////////////////////////////////////////////////////////////////////////////////////
							case 'ingredientes':
								echo '<th style="text-align:center">Titulo</th>
											<th style="text-align:center">unidad de medici&oacuten</th>
											<th style="text-align:center">Acci&oacute;n</th>
											<th style="text-align:center;padding:8px">Selecci&oacute;n
												<label>
													<input type="checkbox" class="minimal all" >
												</label>
											</th>';
								break;
////////////////////////////////////////////////////////////////////////////////////////
							case 'usuarios':

								break;
	////////////////////////////////////////////////////////////////////////////////////////

						 	default:
						 		echo "Lo sentimos No existe la opci&oacute;n de su solicitud";
						 		break;
						 }
						  ?>
		 			 </tr>
		 			 </thead>
		 			 <tbody>
						 <?php include('list.php'); ?>
		 			 </tbody>
		 		 </table>
					 <div class="pull-right">
						 <input type="submit" value="Eliminar Seleccionados" class="btn btn-danger disabled" id="delBtn">
					 </div>
				 </form>
		 		</div>
		 	</div>
			<?php


		if ($class == "blog_cats" || $class == "categoria" || $class == "ingredientes") {
				echo '<div class="box">
								<div class="box-header with-border">
									<h3 class="box-title">Agregar o editar '.$class.'</h3>
								</div>
								<div class="box-body">';

								if ($status == "editar") {
									echo '<form action="editContent.php" method="post">';
								} else {
									echo '<form action="addContent.php" method="post">';
								}

										switch ($class) {
											case 'blog_cats':
														if(isset($error)){
															foreach($error as $error){
																echo $error.'<br />';
															}
														}

												try {

															$stmt = $db->prepare('SELECT catID, title FROM blog_cats WHERE catID = :catID') ;
															$stmt->execute(array(':catID' => $_GET['id']));
															$row = $stmt->fetch();

														} catch(PDOException $e) {
															echo $e->getMessage();
														}
														?>
																<div class="form-group col-md-8 col-md-offset-2">
																	<label class="control-label">Nombre</label>
																	<input type="hidden" name="catID" value="<?php echo $row['catID']; ?>" class="form-control">
																	<input type="text" name="title" class="form-control"  value="<?php echo $row['title']; ?>">
																</div>
																<input type="hidden" name="class" value="blog_cats">
												<?php
												break;
////////////////////////////////////////////////////////////////////////////////////////////////////////
											case 'categoria':

														if(isset($error)){
															foreach($error as $error){
																echo $error.'<br />';
															}
														}

												try {

															$stmt = $db2->prepare('SELECT id, title FROM categoria WHERE id = :id') ;
															$stmt->execute(array(':id' => $_GET['id']));
															$row = $stmt->fetch();

														} catch(PDOException $e) {
															echo $e->getMessage();
														}
														?>
																<div class="form-group col-md-8 col-md-offset-2">
																	<label class="control-label">Nombre</label>
																	<input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control">
																	<input type="text" name="title" class="form-control"  value="<?php echo $row['title']; ?>">
																</div>
																<input type="hidden" name="class" value="categoria">
												<?php
												break;
											case 'ingredientes':

															if(isset($error)){
																foreach($error as $error){
																	echo $error.'<br />';
																}
															}

													try {

																$stmt = $db2->prepare('SELECT ingID, title FROM ingredientes WHERE ingID = :id') ;
																$stmt->execute(array(':id' => $_GET['id']));
																$row = $stmt->fetch();

															} catch(PDOException $e) {
																echo $e->getMessage();
															}
															?>
																<div class="form-group col-md-4 col-md-offset-2">
																	<input type="hidden" name="id" value="'.$row['id'].'" class="form-control">
																	<label class="control-label">Nombre</label>
																	<input type="text" name="title" class="form-control"  value="<?php echo $row['title'];?>">
																</div>
																<div class="form-group col-md-4">
																	<label>Unidad de medici&oacute;n</label>
																	<select class="form-control" name="type">

																	</select>
																</div>
																<div class="form-group col-md-8 col-md-offset-2">
																	<label >descripci&oacute;n <p class="help-block" style="display:inline-block">200 caracteres</p></label>
																	<textarea class="textarea" name="description" maxlength="200" rows="2" style="resize:none;width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
																</div>
																<input type="hidden" name="class" value="ingredientes">
													<?php
													break;

											default:
												# code...
												break;
										}
				echo '</div>
							 	<div class="box-footer">
									<input type="submit" class="btn btn-primary" id="enviar" value="Subir">
								</div>
								</form>
							</div>';
			}
			?>
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
 <!-- DataTables -->
 <script src="plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
 <!-- Lightbox -->
 <script src="plugins/lightbox/dist/ekko-lightbox.js"></script>
 <!-- SlimScroll -->
 <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="plugins/fastclick/fastclick.js"></script>
 <!-- iCheck 1.0.1 -->
 <script src="plugins/iCheck/icheck.min.js"></script>
 <!-- AdminLTE App -->
 <script src="dist/js/app.min.js"></script>
 <!-- table script -->
 <script src="dist/js/functiontables.js"></script>
 <!-- page script -->
 <script>
 $(document).on('click', '[data-toggle="lightbox"]', function(event) {
     event.preventDefault();
     $(this).ekkoLightbox();
 });
 </script>
 <script>
$(document).ready(function(){
 var consulta;
 var clase;

 //hacemos focus
 $("#titulo").focus();

 //comprobamos si se pulsa una tecla
 $("#titulo").blur(function(e){
				//obtenemos el texto introducido en el campo
				consulta = $("#titulo").val();
				clase = $("#class").val();

				var parametros = {"b" : consulta, "class" : clase}

				//hace la búsqueda
				$("#respuesta").delay(400).queue(function(n) {

						 $("#respuesta").html('<img src="imagenes/ajax-loader.gif" />');

									 $.ajax({
												 type: "POST",
												 url: "comprobar.php?class="+clase,
												 data: "b="+consulta,
												 dataType: "html",
												 error: function(){
															 alert("error petición ajax");
												 },
												 success: function(data){
															 $("#respuesta").html(data);
															 n();
															 if(data == "<span style='font-weight:bold;color:red;'>La Categoria ya existe.</span>"){
																 $("#enviar").addClass('disabled');
															 } else {
															 	$("#enviar").removeClass('disabled');
															 }
												 }
						 });

				});

 });

});
</script>
 </body>
 </html>

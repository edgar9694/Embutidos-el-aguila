<?php //include config
require_once('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

require 'conectDB.php';
extract($_GET);

$query = mysqli_query($conn,"SELECT * FROM recetas where id='$id'" );
if (!$query)
{
      echo("Error description: " . mysqli_error($conn));
}
while ($row = mysqli_fetch_row($query))
{
			$id=$row[0];
			$title=$row[1];
			$desc=$row[2];
			$ing=$row[3];
      $level=$row[4];
      $locations=$row[5];
      $diners=$row[6];
      $prep=$row[7];
      $url=$row[8];
      $tags=$row[9];

		}
    $imgs = explode(";",$locations);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Delicateses El Aguila - Agregar Recetas</title>
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
        Agregar Entrada
      </h1>
      <ol class="breadcrumb">
        <li><a href="index_admin.php"><i class="fa fa-book"></i>Inicio</a></li>
        <li><a href="blog_admin.php">Blog</a></li>
        <li class="active">Agregar Entrada</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Formulario</h3>
        </div>
				<form role="form" action="uploadrecipe.php" enctype="multipart/form-data">
					<div class="box-body">
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<div class="form-group">
              <label>T&iacute;tulo</label>
              <input class="form-control" value="<?php echo $title ?>" type="text" name="titulo" required>
            </div>
						<div class="form-group">
              <label>Descripci&oacute;n de la receta</label>
              <textarea class="textarea" name="descripcion" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
								<?php echo"$desc";?>
							</textarea>
            </div>
						<div class="form-group">
							<label>Instrucciones para preparar la receta</label>
							<textarea class="textarea" name="preparacion" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $ing ?></textarea>
						</div>
						<div class="form-group">
	            <label for="Level">Dificultad de la Receta</label>
	            <div>
	             	<select class="form-control" name="level" value="<?php echo $level ?>">
	                <option value="facil">Facil</option>
	                <option value="intermedio">Intermedio</option>
	                <option value="dificil">Dificil</option>
	              </select>
	            </div>
	        	</div>
						<div class="form-group" style="margin-top:30px">
					    <label for="CantComensales">Cantidad de Comensales</label>
					    <div>
					      <input type="number" class="form-control" name="comensales" value="<?php echo $diners ?>" required>
					    </div>
					  </div>
						<div class="form-group" style="margin-top:30px">
					    <label for="CantComensales">Tiempo de preparaci&oacute;n <p class="help-block">
									colocar tiempo en minutos
								</p></label>
					    <div >
					      <input type="number" class="form-control" name="tiempo" value="<?php echo $prep ?>" required>
					    </div>
					  </div>
						<div class="form-group">
							<label>Video de Preparaci&oacute;n</label>
							<input class="form-control" value="<?php echo $url ?>"  type="text" name="video" >
						</div>
						<div class="form-group">
							<hr>
							<label>Etiquetas</label>
							<input type="text" class="form-control" name="etiquetas" data-role="tagsinput"  value="<?php echo $tags ?>">
						</div>
						  <input type="hidden" name="locations" value="<?php echo $locations ?>">
						<div class=" kv-main">
							<div class="form-group">
									<label>Imagenes</label>
									<input id="file-3" type="file" name="img[]" multiple=true>
							</div>
						</div>
					<!-- /.box-body -->
					<div class="box-footer">
						  <input class="btn btn-success" onclick="formrecipe.submit()" type="button" name="enviar" value="Subir Receta">
					</div>
				</form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

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
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!--tags-->
<script src="resources/tags/js/bootstrap-tagsinput.js"></script>
<!--fileinput-->
<script src="resources/fileinput/js/fileinput.js" type="text/javascript"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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
    maxFileCount: 4,
    validateInitialCount: true,
    overwriteInitial: false,
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
  });
</script>
</body>
</html>

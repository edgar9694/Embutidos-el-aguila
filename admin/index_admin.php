<?php
require_once('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Embutidos El Aguila - Admin Inicio</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
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
<div class="wrapper">

<?php include("header.php"); ?>


<!---------------------------------- Content Wrapper. Contains page content ----------------------------->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inicio
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de Control</li>
      </ol>
    </section>
<!------------------------------------------ End Content Wrapper --------------------------------------->

<!------------------------------------------ Main content ---------------------------------------------->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
				<?php
				try {
					$rec = $db2->query("SELECT * FROM recetas");
					$numRec = $rec->rowCount();
					$img = $db2->query("SELECT * FROM galeria");
					$numImg = $img->rowCount();
					$blog = $db2->query("SELECT * FROM ingredientes ");
					$numBlog =  $blog->rowCount();
					$cat = $db2->query("SELECT * FROM categoria ");
					$numCat = $cat->rowCount();

				} catch (PDOException $e) {
					 echo $e->getMessage();

				}

				?>
				<!-- Resumen recetas -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php printf($numRec); ?></h3>

              <p>Recetas en total</p>
            </div>
            <div class="icon">
              <i class="ion ion-document-text"></i>
            </div>
            <a href="recipe_admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
				<!-- Recetas -->

        <!-- Productos -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php printf($numImg); ?></sup></h3>

              <p>Nro de Productos</p>
            </div>
            <div class="icon">
              <i class="ion ion-soup-can"></i>
            </div>
            <a href="gallery_admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- Imagenes -->

			  <!-- Blog -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php printf($numBlog); ?></h3>

              <p>Entradas de Blog</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-bookmarks"></i>
            </div>
            <a href="blog_admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- Blog -->

				<!-- Categorias -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php printf($numCat); ?></h3>

              <p>Nro de categorias</p>
            </div>
            <div class="icon">
              <i class="ion ion-navicon-round"></i>
            </div>
            <a href="category_admin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      	<!-- Categorias -->
      </div>
      <!-- /.row -->


      <!-- Main row -->
      <div class="row">
					<!-- End Center col -->
					<div class="col-md-12">
		<!-------------------------- Recetas Box ----------------------------------->

						<div class="box">
									<div class="box-header">
										<h3 class="box-title">Ultimas Recetas Añadidas</h3>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<table id="example2" class="table table-bordered table-hover">
											<thead>
											<tr>
												<th>Nombre</th>
												<th>Tiempo</th>
												<th>Fecha de Creaci&oacute;n</th>
												<th>Acci&oacute;n</th>
											</tr>
											</thead>
											<tbody>
												<?php
												try{

													$listRecipe = $db2->query("SELECT * FROM RECETAS ORDER BY recdate DESC LIMIT 3");
													while ($nameRecipe = $listRecipe->fetch())
													{
													?>
														<tr>
															<?php
																echo "<td>". $nameRecipe["title"] ."</td>";
																echo "<td>". $nameRecipe["esttime"] ."</td>";
																echo "<td>". $nameRecipe["recdate"] ."</td>";
																echo "<td><a href=update_recipe.php?id=".$nameRecipe["recipeID"].">Editar</a></td>";
															 ?>
														</tr>
												 <?php
												 }
											 } catch (PDOException $e) {
												 echo $e->getMessage();

											}
													?>

											</tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

		<!------------------------------------ End Recetas Box --------------------->

					</div>
					<!-- End Center col -->




      	<!---------------------------------- Columna izquierda ------------------------------------>
        <section class="col-lg-7 ">



        </section>
				<!---------------------------------- End Columna izquierda ------------------------------------>

        <!------------------------------------ Columna derecha ------------------------------------>
        <section class="col-lg-5 ">

        </section>
      	<!---------------------------------- End Columna Derecha ---------------------------------->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!---------------------------------- End Contenido ---------------------------------->

		<?php include("menu_admin.php"); ?>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">

  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
</body>
</html>

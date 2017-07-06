<?php //include config
require_once('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); }
require 'conectDB.php';
extract($_GET);

try {

								$stmt = $db2->prepare('SELECT id, user, email FROM users WHERE id = :id') ;
								$stmt->execute(array(':id' => $_GET['id']));
								$row = $stmt->fetch();

							} catch(PDOException $e) {
									echo $e->getMessage();
							}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Embutidos El Aguila - Perfil Administrador</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perfil
      </h1>
      <ol class="breadcrumb">
        <li><a href="index_admin.php"><i class="fa fa-dashboard"></i> inicio</a></li>
        <li><a href="users.php">Usuarios</a></li>
        <li class="active">Perfil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $row['user'];?></h3>

              <p class="text-muted text-center">Administrador</p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
				<?php

						//if form has been submitted process it
						if(isset($_POST['submit'])){

							//collect form data
							extract($_POST);

							//very basic validation
							if($username ==''){
								$error[] = 'Please enter the username.';
							}

							if( strlen($password) > 0){

								if($password ==''){
									$error[] = 'Please enter the password.';
								}

								if($passwordConfirm ==''){
									$error[] = 'Please confirm the password.';
								}

								if($password != $passwordConfirm){
									$error[] = 'Passwords do not match.';
								}

							}


							if($email ==''){
								$error[] = 'Please enter the email address.';
							}


							if(!isset($error)){

								try {

									if(isset($password)){

										$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

										//update into database
										$stmt = $db2->prepare('UPDATE users SET user = :username, password = :password, email = :email WHERE id = :id') ;
										$stmt->execute(array(
											':username' => $username,
											':password' => $hashedpassword,
											':email' => $email,
											':id' => $id
										));


									} else {

										//update database
										$stmt = $db2->prepare('UPDATE users SET user = :username, email = :email WHERE id = :id') ;
										$stmt->execute(array(
											':username' => $username,
											':email' => $email,
											':id' => $id
										));

									}


									//redirect to index page
									header('Location: users.php?action=updated');
									exit;

								} catch(PDOException $e) {
										echo $e->getMessage();
								}

							}

						}

						?>


						<?php
						//check for any errors
						if(isset($error)){
							foreach($error as $error){
								echo $error.'<br />';
							}
						}

							try {

								$stmt = $db2->prepare('SELECT id, user, email FROM users WHERE id = :id') ;
								$stmt->execute(array(':id' => $_GET['id']));
								$row = $stmt->fetch();

							} catch(PDOException $e) {
									echo $e->getMessage();
							}

						?>

        <div class="col-md-9">
          <div class="box">
						<div class="box-header with-border" style="text-align:center">
		          <h3  class="box-title">Cambiar datos del usuario</h3>
		        </div>
            <div class="box-body">
              <form class="form-horizontal" action=""  method="post">
								<input type="hidden" name="id" value='<?php echo $row['id'];?>'>
                <div class="form-group">
                  <label for="Usuario" class="col-sm-2 control-label">Usuario</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" name="username" value='<?php echo $row['user'];?>' required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Correo" class="col-sm-2 control-label">Correo</label>
                  <div class="col-sm-10">
                  	<input class="form-control"  type="text" name="email" value='<?php echo $row['email'];?>' required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Contraseña" class="col-sm-2 control-label">Contraseña</label>
                  <div class="col-sm-10">
                    <input class="form-control"  type="password" name="password" value="" required>
										<p class="text-help">(Escriba solo si va a cambiarla)</p>
                  </div>
                </div>
								<div class="form-group">
									<label for="Contraseña" class="col-sm-2 control-label">Confirmar Contraseña</label>
									<div class="col-sm-10">
										<input class="form-control"  type="password" name="passwordConfirm" value="" required>
									</div>
								</div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn btn-success" type="submit" name="submit" value="Actualizar Usuario">
                  </div>
                </div>
              </form>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
</body>
</html>

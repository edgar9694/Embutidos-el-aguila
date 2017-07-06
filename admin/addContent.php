<?php
//include config
require_once('includes/config.php');
extract($_POST);

switch ($class) {
	////////////////////////////////////////////////////////////////////////////////////////////////
	case 'blog_posts':
		try {
					$postSlug = slug($postTitle);

					//insert into database
					$stmt = $db->prepare('INSERT INTO blog_posts_seo (postTitle,postSlug,postDesc,postCont,postDate) VALUES (:postTitle, :postSlug, :postDesc, :postCont, :postDate)') ;
					$stmt->execute(array(
						':postTitle' => $postTitle,
						':postSlug' => $postSlug,
						':postDesc' => $postDesc,
						':postCont' => $postCont,
						':postDate' => date('Y-m-d H:i:s')
					));
					$postID = $db->lastInsertId();

					//add categories
					if(is_array($catID)){
						foreach($_POST['catID'] as $catID){
							$stmt = $db->prepare('INSERT INTO blog_post_cats (postID,catID)VALUES(:postID,:catID)');
							$stmt->execute(array(
								':postID' => $postID,
								':catID' => $catID
							));
						}
					}
					//redirect to index page
					echo "<script>location.href='admin_list.php?class=blog_posts&status=creado'</script>";
					exit;

				} catch(PDOException $e) {
				    echo $e->getMessage();
				}
		break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'blog_cats':
			try {

				$catSlug = slug($title);

				//insert into database
				$stmt = $db->prepare('INSERT INTO blog_cats (title,catSlug) VALUES (:title, :catSlug)') ;
				$stmt->execute(array(
					':title' => $title,
					':catSlug' => $catSlug
				));

				//redirect to index page
				echo "<script>location.href='admin_list.php?class=blog_cats&status=creada'</script>";
				exit;

			} catch(PDOException $e) {
					echo $e->getMessage();
			}
			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'recetas':

			date_default_timezone_set('America/Caracas');
			require 'conectDB.php';
			require 'functions.php';
			require 'rating/_config-rating.php';

			$title = $_POST['titulo'];
			$description = $_POST['descripcion'];
			$preparation=$_POST['preparacion'];
			$esttime = $_POST['hr']." Horas y ".$_POST['mn']. "minutos";
			$categoria="recetas";
			$recdate=date('Y-m-d');
			$arrayImg="";

			$nombre_carpeta="imagenes/recetas/$title";
			if(!is_dir($nombre_carpeta))
			{
			@mkdir($nombre_carpeta, 0755);
			}

			if (!empty($_FILES)) {
			    $existingFile = false;
			    //Comprobamos que por lo menos haya un archivo
			    foreach ($_FILES as $uploadedFile => $dataFile) {
			        for ($i = 0; $i < count($dataFile["name"]); $i++) {
			            if ($dataFile["name"][$i] != "") {
			                $existingFile = true;
			            };
			        }
			    }
			    if ($existingFile) {
			        //llamamos a la funcion que mueve y comprueba los archivos
			        $filesUploaded = moveRecipes($_FILES,$categoria,$nombre_carpeta);
			    } else {
			        die("No hay un archivo para procesar");
			    }
			} else {
			    die("No se enviaron archivos");
			}

			if (isset($filesUploaded) and !empty($filesUploaded)) {
			    foreach ($filesUploaded as $singleFile)
			    {
			      $arrayImg = $arrayImg . $singleFile . ";";
			    }

						$stmt = $db2->prepare('INSERT INTO recetas(title,description,preparation,locations,esttime,recdate) VALUES(:title,:description,:preparation,:locations,:esttime,:recdate)');
						$stmt->execute(array(
								 ':title' => $title,
								 ':description' => $description,
								 ':preparation' => $preparation,
								 ':locations' => $arrayImg,
								 ':esttime' => $esttime,
								 ':recdate' => $recdate

								));
						$recipeID = $db->lastInsertId();
						echo "<script>location.href='admin_list.php?class=recetas&status=creada'</script>";

			}




			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'galeria':
			require 'conectDB.php';
			require 'functions.php';
			$title=$_POST['titulo'];
			$desc=$_POST['descripcion'];
			$cat=$_POST['categoria'];
			$tags=$_POST['etiquetas'];


			if (!empty($_FILES)) {
			    $existingFile = false;
			    //Comprobamos que por lo menos haya un archivo
			    foreach ($_FILES as $uploadedFile => $dataFile) {
			        for ($i = 0; $i < count($dataFile["name"]); $i++) {
			            if ($dataFile["name"][$i] != "") {
			                $existingFile = true;
			            };
			        }
			    }
			    if ($existingFile) {
			        //llamamos a la funcion que mueve y comprueba los archivos

			        $filesUploaded = moveFiles($_FILES,$cat);
			    } else {
			        die("No hay un archivo para procesar");
			    }
			} else {
			    die("No se enviaron archivos");
			}


			if (isset($filesUploaded) and !empty($filesUploaded)) {
			    //ejemplo de como
			    foreach ($filesUploaded as $singleFile)
			    {
			      $query=mysqli_query($conn ,"SELECT*from products where location='$singleFile'");
			       $sql=mysqli_num_rows($query);
			       if ($sql>0)
			       {
			         echo "<script>location.href='admin_add.php?class=galeria&status=existe'</script>";
			       } else {
			           mysqli_query($conn ,"INSERT INTO products VALUES('','$title','$desc','$singleFile','$cat','$tags')");
								 echo "<script>location.href='admin_list.php?class=galeria&status=creada'</script>";

			         }
			    }
			}

			break;
	  ////////////////////////////////////////////////////////////////////////////////////////
		case 'categoria':
		$nombre_carpeta="imagenes/categorias/$title";
		if (!is_dir($nombre_carpeta)) {
			mkdir($nombre_carpeta, 0755);
			$stmt = $db2->query("INSERT INTO categoria VALUES('','$title','0')") or die("No se pudo crear la categoria");
			echo "<script>location.href='admin_list.php?class=categoria&id=&status=creada'</script>";
		}
			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'usuarios':

			break;
		////////////////////////////////////////////////////////////////////////////////////////

	default:
		break;
}
 ?>

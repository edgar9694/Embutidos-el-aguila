<?php
//include config
require_once('includes/config.php');
extract($_POST);

switch ($class) {
	////////////////////////////////////////////////////////////////////////////////////////////////
	case 'blog_posts':
		if(!isset($error)){
			try {

				$postSlug = slug($postTitle);

				//insert into database
				$stmt = $db->prepare('UPDATE blog_posts_seo SET postTitle = :postTitle, postSlug = :postSlug, postDesc = :postDesc, postCont = :postCont WHERE postID = :postID') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postSlug' => $postSlug,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':postID' => $postID
				));

				//delete all items with the current postID
				$stmt = $db->prepare('DELETE FROM blog_post_cats WHERE postID = :postID');
				$stmt->execute(array(':postID' => $postID));

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
				echo "<script>location.href='admin_list.php?class=blog_posts&status=actualizado'</script>";
				exit;

			} catch(PDOException $e) {
					echo $e->getMessage();
			}
		}


		break;
		////////////////////////////////////////////////////////////////////////////////////////
	case 'blog_cats':
		if(!isset($error)){
			try {

				$catSlug = slug($title);

				//insert into database
				$stmt = $db->prepare('UPDATE blog_cats SET title = :title, catSlug = :catSlug WHERE catID = :catID') ;
				$stmt->execute(array(
					':title' => $title,
					':catSlug' => $catSlug,
					':catID' => $catID
				));

				//redirect to index page
				echo "<script>location.href='admin_list.php?class=blog_cats&id=&status=actualizado'</script>";
				exit;

			} catch(PDOException $e) {
					echo $e->getMessage();
			}
		}

		break;
		////////////////////////////////////////////////////////////////////////////////////////
	case 'recetas':

		require("conectDB.php");
		require 'functions.php';
		extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
		$arrayImg="";
		$categoria ="recetas";
		$imgs = explode(";",$locations);
		$imgs2 = $imgs[0].";".$imgs[1].";".$imgs[2].";".$imgs[3];
		$imgs3 = explode(";",$imgs2);

		foreach ($imgs3 as $img)
		{
		  unlink($img);
		}
		$nombre_carpeta = $categoria."/".$title;
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
		    //ejemplo de como
		    foreach ($filesUploaded as $singleFile)
		    {
		      $arrayImg = $arrayImg . $singleFile . ";";

		    }
		           $resent = mysqli_query($conn ,"UPDATE recetas SET description ='$desc',preparation ='$ing',level ='$level',locations = '$arrayImg',diners='$diners',time='$time',url='$url',tags='$tags' WHERE id='$id'");


		          if ($resent==null) {
		            	echo "<script>location.href='admin_list.php?class=recetas&id=&status=error'</script>";
		          }else {
		            	echo "<script>location.href='admin_list.php?class=recetas&id=&status=actualizado'</script>";

		          }
		}
		break;
		////////////////////////////////////////////////////////////////////////////////////////
	case 'galeria':


		break;
	  ////////////////////////////////////////////////////////////////////////////////////////
	case 'categoria':

		break;
		////////////////////////////////////////////////////////////////////////////////////////
	case 'usuarios':

		break;
		////////////////////////////////////////////////////////////////////////////////////////

	default:
		break;
}
 ?>

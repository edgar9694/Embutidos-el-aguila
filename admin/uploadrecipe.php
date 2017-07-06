<?php
date_default_timezone_set('America/Caracas');
require 'conectDB.php';
require 'functions.php';
require 'rating/_config-rating.php';

$title = $_POST['titulo'];
$desc = $_POST['descripcion'];
$ingredients=$_POST['preparacion'];
$level=$_POST['level'];
$categoria="recetas";
$diners=$_POST['comensales'];
$time=$_POST['tiempo'];
$url=$_POST['video'];
$tags=$_POST['etiquetas'];
$date=date('Y-m-d H:i:s');
$arrayImg="";

$nombre_carpeta="recetas/$title";
if(!is_dir($nombre_carpeta))
{
@mkdir($nombre_carpeta, 0755);

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
		$stmt = $db2->query('SELECT * FROM recetas WHERE title :$title')
    if ($stmt)
    {
				 echo "<script>location.href='admin_list.php?class=recetas?status=existe'</script>";
      } else {
          mysqli_query($conn ,"INSERT INTO recetas VALUES('','$title','$desc','$ingredients','$level','$arrayImg','$diners','$time','$url','$tags','$date')");

          mysqli_query($conn,"INSERT INTO rating VALUES('','$title','0','0','')");

					echo "<script>location.href='admin_list.php?class=recetas?status=creada'</script>";

    }


}
} else {
  echo "<script>location.href='admin_list.php?class=recetas?status=existe'</script>";
}
 ?>

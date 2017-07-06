<?php
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
            echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
            echo "<script>location.href='index_admin.php'</script>";
          }else {
            echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';

            echo "<script>location.href='update_recipe.php?id=$id'</script>";

          }


   echo "<script>location.href='recipe_admin.php'</script>";

}

 ?>

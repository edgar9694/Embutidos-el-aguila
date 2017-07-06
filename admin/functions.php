<?php
function moveFiles($files,$categoria)

{
    $inputFileName = "img"; //nombre del Input origen (ejemplo name="archivo[]" --tomar solo--> archivo
    $uploadDirectory = "imagenes/galeria"; //ubicacion y nombre del directorio donde se guarda
    $fileLocations = array();
    $validExtensions = array('gif', 'jpg', 'jpeg', 'png'); //extensiones permitidas

    if (file_exists($uploadDirectory) && is_writable($uploadDirectory)) { //comprueba si el directorio existe y si es posible escribir
        if (isset($files[$inputFileName]["error"])) {
            foreach ($files[$inputFileName]["error"] as $key => $error) {
                if ($error == 0) {
                    $pieces = explode(".", $files[$inputFileName]["name"][$key]); //obtenemos la extensión
                    $extension = strtolower(end($pieces)); //la pasamos a minuscula

                    $validFileExtension = false;
                    foreach ($validExtensions as $type) { //comprobamos que sea una extensión permitida
                        if ($type == $extension) {
                            $validFileExtension = true;
                        }
                    }

                    if ($validFileExtension) { //si el archivo es valido lo intentamos mover
                        $fileName2 = $categoria . $pieces[0] . "." . $extension; //generamos un nombre personalizable
                        $fileName = 'or-'.$fileName2;
                        $currentLocation = $files[$inputFileName]["tmp_name"][$key]; //ubicacion original y temporal del archivo
                        $minFoto='min-'.$fileName2;
                        if (!move_uploaded_file($currentLocation, "$uploadDirectory/$fileName")) {
                            echo "No se puede mover el archivo \n";
                        } else {
                            resizeImagen($uploadDirectory.'/', $fileName, 640, 1024,$minFoto,$extension);
                            unlink($uploadDirectory.'/'.$fileName);
                            $fileLocations[] = $uploadDirectory .'/'. $minFoto;


                        }
                    } else {
                        echo "Extension de archivo no valida \n";
                    }
                } else {
                    if ($error != 0 and $error != 4) { //Si no subieron archivos No enviar ninguna advertencia
                        $errorMessage = getErrorMessage($files[$inputFileName]["error"][$key]);
                        echo $errorMessage . " Intente nuevamente. \n";
                        die;
                    }
                }
            }
            return $fileLocations;
        } //fin del existe error
        else {
            echo "Uno de los archivos sobrepasa la capacidad establecida por el servidor";
        }
    } else {
        echo "No existe la carpeta para subir archivos o no tiene los permisos suficientes.";
    }
} // Termina la funcion



function moveRecipes($files,$categoria,$nombre_carpeta)

{
    $inputFileName = "img"; //nombre del Input origen (ejemplo name="archivo[]" --tomar solo--> archivo
    $uploadDirectory = $nombre_carpeta; //ubicacion y nombre del directorio donde se guarda
    $fileLocations = array();
    $validExtensions = array('gif', 'jpg', 'jpeg', 'png'); //extensiones permitidas

    if (file_exists($uploadDirectory) && is_writable($uploadDirectory)) { //comprueba si el directorio existe y si es posible escribir
        if (isset($files[$inputFileName]["error"])) {
            foreach ($files[$inputFileName]["error"] as $key => $error) {
                if ($error == 0) {
                    $pieces = explode(".", $files[$inputFileName]["name"][$key]); //obtenemos la extensión
                    $extension = strtolower(end($pieces)); //la pasamos a minuscula

                    $validFileExtension = false;
                    foreach ($validExtensions as $type) { //comprobamos que sea una extensión permitida
                        if ($type == $extension) {
                            $validFileExtension = true;
                        }
                    }

                    if ($validFileExtension) { //si el archivo es valido lo intentamos mover
                        $fileName2 = $categoria . $pieces[0] . "." . $extension; //generamos un nombre personalizable
                        $fileName = 'or-'.$fileName2;
                        $currentLocation = $files[$inputFileName]["tmp_name"][$key]; //ubicacion original y temporal del archivo
                        $minFoto='min-'.$fileName2;
                        if (!move_uploaded_file($currentLocation, "$uploadDirectory/$fileName")) {
                            echo "No se puede mover el archivo \n";
                        } else {
                            resizeImagen($uploadDirectory.'/', $fileName, 640, 1024,$minFoto,$extension);
                            unlink($uploadDirectory.'/'.$fileName);
                            $fileLocations[] = $uploadDirectory .'/'. $minFoto;


                        }
                    } else {
                        echo "Extension de archivo no valida \n";
                    }
                } else {
                    if ($error != 0 and $error != 4) { //Si no subieron archivos No enviar ninguna advertencia
                        $errorMessage = getErrorMessage($files[$inputFileName]["error"][$key]);
                        echo $errorMessage . " Intente nuevamente. \n";
                        die;
                    }
                }
            }
            return $fileLocations;
        } //fin del existe error
        else {
            echo "Uno de los archivos sobrepasa la capacidad establecida por el servidor";
        }
    } else {
        echo "No existe la carpeta para subir archivos o no tiene los permisos suficientes.";
    }
} // Termina la funcion


function moveCat($files,$categoria,$type)

{
    $inputFileName = "img"; //nombre del Input origen (ejemplo name="archivo[]" --tomar solo--> archivo
    $uploadDirectory = "imagenes/categoria/$type"; //ubicacion y nombre del directorio donde se guarda
    $fileLocations = array();
    $validExtensions = array('gif', 'jpg', 'jpeg', 'png'); //extensiones permitidas

    if (file_exists($uploadDirectory) && is_writable($uploadDirectory)) { //comprueba si el directorio existe y si es posible escribir
        if (isset($files[$inputFileName]["error"])) {
            foreach ($files[$inputFileName]["error"] as $key => $error) {
                if ($error == 0) {
                    $pieces = explode(".", $files[$inputFileName]["name"][$key]); //obtenemos la extensión
                    $extension = strtolower(end($pieces)); //la pasamos a minuscula

                    $validFileExtension = false;
                    foreach ($validExtensions as $type) { //comprobamos que sea una extensión permitida
                        if ($type == $extension) {
                            $validFileExtension = true;
                        }
                    }

                    if ($validFileExtension) { //si el archivo es valido lo intentamos mover
                        $fileName2 = $categoria . $pieces[0] . "." . $extension; //generamos un nombre personalizable
                        $fileName = 'or-'.$fileName2;
                        $currentLocation = $files[$inputFileName]["tmp_name"][$key]; //ubicacion original y temporal del archivo
                        $minFoto='min-'.$fileName2;
                        if (!move_uploaded_file($currentLocation, "$uploadDirectory/$fileName")) {
                            echo "No se puede mover el archivo \n";
                        } else {
                            resizeImagen($uploadDirectory.'/', $fileName, 640, 1024,$minFoto,$extension);
                            unlink($uploadDirectory.'/'.$fileName);
                            $fileLocations[] = $uploadDirectory .'/'. $minFoto;


                        }
                    } else {
                        echo "Extension de archivo no valida \n";
                    }
                } else {
                    if ($error != 0 and $error != 4) { //Si no subieron archivos No enviar ninguna advertencia
                        $errorMessage = getErrorMessage($files[$inputFileName]["error"][$key]);
                        echo $errorMessage . " Intente nuevamente. \n";
                        die;
                    }
                }
            }
            return $fileLocations;
        } //fin del existe error
        else {
            echo "Uno de los archivos sobrepasa la capacidad establecida por el servidor";
        }
    } else {
        echo "No existe la carpeta para subir archivos o no tiene los permisos suficientes.";
    }
} // Termina la funcion





function getErrorMessage($error_code)
{ //Mensajes Personalizados
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'El archivo excede el limite permitido por la directiva de PHP';
        case UPLOAD_ERR_FORM_SIZE:
            return 'El archivo excede el limite permitido por la directiva de HTML';
        case UPLOAD_ERR_PARTIAL:
            return 'El archivo solo se subio parcialmente, intentelo de nuevo';
        case UPLOAD_ERR_NO_FILE:
            return 'No hay archivo que subir';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'El folder temporal no existe';
        case UPLOAD_ERR_CANT_WRITE:
            return 'No tiene permisos para grabar archivos en el disco';
        case UPLOAD_ERR_EXTENSION:
            return 'El archivo tiene una extensión NO permitida';
        default:
            return 'Error desconocido al subir el archivo';
    }
} // Termina funcion mensajesErrorArchivos





function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension){
    $rutaImagenOriginal = $ruta.$nombre;
    if($extension == 'GIF' || $extension == 'gif'){
    $img_original = imagecreatefromgif($rutaImagenOriginal);
    }
    if($extension == 'JPEG' || $extension == 'jpeg'){
    $img_original = imagecreatefromjpeg($rutaImagenOriginal);
    }
    if($extension == 'jpg' || $extension == 'JPG'){
    $img_original = imagecreatefromjpeg($rutaImagenOriginal);
    }
    if($extension == 'png' || $extension == 'PNG'){
    $img_original = imagecreatefrompng($rutaImagenOriginal);
    }
    $max_ancho = $ancho;
    $max_alto = $alto;
    list($ancho,$alto)=getimagesize($rutaImagenOriginal);
    $x_ratio = $max_ancho / $ancho;
    $y_ratio = $max_alto / $alto;
    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho
  	$ancho_final = $ancho;
		$alto_final = $alto;
	} elseif (($x_ratio * $alto) < $max_alto){
		$alto_final = ceil($x_ratio * $alto);
		$ancho_final = $max_ancho;
	} else{
		$ancho_final = ceil($y_ratio * $ancho);
		$alto_final = $max_alto;
	}
    $tmp=imagecreatetruecolor($ancho_final,$alto_final);
    imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
    imagedestroy($img_original);
    $calidad=100;
    imagejpeg($tmp,$ruta.$nombreN,$calidad);

}

 ?>

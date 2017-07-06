<?php
//include config
require_once('includes/config.php');
extract($_GET);

switch ($class) {
		////////////////////////////////////////////////////////////////////////////////////////
		case 'blog_cats':
			$obj = $_POST['b'];

			if(!empty($obj)) {
						comprobar($obj,$class);
			}

			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'recetas':

			break;
	  ////////////////////////////////////////////////////////////////////////////////////////
		case 'categoria':
			$obj = $_POST['b'];

			if(!empty($obj)) {
						comprobar($obj,$class);
			}
			break;
		////////////////////////////////////////////////////////////////////////////////////////
		case 'usuarios':

			break;
		////////////////////////////////////////////////////////////////////////////////////////

	default:
		break;
}



function comprobar($b,$class) {
	$servername2 = "localhost";
	$username2 = "root";
	$password2 = "";
	$dbname2 = "emutido_db";

	try {
	    $db2 = new PDO("mysql:host=$servername2;dbname=$dbname2", $username2, $password2);
	    // set the PDO error mode to exception
	    $db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Connected successfully a embutido_db";
	    }
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }

	$stmt = $db2->query("SELECT id FROM ".$class." WHERE title = '".$b."'");
	$contar = $stmt->rowCount();

			if($contar == 0){
				echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
		}else{
				echo "<span style='font-weight:bold;color:red;'>La Categoria ya existe.</span>";
			}

}

 ?>

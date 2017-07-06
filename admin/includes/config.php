<?php
ob_start();
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";
$dbname2 = "emutido_DB";
try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully a blog";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


try {
    $db2 = new PDO("mysql:host=$servername;dbname=$dbname2", $username, $password);
    // set the PDO error mode to exception
    $db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully a embutido_db";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }





//set timezone
date_default_timezone_set('America/Caracas');

//load classes as needed
function __autoload($class) {

   $class = strtolower($class);

   //if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }

   //if call from within admin adjust the path
   $classpath = 'admin/classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }

   //if call from within admin adjust the path
   $classpath = '/../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }

}

$user = new User($db2);

include('functions.php');
?>

<?php
$servername = "localhost";
$username = "marketco_mcouser";
$password = "-FIZImHbHscJ";
$database ="marketco_mcobd";
$msg=null;


try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //$msg="<i class='bi bi-check-circle'></i> Connected OK";
} catch(PDOException $e) {
  $msg="<i class='bi bi-x-circle'></i> Connection failed: " . $e->getMessage();
}
?>
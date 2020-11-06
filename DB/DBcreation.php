<?php
$servername = "mysql:localhost";
$username = "root";
$password = "";

try{
  $conn = new PDO($servername, $username, $password);

  $q="CREATE DATABASE IF NOT EXISTS eXaDB";

  $conn->exec($q);

  $conn=null;
}
catch(PDOException $e){
  echo "failed: ".$e->getMessege();
}
?>

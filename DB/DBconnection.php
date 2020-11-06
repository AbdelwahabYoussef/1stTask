<?php
$servername = "mysql:host=localhost;dbname=eXaDB";
$username = "root";
$password = "";

try{
  $conn = new PDO($servername, $username, $password);
}
catch(PDOException $e){
  echo "failed: ".$e->getMessege();
}
?>

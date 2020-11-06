 <?php
  include 'DBconnection.php';
  $q="CREATE TABLE IF NOT EXISTS eXaTBL(
  username varchar(255) NOT NULL UNIQUE,
  password varchar(8) NOT NULL,
  file varchar(255)
  )";

  $conn->exec($q);
?>

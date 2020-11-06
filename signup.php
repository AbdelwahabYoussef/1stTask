<?php
    include 'DB/DBconnection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username=$_POST['username'];
        $password=$_POST['password'];
	$repassword=$_POST['repassword'];

	$ca=$conn->prepare("SELECT username FROM eXaTBL WHERE username=?");
	$ca->execute(array($username));
	$count=$ca->rowCount();
    if($count==0 and ($password==$repassword)){
        $stmt=$conn->prepare("INSERT INTO eXaTBL(username,password) VALUES(?,?)");
        $stmt->execute(array($username,$password));

	header("Location: login.php");
	}
    }
?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="style.css">
      <title>eXaite-Signup</title>
   </head>
   <body>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
          <div class="container">
              <a class="redirect" href="login.php">Login</a>
              <h2 class="txt" >Registration</h2>
              <input type="text" name="username" placeholder="type your username">
              <input type="password" name="password" placeholder="type your password">
              <input type="password" name="repassword" placeholder="confirm password">
              <input type="submit" value="Signup">
          </div>
      </form>
   </body>
</html>

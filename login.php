<?php
    session_start();
    if (isset($_SESSION['username'])){
                header("Location: home.php");
        }

    include 'DB/DBconnection.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $stmt=$conn->prepare("SELECT username,password FROM eXaTBL WHERE username=? AND password=?");
	$stmt->execute(array($username,$password));

	$count=$stmt->rowCount();

	if ($count==1){
		$_SESSION['username']=$username;

		header("Location: home.php");
	}
    }
?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="style.css">
      <title>eXaite-Login</title>
   </head>
   <body>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
          <div class="container">
              <a class="redirect" href="signup.php">Signup</a>
              <h2 class="txt" >Login</h2>
              <input type="text" name="username" placeholder="type your username">
              <input type="password" name="password" placeholder="type your password">
              <input type="submit" value="Login">
          </div>
      </form>
   </body>
</html>

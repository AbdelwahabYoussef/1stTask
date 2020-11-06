<?php
    session_start();

    include 'DB/DBconnection.php';

    if (empty($_SESSION['username'])){
                header("Location: index.php");
		exit();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$file=$_FILES['file'];

		$name=$file['name'];
		$tmp_name=$file['tmp_name'];

		$stmt=$conn->prepare("UPDATE eXaTBL SET file=? WHERE username=?");
         	$stmt->execute(array($name,$_SESSION['username']));

		move_uploaded_file($tmp_name,"uploads/files/".$name);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>
            Home page
        </title>
    </head>
    <body>
	<div class="container">
		<a class="redirect" href="logout.php">Logout</a>
	        <span>Welcome</span>
		<span class="user"><?php echo $_SESSION['username']; ?></span>
	</div>
	<div class="container">
		<h2 class="txt">Upload your File</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="submit" value="Submit">
		</form>
		<p class="alert"><?php
			$stmt=$conn->prepare("SELECT file FROM eXaTBL WHERE username=?");
        	        $stmt->execute(array($_SESSION['username']));

			$row=$stmt->fetch();

			if ($row['file'] != Null){
				echo "*file uploaded: ";
				echo "<strong>uploads/files/".$row['file']."</strong>";
			}
		 ?></p>
	<div>
    </body>
</html>

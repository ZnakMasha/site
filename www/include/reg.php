<?php require_once("database.php"); ?>
<?php
	
	if(isset($_POST["register"])){
	
		if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['rpassword'])) 
		{
		 $username=htmlspecialchars($_POST['username']);
		 $password=htmlspecialchars($_POST['password']);
		 $rpas=htmlspecialchars($_POST['rpassword']);
		 $query=mysqli_query($con,"SELECT * FROM users WHERE login='".$username."'");
		 $numrows=mysqli_num_rows($query);
		 if($password==$rpas)
		  {
			if($numrows==0)
			   {
				$sql="INSERT INTO users
			  (login, password)
				VALUES('$username', '$password')";
			  $result=mysqli_query($con,$sql);
			 if($result){
				$message = "Account Successfully Created";
				header("Location: ../index.html");
			} else {
			 $message = "Failed to insert data information!";
			  }
				} else {
				$message = "That username already exists! Please try another one!";
			   }
		}
		else {
			$message = "Enter password one more time";
				}
		} else {
			$message = "All fields are required!";
				}
}
	?>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
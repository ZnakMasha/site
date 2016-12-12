<?php require_once("database.php"); ?>
<?php
	session_start();
?>	 
<?php
	
	if(isset($_POST["enter"]))
	{
		if(!empty($_POST['entlogin']) && !empty($_POST['entpassword'])) 
		{
			$username=htmlspecialchars($_POST['entlogin']);
			$password=htmlspecialchars($_POST['entpassword']);
			$query =mysqli_query($con,"SELECT * FROM users WHERE login='".$username."' AND password='".$password."'");
			$numrows=mysqli_num_rows($query);
			if($numrows!=0)
			{
				while($row=mysqli_fetch_assoc($query))
				{
					$dbusername=$row['login'];
					$dbpassword=$row['password'];
				}
				if($username == $dbusername && $password == $dbpassword)
				{
					$_SESSION['session_username']=$username;	 
					header("Location: ../index.html");
				}
			} 
				else 
				{
					echo  "Invalid username or password!";
				}
		} else 
		{
		$message = "All fields are required!";
		}
	}
	?>
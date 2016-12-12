<?php require_once("database.php"); ?>
<?php
	
	if(isset($_POST["makeorder"]))
	{
		if(!empty($_POST['username']) && !empty($_POST['orders'])) 
		{
			 $username=htmlspecialchars($_POST['username']);
			 $ord=htmlspecialchars($_POST['orders']);
			 $c=htmlspecialchars($_POST['count']);
			 $tel_no=htmlspecialchars($_POST['tel_no']);
			 $email=htmlspecialchars($_POST['email']);
			 $query=mysqli_query($con,"SELECT * FROM orders WHERE user='".$username."'");
			 $numrows=mysqli_num_rows($query);
			 if($numrows<3)
			 {
				$sql="INSERT INTO orders
				(user, orders, count, tel_no, email)
				VALUES('$username', '$ord', '$c', '$tel_no', '$email')";
				$result=mysqli_query($con,$sql);
				if($result)
				{
					header("Location: ../pages/Order.html");
				} 
				else 
				{
				 $message = "Failed to insert data information!";
				}
			} 
			else 
			{
				$message = "Too much orders. To order delete one of the previous order";
			}
		} 
		else 
		{
			$message = "All fields are required!";
		}
}
	?>
	
	

<?php
	
	if(isset($_POST["deleteorder"]))
	{
		if(!empty($_POST['username']) && !empty($_POST['orders'])) 
		{
			 $username=htmlspecialchars($_POST['username']);
			 $ord=htmlspecialchars($_POST['orders']);
			 $query=mysqli_query($con,"SELECT * FROM orders WHERE user='".$username."'");
			 $numrows=mysqli_num_rows($query);
			 if($numrows!=0)
			 {
				$sql="DELETE FROM orders WHERE user='".$username."' AND orders='".$ord."'";
				$result=mysqli_query($con,$sql);
				if($result)
				{
					header("Location: ../pages/Order.html");
				} 
				else 
				{
				 $message = "Failed to insert data information!";
				}
			} 
			else 
			{
				$message = "Too much orders. To order delete one of the previous order";
			}
		} 
		else 
		{
			$message = "All fields are required!";
		}
}
	?>
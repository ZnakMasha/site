	<?php require_once("database.php"); ?>
	<?php
	
	if(isset($_POST["deleteorder"]))
	{
		if(!empty($_POST['username1']) && !empty($_POST['orders1'])) 
		{
			 $username=htmlspecialchars($_POST['username1']);
			 $ord=htmlspecialchars($_POST['orders1']);
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
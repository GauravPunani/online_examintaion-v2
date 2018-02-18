<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_REQUEST['data']))
	{
		$id=$_REQUEST['data'];
		include 'connection.php';
		$sql="SELECT * FROM `users` WHERE `id`='$id'";
		$res=mysqli_query($conn,$sql);
		if($res)
		{
			if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
                    
				echo "<form  id='admin_user'  method='post' action='admin_change_user.php'>";
					//username
                    echo "<div class='form-group'>";
					echo "<label for='username'>Username</label>";
					echo " <input class='form-control' type='text' name='username' value='".$row['username']."' autocomplete='off'/>";
					echo "</div>";
                    
                    
                    //real name
					echo "<div class='form-group'>";
					echo "<label for='name'>Name</label>";
					echo " <input class='form-control' type='text' name='name' value='".$row['name']."' autocomplete='off'/>";
					echo "</div>";

                    //password
					echo "<div class='form-group'>";
					echo "<label for='password'>Password</label>";
					echo " <input class='form-control' type='password' name='pass' value='".$row['password']."'autocomplete='off'/>";
					echo "</div>";

                    //email
					echo "<div class='form-group'>";
					echo "<label for='email'>Email</label>";
					echo " <input class='form-control' type='email' name='email' value='".$row['email']."'autocomplete='off'/>";
					echo "</div>";
                    
                    //form end
                    echo "</form>";
				}	
				
			}
			
		}
		else
		{
			echo "<p>There is some error in record</p>";
		}
	}
}
?>
<?php
session_start();
$paper_error=$real_pass="";
if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_name']))
{
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if(isset($_POST['submit']))
		{
			if(!empty($_POST['user']) && !empty($_POST['pass']))
			{
				include("connection.php");
				$can_user=$_POST['user'];
				$can_pass=$_POST['pass'];
				$sql="SELECT * FROM `users` where `username`='$can_user'";
				$res=mysqli_query($conn,$sql);
				if($res==true)
				{
					while($row=mysqli_fetch_assoc($res))
					{
						$can_id=$row['id'];
						$real_pass=$row['password'];
						$can_name=$row['username'];
					}
					if(password_verify($can_pass,$real_pass))
					{
						$_SESSION['exam_id']=$can_id;
						$_SESSION['user_name']=$can_name;
							$check_exam="SELECT `id` FROM `user_ans` WHERE `id`='$can_id'";
							$check_num_row=mysqli_query($conn,$check_exam);
							if(mysqli_num_rows($check_num_row)>0)
							{
								$paper_error="<p class='text-center'>You already had given the exam <br>Please Check your result <a href='result_new.php'> here </a></p>";
							}
							else
							{
								header("Location:home.php");
							}
					}
					else{
						$paper_error="<p class='text-center'>Password did't matched</p>";
					}
				}
				else
				{
					echo mysqli_error($conn);
				}
			}
			else
			{
				$paper_error="<p class='text-center'>Please fill all the post first</p>";
			}
		}	
	}
}
else
{
	header("location:administrator.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
   <div class="container">
       <div class="row">
           <div class="col-xs-12 col-sm-12  col-md-offset-4 col-md-4 form-box">
           <div class="text-center">
           	<h3 style="color: white;">User-Login</h3>
           </div>
           <div class="panel panel-default">
    					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div  class="form-group">
            <label for="username">Candidate Username</label>
            <input type="text" name="user" class="form-control" id="username">
            
        </div>
        <div  class="form-group">
            <label for="Password">Candidate Password</label>
            <input type="password" class="form-control" name="pass" id="pass">
        </div>

        <span style="color:red;">
          	<?php echo $paper_error; ?>
        </span>
        <div class="form-group">
        	<a href="recovery.php">Forgot Password ?</a>
        </div>
        <div class="form-group">
            <input type="submit" value="SUBMIT" name="submit">
        </div>
    </form>
       	
           </div>
               </div>
       </div>
    </div>
</body>
</html>
<style>
	   	body
	    {
	         background: linear-gradient(to top left, #0066ff 0%, #99ccff 100%);
	         height: 100vh;
	    }
	    
    .form-box
    { 
        border: none;
        margin-top: 100px;
    }
    label
    {
      padding:3px 0px;
    }
    .form-group
    {
      padding: 0px 10px;
    }
</style>
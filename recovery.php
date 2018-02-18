<?php
$email_err="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['submit']))
	{
		if(!empty($_POST['email']))
		{
			$email=$_POST['email'];
			include("connection.php");
			$sql="SELECT `email` from `users` where email='$email'";
			
		}
		else
		{
			$email_err="please enter your email first";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	 <title>Online Examination</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
			<div class="header panel panel-default">
				<div class="panel panel-primary col-sm-4 col-sm-offset-4" style="border:none;">
					<div class="panel-heading">Password Recovery</div>
					<div class="panel-body">
							<form   method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<div class="form-group">
						<center><label  for="Password Verification">Please enter your email id</label></center>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group col-sm-offset-4" >
						<input class="btn btn-default" type="submit" name="submit" value="RECOVER">
					</div>
				</form>
					</div>
				</div>
				
	</div>
	</div>
</body>
</html>
<style type="text/css">
	body
	{
			 background: linear-gradient(to top left, #0066ff 0%, #99ccff 100%);
	         height: 100vh;
	    
	}
	.header
	{
		height: 100vh;
	}
</style>
<?php
/*session_start();
if(isset($_SESSION['ctrl_admin_id']) && isset($_SESSION['ctrl_admin_']))
{
    
}
else
{
    header("location:admin.php");
}*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Log-in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		
		<div class="row">
		<div class="panel panel-default">
			<div class="col-sm-4">
				<div class="text-center">
					<h1>OPTIONS</h1>
				</div>
					<div class="list-group ">
  					<a href="control_panel.php" class="list-group-item active ">DASHBOARD</a>
            <a href="admin_users.php" class="list-group-item ">USERS</a>
            <a href="#" class="list-group-item">PAPERS</a>
          <a href="logout.php?ref=cpanel" class="list-group-item">LOGOUT</a>
				</div>
			</div>
				<div class="col-sm-offset-1 col-sm-7">
					<div class="text-center">
						<h1>HOME</h1>
					</div>
					<div class="row">
						    <div class="col-md-4">
      <div class="thumbnail noborder" >
        <a href="/w3images/lights.jpg" target="_blank">
          <img src="./images/admin_icon.jpg" alt="Lights" style="width:100%; height:200px;">
          <div class="caption">
            <p class="text-center"><a href="control_panel.php">DASHBOARD</a></p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail noborder">
        <a href="/w3images/nature.jpg" target="_blank">
          <img src="./images/users.png" alt="Nature" style="width:100%; height:200px;">
          <div class="caption">
            <p class="text-center"><a href="admin_users.php">USERS</a></p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail noborder">
        <a href="/w3images/fjords.jpg" target="_blank">
          <img src="./images/admin_icon.jpg" alt="Fjords" style="width:100%; height:200px;">
          <div class="caption">
            <p class="text-center"><a href="logout.php?ref=cpanel">LOGOUT</a></p>
          </div>
        </a>
      </div>
    </div>	
					</div>
					
					<div>
				</div>	
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
    .panel
    {
    	height: 100vh;
    }
    .noborder
    {
    	border:none;
    }
</style>
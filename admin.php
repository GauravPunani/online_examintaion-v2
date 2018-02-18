<?php
session_start();
$hash=$pass_err="";
if(isset($_SESSION['ctrl_admin_id']) && isset($_SESSION['ctrl_admin_name']))
{
  header("Location:control_panel.php");
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['user']) && !empty($_POST['pass']))
        {
          include("connection.php");
            $user=$_POST['user'];
            $pass=$_POST['pass'];
            $sql="SELECT * FROM `admin` WHERE `username`='$user'";
            $res=mysqli_query($conn,$sql);
            if($res==true)
            {
              while ($row=mysqli_fetch_assoc($res)) {
                $hash=$row['password'];
                $admin=$row['username'];
                $admin_id=$row['id'];
              }
              if(password_verify($pass,$hash))
              {
                $_SESSION['ctrl_admin_name']=$admin;
                $_SESSION['ctrl_admin_id']=$admin_id;
                header("Location:control_panel.php");
              }
              else
              {
                $pass_err="<p class='text-center'>Username & password did't matched</p>";
              }
            }
        }
        else
        {
          $pass_err="<p class='text-center'>Please fill username and password first</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
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
           <div class="col-xs-12 col-sm-12  col-md-offset-4 col-md-4 form-box">
           <div style="color:white;" class="text-center"><h3>Administrative-Login</h3> </div>
             <div class="panel panel-default">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div  class="form-group">
            <label for="username">Admin Username</label>
            <input type="text" name="user" class="form-control" id="email">
            
        </div>
        <div  class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" name="pass" id="pass">
        </div>
        <span  style="color:red; ">
          <?php echo $pass_err; ?>
        </span>
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-default" name="submit">
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
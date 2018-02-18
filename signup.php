<?php
session_start();
$user_id="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['name']) && !empty($_POST['pass']) &&!empty($_POST['repass']))
        {
            if($_POST['pass']!=$_POST['repass'])
            {
                $pass_err="password did't matched";
            }
            else
            {
                $email=$_POST['email'];
                $username=$_POST['username'];
                $name=$_POST['name'];
                $pass=$_POST['pass'];
                $pass_hash=password_hash($pass,PASSWORD_DEFAULT);
                require ("connection.php");
                
 
            
                //user data insertion code
                $sql="INSERT INTO `users`(`username`,`email`,`password`,`name`) VALUES('$username','$email','$pass_hash','$name')";
                $res=mysqli_query($conn,$sql);
                if($res==true)
                {
                   //redirect to finish page
                    header("location:finish.php");   
                }
                    else
                    {
                        echo mysqli_error($conn);
                    }
                }
                
            
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/index.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="index.js"></script>
</head>
<body style="background-color:aliceblue;">
   
   <div class="container grey">
      <div class="text-center">
          <h3 style="color: white;">Register</h3>
      </div>
      
      
       <div class="panel panel-default col-xs-12">
           <div id="signupform" class="panel-body">
               
                <form  enctype="multipart/form-data"  name="signup" onsubmit="return validate();" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal">
        
            <div class="form-group">
                     <label class="control-label col-sm-2" for="email">Email</label>
                     <div class="col-sm-10">
                         
                     <input id="email" type="email" name="email" class="form-control">
                     <div class="err_red" id="email_err"></div>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="username">Username</label>
                     <div class="col-sm-10">
                         
                     <input onkeyup="return username_validate(this.value);" id="username" type="text" name="username" class="form-control">
                     <div id="user_err" class="err_red"></div>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="name">Name</label>
                     <div class="col-sm-10">
                         
                     <input id="name" type="text" name="name" class="form-control">
                     <div id="name_err" class="err_red"></div>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="passowrd">Password</label>
                     <div class="col-sm-10">
                         
                     <input id="pass" type="password" name="pass" class="form-control">
                     <div id="pass_err" class="err_red"></div>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="pass-confirm">Password Confirmation</label>
                     <div class="col-sm-10">
                         
                     <input id="repass" type="password" name="repass" class="form-control">
                     <div id="repass_err" class="err_red"></div>
                     </div>
                 </div>
                 
                 <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                         <input id="submit" type="submit" value="SUBMIT" name="submit" class="btn btn-default">
                     </div>
                 </div>
                 <div style="color:red;" id="demo" class="col-sm-12">
                     
                 </div>
                 </form> 
                     
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
    .err_red
    {

        color: red;
    }
</style>
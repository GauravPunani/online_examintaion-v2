<?php
session_start();
$user_id="";
if($_SERVER['REQUEST_METHOD']=='POST')
{

        
            
            
                $email=$_POST['email'];
                echo $email;
                $username=$_POST['username'];
                echo $username;
                $name=$_POST['name'];
                echo $name;
                $pass=$_POST['pass'];
                echo "<br>".$pass."<br>";
                $pass_hash=password_hash($pass,PASSWORD_DEFAULT);
                require ("connection.php");

                //user data insertion code
                $sql="UPDATE `users` SET email='$email',name='$name',password='$pass_hash' WHERE username='$username'";
                $res=mysqli_query($conn,$sql);
                if($res==true)
                {
                    
                    echo "record updated";   
                }
                    else
                    {
                        echo "<br>";
                    echo mysqli_error($conn);
                        echo "<br>";
                        echo "there is some errro in updating record";
                    }
                
                
            
        
   
    }
    
else
{
    echo "not post method";
}
?>
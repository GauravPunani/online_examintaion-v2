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
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">l

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User-Details</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <input type="submit" id="submit_form" name="submit" value="submit" class="btn btn-default">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <div class="row">
    <div class="panel panel-default">
      <div class="col-sm-4">
        <div class="text-center">
        <h1>OPTIONS</h1>
        </div>
          <div class="list-group ">
            <a href="control_panel.php" class="list-group-item ">DASHBOARD</a>
            <a href="admin_users.php" class="list-group-item active">USERS</a>
            <a href="#" class="list-group-item">PAPERS</a>
          <a href="logout.php?ref=cpanel" class="list-group-item">LOGOUT</a>
        </div>
      </div>
        <div class="col-sm-offset-1 col-sm-7">
          <div class="text-center">
            <h1>HOME</h1>
          </div>
              <?php
                include 'connection.php';
                $sql="SELECT * FROM `users`";
                $res=mysqli_query($conn,$sql);
                if($res)
                {
                  if(mysqli_num_rows($res)>0)
                  {
                      echo "<table class='table table-hover'><tr><th>Id</th><th>Username</th><th>Name</th><th>E-mail</th><th>OPTIONS</th></tr>";
                      while($row=mysqli_fetch_assoc($res))
                      {
                        echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td><button type='button' onclick='getdata(".$row['id'].");' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>CHANGE</button></td><tr>";
                      }
                      echo "</table>";
                  }

                }
              ?>
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
<script type="text/javascript">

  $("#submit_form").click(function(){
    $("#admin_user").submit();
  });

  function getdata(id) {
    console.log(id);
    $.ajax({
      type:"post",
      url:"admin_user_select.php",
      data:{data:id},
      success: function(event)
      {
        $(".modal-body").html(event);
      }
    });
  }
</script>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title> Responsive</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <!-- <link rel="stylesheet" href="form.css" > -->
  <?php
    include("dbconnect.php");
    $conn = connect();
  ?>
</head>
<body>
  <h1><span class="blue"><span class="yellow">Add new user</pan></h1>  
  <div class="container form-top">
    <div class="row">
    <?php
      if(isset($_POST['add'])){
        $full_name = $_POST['fullname'];
        $user_name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $stmt = $conn->prepare("insert into users(fullname,username,email,password,phone)
                               values ('$full_name', '$user_name', '$email', '$password', '$phone');");
        $check = $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if($check === true ){
          header("LOCATION:index.php?msg=Bạn đã thêm thành công");
          exit();
        }else{ 
          echo "Có lỗi xảy ra";
        }        
      }
    ?>
      <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
        <div class="panel panel-danger">
          <div class="panel-body">
            <form method="post" enctype="multipart/form-data" id="reused_form">
              <div class="form-group">
                <label >Full Name</label>
                <input type="text" name="fullname" required class="form-control" placeholder="Enter Your Full Name">
              </div>
              <div class="form-group">
                <label >Username</label>
                <input type="text" name="username" required class="form-control" placeholder="Enter Your Username">
              </div>
              <div class="form-group">
                <label >Email</label>
                <input type="email" name="email" required class="form-control" placeholder="Enter Your Email">
              </div>
              <div class="form-group">
                <label >Password</label>
                <input type="password" name="password" required class="form-control" placeholder="Enter Your Password">
              </div>
              <div class="form-group">
                <label >Phone</label>
                <input type="tel" name="phone" required class="form-control" placeholder="Enter Your Phone">
              </div>
              <div class="form-group">
                <button class="btn btn-raised btn-lg btn-warning" type="submit" name="add">Send</button>
                <button class="btn btn-raised btn-lg btn-warning" type="reset">Reset</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

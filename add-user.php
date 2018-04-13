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
  <div class="add-user">
      <a href="/php">Home</a> 
    </div>
  <h1><span class="blue"><span class="yellow">Add new user</pan></h1>  
  <div class="container">
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
          echo "Có lỗi xảy";
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
  <style>
    .add-user {
      width: 80%;
      margin: 20px auto; 
    }
    .add-user a{
      background-color: #323C50;
      text-decoration: none;
      color: aliceblue;
      padding: 10px;
      font-weight: normal;
      font-size: 1em;
      -webkit-box-shadow: 0 2px 2px -2px #0E1119;
        -moz-box-shadow: 0 2px 2px -2px #0E1119;
              box-shadow: 0 2px 2px -2px #0E1119;
    }
    .add-user a:hover {
      background-color: #FFF842;
      color: #403E10;
      font-weight: bold;
      box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
      transform: translate3d(6px, -6px, 0);
      transition-delay: 0s;
      transition-duration: 0.4s;
      transition-property: all;
      transition-timing-function: line;
    }
  </style>
</body>
</html>

<?php include("header.php") ?>
<body>
  <div class="add-user">
    <a href="index.php">Home</a> 
  </div>
  <h1><span class="blue"><span class="yellow">Add new user</pan></h1>  
  <div class="container form-top">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
        <div class="panel panel-danger">
          <div class="panel-body">
          <?php
            if(isset($_POST['add'])){
              $full_name = $_POST['fullname'];
              $user_name = $_POST['username'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              $phone = $_POST['phone'];
              $stmt = $conn->prepare("insert into users(fullname,username,email,password,phone)
                                    values ('$full_name', '$user_name', '$email', '$password', '$phone')");
              try{
                $check = $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                if($check === true ){
                  header("LOCATION:index.php?msg=Bạn đã thêm thành công");
                  exit();
                }  
              }catch(PDOException $e){
          ?>
            <div class="error_message">
              <h4>
                Error
              </h4>
              Sorry there was an error sending your form. 
            </div>
              <?php
                }
              }
            ?>
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
              <button class="btn btn-raised btn-lg btn-warning" type="submit" name="add" >Send</button>
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

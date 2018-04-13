<?php include("header.php") ?>
<body>
  <div class="add-user">
    <a href="index.php">Home</a> 
  </div>
  <h1><span class="blue"><span class="yellow">Edit user</pan></h1>  
  <div class="container form-top">
    <div class="row">
    <?php
      if(isset($_REQUEST['id_user']) and $_REQUEST['id_user'] > 0){
          $id_user = $_REQUEST['id_user'];
        }else{
          header("location:index.php");
          exit();
        }
        $sql = "select * from users where id = {$id_user}";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result['id'];
        $full_name = $result['fullname'];
        $user_name = $result['username'];
        $email = $result['email'];
        $password = $result['password'];
        $phone = $result['phone'];
    ?>
      <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
        <div class="panel panel-danger">
          <div class="panel-body">
          <?php
            if(isset($_POST['edit'])){
              $fullname = $_POST['fullname'];
              $username = $_POST['username'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              $phone = $_POST['phone'];
              $sql_edit = "update users set fullname = '$fullname', username = '$username', 
                          email = '$email', password = '$password', phone = '$phone' where id = {$id}";
              $stmt_edit = $conn->prepare($sql_edit);
              try{
                $check = $stmt_edit->execute();
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
            }}
          ?>
            <form method="post" enctype="multipart/form-data" id="reused_form">
              <div class="form-group">
                <label >Full Name</label>
                <input type="text" name="fullname" required class="form-control" value="<?php echo $full_name ?>">
              </div>
              <div class="form-group">
                <label >Username</label>
                <input type="text" name="username" required class="form-control" value="<?php echo $user_name ?>">
              </div>
              <div class="form-group">
                <label >Email</label>
                <input type="email" name="email" required class="form-control" value="<?php echo $email ?>">
              </div>
              <div class="form-group">
                <label >Password</label>
                <input type="password" name="password" required class="form-control" value="<?php echo $password ?>">
              </div>
              <div class="form-group">
                <label >Phone</label>
                <input type="tel" name="phone" required class="form-control" value="<?php echo $phone ?>">
              </div>
              <div class="form-group">
                <button class="btn btn-raised btn-lg btn-warning" type="submit" name="edit">Edit</button>
                <button class="btn btn-raised btn-lg btn-warning" type="reset">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
    .error_message {
      margin-bottom: 10px;
      color: red;
    }
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

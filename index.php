<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title> Responsive</title>
  <link rel="stylesheet" href="style.css">
  <?php
    include("dbconnect.php");
    $conn = connect();
  ?>
</head>
<body>  
<div class="add-user">
    <a href="index.php">Home</a> 
    <a href="add-user.php">New user</a>
  </div>
  <h1><span class="blue"><span class="yellow">Show list users</pan></h1>  
  <?php
    $stmt = $conn->prepare("select * from users");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
  ?>
  <table class="container">
    <thead>
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($result as $key => $values){
          $id = $values['id'] ;
          $full_name =$values['fullname'];
          $user_name =$values['username'];
          $email = $values['email'];
          $phone = $values['phone'];
      ?>
      <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $full_name ?></td>
        <td><?php echo $user_name ?></td>
        <td><?php echo $email ?></td>
        <td><?php echo $phone ?></td>
        <td>
          <a href="edit-user.php?id_user=<?php echo $id ?>"><i class="fas fa-edit"></i></a> |
          <a href="del-user.php?id_user=<?php echo $id ?>" onclick="alert('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>
    </tbody>
    <?php } ?>
  </table>
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
  <script defer src="/static/fontawesome/fontawesome-all.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</body>
</html>

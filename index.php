<?php include("header.php") ?>
<body>  
  <div class="add-user">
    <a href="index.php">Home</a> 
    <a href="add-user.php">New user</a>
  </div>
  <h1><span class="blue"><span class="yellow">Show list users</pan></h1>  
  <?php
    $sql_pag = $conn->prepare("select count(id) from users");
    $sql_pag->execute();
    $row = $sql_pag->fetchColumn();
    $limit = 5;
    if(isset($_GET["page"])){
      $current_page=$_GET["page"];
    }else{
      $current_page=1;
    }
    $paginate = ceil($row/$limit);
    $offset = ($current_page - 1) * $limit;
    $stmt = $conn->prepare("select * from users limit $offset,$limit");
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
  <div class = "add-user">
    <?php
      if($current_page > 1 && $paginate > 1){
        echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
      }
      for ($i = 1; $i <= $paginate; $i++){
        if ($i == $current_page){
          echo '<span>'.$i.'</span> | ';
        }
        else{
          echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
        }
      }
      if ($current_page < $paginate && $paginate > 1){
        echo '<a href="index.php?page='.($current_page+1).'">Next</a> ';
      }
    ?>
  </div>
  <script defer src="/static/fontawesome/fontawesome-all.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</body>
</html>

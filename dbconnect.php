<?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $namedb = "php_basic";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$namedb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
  }
  catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
  }
?>

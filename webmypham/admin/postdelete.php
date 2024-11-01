<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "mypham";
      $conn = new mysqli($servername, $username, $password, $dbname);
     
      $BV_MA = $_GET['BV_MA'];
      $sql = "DELETE FROM `baiviet` WHERE BV_MA = '$BV_MA'";
 
       $result = mysqli_query($conn, $sql);
 
     mysqli_close($conn);
 
     header('location: posts.php');
?>
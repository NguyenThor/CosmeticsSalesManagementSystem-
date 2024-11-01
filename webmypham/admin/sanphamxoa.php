<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mypham";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $SP_MA = $_GET['SP_MA'];
        $sql = "DELETE FROM SANPHAM WHERE SP_MA='$SP_MA';";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: sanpham.php');
        ?>

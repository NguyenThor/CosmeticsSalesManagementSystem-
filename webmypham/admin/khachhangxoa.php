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
        $KH_MA = $_GET['KH_MA'];
        $sql = "DELETE FROM KHACHHANG WHERE KH_MA='$KH_MA';";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: khachhang.php');
        ?>

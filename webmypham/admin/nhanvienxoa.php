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
        $NV_MA = $_GET['NV_MA'];
        $sql = "DELETE FROM nhanvien WHERE NV_MA='$NV_MA';";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: nhanvien.php');
        ?>
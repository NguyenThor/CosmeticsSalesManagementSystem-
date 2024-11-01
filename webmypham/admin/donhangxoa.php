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
        $DH_MA = $_GET['DH_MA'];
        $sql = "DELETE FROM DONHANG WHERE DH_MA='$DH_MA';";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: donhang.php');
        ?>

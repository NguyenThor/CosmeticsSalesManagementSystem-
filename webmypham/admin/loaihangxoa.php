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
        $L_MA = $_GET['L_MA'];
        $sql = "DELETE FROM loaihang WHERE L_MA='$L_MA';";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: loaihang.php');
        ?>
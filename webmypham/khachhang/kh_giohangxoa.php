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
        $ID = $_GET['ID'];
        $sql = "DELETE FROM chitietgiohang WHERE id='$ID';";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: kh_giohang.php');
        ?>
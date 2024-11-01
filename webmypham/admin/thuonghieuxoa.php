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
        $TH_MA = $_GET['TH_MA'];
        $sql = "DELETE FROM THUONGHIEU WHERE TH_MA='$TH_MA';";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: thuonghieu.php');
        ?>
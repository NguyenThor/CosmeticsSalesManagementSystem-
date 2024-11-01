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
        $DV_MA = $_GET['DV_MA'];
        $sql = "DELETE FROM donvivanchuyen WHERE DV_MA='$DV_MA';";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: donvivanchuyen.php');
?>
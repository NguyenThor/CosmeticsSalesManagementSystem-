
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
        $KM_MA = $_GET['KM_MA'];
        $sql = "DELETE FROM khuyenmai WHERE KM_MA='$KM_MA';";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header('location: khuyenmai.php');
        ?>
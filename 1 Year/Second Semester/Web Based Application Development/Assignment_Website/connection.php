<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "renthubtmp";

    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (!mysqli_select_db($conn, $db)) {
        die("Database does not exist: " . mysqli_error($conn));
    }
?>

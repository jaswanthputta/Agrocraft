<?php 
    $con = mysqli_connect("localhost", "root", "", "impulse101");

    // Check the connection
    if (mysqli_connect_errno()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
?>

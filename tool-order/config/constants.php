<?php 
    // Start Session
    session_start();

    // Create Constants to Store Non-Repeating Values
    define('SITEURL', 'http://localhost/tool-order/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'tool-order');

    // Database Connection
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn));

    // Selecting Database
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));
?>
<?php 
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'myshop';
    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die('Connecton Failed: ' . $connection->connect_error);
    }

?>
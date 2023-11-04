<?php

    /////////////////////////////////////////////////////////////
    // Procedural 

    // $host = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "crud_101";

    // $connection = mysqli_connect($host, $username, $password, $database);

    // if (!$connection) {
    //     die("Database connection failed: " . mysqli_connect_error());
    // }

    /////////////////////////////////////////////////////////////
    // OOP
    
    // Database connection
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'crud_101';

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    /////////////////////////////////////////////////////////////
    
?>
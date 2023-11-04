<?php
// set header
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

// require database connection
require_once('database_connection.php');

while (true) {
    // Query your database table to fetch data
    $query = 'SELECT * FROM todos WHERE archive = 0';
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo 'data: ' . json_encode($data) . "\n\n";
    }

    ob_flush();
    flush();
    sleep(5); //  FIVE SECONDS UPDATE INTERVAL
}

$conn->close();

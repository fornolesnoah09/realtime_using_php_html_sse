<?php 
// require database connection
require_once('database_connection.php');

// Prepare and execute the query
$query = "SELECT * FROM todos WHERE archive = '0'";
$result = $conn->query($query);

// Check if the query executed successfully
if ($result) {

    // Fetch all rows as an associative array
    $data = array();
    while ($row = $result->fetch_assoc()) {

        // Format the date column: July 14, 2023, 12:34 PM
        $row['created_at'] = date('F j, Y, h:i A', strtotime($row['created_at']));
        $data[] = $row;

    }

    // Close the result set
    $result->close();

    // Close the database connection
    $conn->close();

    // OPTION 1. Return the data with response message
    // $response = [
    //     "success" => true,
    //     "message" => "Successfully retrieve data from the database.",
    //     "data" => $data
    // ];
    // echo json_encode($response);
    
    // OPTION 2. Return the data as JSON, datatable expect only data, no other response parameters
    echo json_encode(array("data" => $data));

} else {
    // Handle the case when the query fails
    $response = [
        "success" => false,
        "message" => "Failed to retrieve data from the database."
    ];
    echo json_encode($response);
}

?>
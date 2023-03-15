<?php

function deletefunction($id) {
    // Create a database connection object
    $conn = new mysqli("localhost:3306", "timo", "timo", "test_db");

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query
    $sql = "DELETE FROM tb_test WHERE id = $id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}






?>
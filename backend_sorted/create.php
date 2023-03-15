<?php

require_once 'pdo.php';
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the name input from the form
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Upload file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert the new name into the tb_test table
    $sql = "INSERT INTO tb_user (name, password, image_path) VALUES ('$name', '$password', '$target_file')";
    if ($conn->query($sql) === TRUE) {
        echo "New name added successfully <br>";
        // Use PRG to redirect to the same page
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
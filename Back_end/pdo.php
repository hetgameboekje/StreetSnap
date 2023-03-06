<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend page</title>
    <link rel="stylesheet"href="style.css">
    
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required> 
    <input type="text" id="password" name="password" required>
    <input type="file" name="image">
    <input type="submit" value="Add">
</form>
</body>
</html>

<?php

// Set the database credentials
$servername = "localhost:3306";
$username = "timo";
$password = "timo";
$dbname = "test_db";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    $sql = "INSERT INTO tb_test (name, password, image_path) VALUES ('$name', '$password', '$target_file')";
    if ($conn->query($sql) === TRUE) {
        echo "New name added successfully <br>";
        // Use PRG to redirect to the same page
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$sql = "SELECT * FROM tb_test ORDER BY id DESC";
$result = $conn->query($sql);
// Select all rows from the tb_test table


// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the data for each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - password = " . $row["password"] . "<br>"."<img src='$row[image_path]' alt='Alt text unknown' ;>". "<br>";
    }
    
} else {
    echo "No results found";
}

// Close the connection
$conn->close();

?>

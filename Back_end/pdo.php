<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Establish database connection
    $db = new PDO("mysql:host=172.18.0.2;port=3306;dbname=test_db", "timo", "timo");

    // Check if the 'tb_test' table exists, if not, create it
    $stmt = $db->prepare("CREATE TABLE IF NOT EXISTS tb_test (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL)");
    $stmt->execute();

    // Get the name input from the form
    $name = $_POST['name'];

    // Prepare and execute an SQL statement to insert the name into the 'tb_test' table
    $stmt = $db->prepare("INSERT INTO tb_test (name) VALUES (:name)");
    $stmt->execute(array(':name' => $name));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="name">
        <button type="submit">Submit deez nuts</button>
    </form>
</body>
</html>

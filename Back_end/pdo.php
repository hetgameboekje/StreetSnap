<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    
    // Create a new PDO object
    $dsn = 'mysql:host=localhost;dbname=test_db';
    $username = 'timo';
    $password = 'timo';
    
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO tb_test (name) VALUES (:name)");
        
        // Bind parameters
        $stmt->bindParam(':name', $name);
        
        // Execute the statement
        $stmt->execute();
        
        echo "Data inserted successfully.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
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

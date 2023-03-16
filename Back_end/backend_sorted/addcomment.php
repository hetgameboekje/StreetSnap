<?php

require_once 'pdo.php';
$id = "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
}
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the name input from the form
    $id = $_POST["id"];
    $comment = $_POST["comment"];
    header("Location:index.php");


    // Insert the new name into the tb_test table
    $sql = "INSERT INTO tb_comment (id, comment) VALUES ('$id', '$comment')";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend page</title>
    <link rel="stylesheet"href="style.css">
    
</head>

<style>
img {
    width: 40%;
}
</style>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="hidden" id="id" name="id" required value="<?php echo $id ?>"> 
    <input type="text" id="comment" name="comment" required placeholder="Post a comment">
    <input type="submit" value="Add">
</form>
</body>
</html>

<?php

?>
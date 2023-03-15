<?php
require 'pdo.php';

$id=""

if(isset($_GET['id'])){
    $id = $_GET['id'];

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT tb_name WHERE id=$id";
echo $_row['name']
//$sql = "UPDATE tb_name SET 'name='$name' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required placeholder="First name"> 
    <input type="text" id="password" name="password" required placeholder="Last name">
    <input type="file" name="image" >
    <input type="hidden" name="frmInsertUser" value="frmInsertUser" />
    <input type="submit" value="Add">
</form>
</body>
</html>
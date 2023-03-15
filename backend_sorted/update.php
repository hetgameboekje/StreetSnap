<?php
require 'pdo.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tb_name SET 'name='$name' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
}
    
?>
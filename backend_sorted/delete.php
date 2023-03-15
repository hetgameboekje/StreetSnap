<?php
require 'pdo.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    echo $id;

    $sql="DELETE FROM `tb_user` WHERE id = $id" ;
    if ($conn->query($sql) === TRUE) {
        echo "Deleted succesfully <br>";
        // Use PRG to redirect to the same page
        header("Location:index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



?>
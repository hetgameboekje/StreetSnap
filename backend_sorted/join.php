<?php
require 'pdo.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    echo $id;

    $sql="SELECT tb_user.id, tb_user.name tb_comment.id , tb_comment.comment FROM tb_user, tb_comment WHERE tb_user.id=tb_comment.id ORDER BY tb_user.id" ;

}
require_once 'pdo.php';
$id = 6; // Replace with the id value you want to retrieve

$sql = "SELECT * FROM tb_user WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $name = $row["name"];
    $password = $row["password"];
    $image_path = $row["image_path"];

    // Output the data for the selected row
    echo "Id :" . $id . "<br>";
    echo "Name :" . $name . "<br>";
    echo "Password :" . $password . "<br>";
    echo "Photo: <br>" . "<img src='".$image_path . "' alt='Alt text unknown'>" . "<br>" .
    "<button><a href='delete.php?id=".$id."'>Delete</a></button><br>";

} else {
    echo "No results found";
}


?>
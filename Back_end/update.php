<?php
require 'pdo.php';
$id = "1";
echo $id . "<br>";
if(isset($_GET['id'])){
    $id = $_GET['id'];

    echo $id;

    $sql="SELECT tb_user.id, tb_user.name FROM tb_user WHERE tb_user.id=$id" ;

}
echo $id . "<br>";
require_once 'pdo.php';

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
    echo "Photo: <br>" . "<img src='".$image_path . "' alt='Alt text unknown' width=600px;'>" . "<br>";

} else {
    echo "No results found";
}


?>
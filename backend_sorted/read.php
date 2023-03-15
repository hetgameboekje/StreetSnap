<?php
require_once 'pdo.php';

$sql = "SELECT * FROM tb_user ORDER BY id DESC";
$result = $conn->query($sql);
// Select all rows from the tb_test table


// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the data for each row
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $name = $row["name"];
        $password = $row["password"];
        $image_path = $row["image_path"];

        echo "Id :" . $id . "<br>";
        echo "Name :" . $name . "<br>";
        echo "Password :" . $password . "<br>";
        echo "Photo: <br>" . "<img src='".$image_path . "' alt='Alt text unknown'>" . "<br>";

        #echo "<h2>". $id . "</h2>" . "ID: " . $row["id"] . " - Name: " . $row["name"] . " - password = " . $row["password"] ."<br> <button>".$row["id"]."</button>". "<br>"."<img src='$row[image_path]' alt='Alt text unknown' ;>"  ;
        
    }
    
} else {
    echo "No results found";
}
?>
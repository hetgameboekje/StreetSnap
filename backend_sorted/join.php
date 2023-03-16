<!DOCTYPE html>
<html>
<head>
	<title>Join Two Tables</title>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px;
            
		}
        .pfp {
            width: 100px;
            border-radius: 50px;
        }
	</style>
</head>
<body>
	
    
	<?php
    $id = "";
    $name = "";
    $password = "";
    $comment = "";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        echo "User selected with ID " . $id. "<br>";
    }
    
    
	// Step 1: Define the SQL query
    $sql = "SELECT *
    FROM tb_user
    JOIN tb_comment ON tb_user.id = tb_comment.id
    WHERE tb_user.id = '$id'
    ORDER BY tb_user.id";

	// Step 2: Connect to the database
    require_once 'pdo.php';

	// Step 3: Execute the SQL query
	$result = mysqli_query($conn, $sql);

	// Step 4: Display the result in an HTML table
	if (mysqli_num_rows($result) > 0) {
		echo "<table>";
		echo "<tr><th>pfp</th><th>name</th><th>password</th><th>Comment</th></tr>";
		while ($row = mysqli_fetch_assoc($result)) {
            $comment =  $row["comment"];
            $password = $row["password"];
            $name = $row["name"]; 
            $img = $row["image_path"];
			echo "<tr>";
            echo "<td><img src='". $img . "' class=pfp></img></td>";
			echo "<td>" . $name . "</td>";
			echo "<td>" . $password . "</td>";
			echo "<td>" . $comment . "</td>";
			echo "</tr>";
            
		}
		echo "</table>";
	} else {
		echo "No comments found on user with ID:  " . $id;
	}

	// Step 5: Close the database connection
	mysqli_close($conn);
	?>
</body>
</html>

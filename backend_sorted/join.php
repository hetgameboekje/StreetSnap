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
	</style>
</head>
<body>
	<h1>Join Two Tables</h1>
    
	<?php
    $id = "";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        echo $id;
    }
    
    
	// Step 1: Define the SQL query
	$sql = "SELECT *
    FROM tb_user , tb_comment
    WHERE tb_user.id = tb_comment.id && $id
    ORDER BY tb_user.id";

	// Step 2: Connect to the database
    require_once 'pdo.php';

	// Step 3: Execute the SQL query
	$result = mysqli_query($conn, $sql);

	// Step 4: Display the result in an HTML table
	if (mysqli_num_rows($result) > 0) {
		echo "<table>";
		echo "<tr><th>Order ID</th><th>Customer Name</th><th>Order Date</th></tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row["name"] . "</td>";
			echo "<td>" . $row["comment"] . "</td>";
			echo "<td>" . $row["password"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "No results found.";
	}

	// Step 5: Close the database connection
	mysqli_close($conn);
	?>
</body>
</html>

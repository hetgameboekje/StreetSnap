<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['frm_contact'])) {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Connect to the database
    $db = new mysqli('hostname', 'username', 'password', 'database_name');

    // Check if the connection was successful
    if ($db->connect_errno) {
        // Connection error occurred
        echo 'Failed to connect to database: ' . $db->connect_error;
        exit();
    }

    // Prepare the SQL statement
    $stmt = $db->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");

    // Bind the parameters to the statement
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    // Execute the statement
    if (!$stmt->execute()) {
        // Insertion error occurred
        echo 'Failed to insert data into database: ' . $stmt->error;
        exit();
    }

    // Data was inserted successfully
    echo 'Data inserted successfully';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact page</title>
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="style.css">

    
</head>
<body>
<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Contact Us</h2>
				<form action="" method="post" enctype="multipart/form-data">
					<input name="name" type="text" class="field" placeholder="Your Name">
					<input name="email" type="text" class="field" placeholder="Your Email">
					<input name="phone" type="text" class="field" placeholder="Phone">
					<textarea name="message" placeholder="Message" class="field"></textarea>
                    <input type="hidden" name="frm_contact" value="contact">
					<input name="submit" value="send" type="submit" class="btn">
					
				</form>
			</div>
		</div>
	</div>

</body>
</html>

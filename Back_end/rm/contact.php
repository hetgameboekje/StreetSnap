<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_POST["tb_test"])) {
	require_once 'database.php';
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	$sql = "INSERT INTO tb_contact (name, email, message) values(?,?,?,?)";
	$data = array($name, $email, $message);
	$result = Database::getData($sql, $data);
	print_r("<h1>Er wordt zo snel mogelijk contact met u opgenomen!</h1>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact page</title>
    
</head>
<body>
<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Contact Us</h2>
				<form method="post" enctype="multipart/form-data">
					<input name="name" type="text" class="field" placeholder="Your Name">
					<input name="email" type="text" class="field" placeholder="Your Email">
					<textarea name="message" placeholder="Message" class="field"></textarea>
                    <input type="hidden" name="tb_test	" value="contact">
					<input name="submit" value="send" type="submit" class="btn">
					
				</form>
			</div>
		</div>
	</div>

</body>
</html>
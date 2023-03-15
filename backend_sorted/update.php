
<?php
require 'pdo.php';
$id = "";
$name = "";
if(isset($_GET['id'],$_GET['name'],$_GET['password'])){
    $id = $_GET['id'];
    $name = $_GET['name'];
    $password = $_GET['password'];
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
<input type="text" id="name" name="name" required value="<?php echo $name; ?>">
<input type="text" id="password" name="password" required value="<?php echo $password; ?>">
<input type="file" name="image" >
<input type="hidden" name="frmInsertUser" value="frmInsertUser" />
<input type="submit" value="Add">
<hr>
</form>
</body>
</html>
<?php 
echo $id. "<br>";
echo $name. "<br>";
echo $password . "<br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend page</title>
    <link rel="stylesheet"href="style.css">
    
</head>

<style>
img {
    width: 40%;
}
</style>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required placeholder="First name"> 
    <input type="text" id="password" name="password" required placeholder="Last name">
    <input type="file" name="image" >
    <input type="hidden" name="frmInsertUser" value="frmInsertUser" />
    <input type="submit" value="Add">
    <hr>
</form>
</body>
</html>

<?php

include_once 'read.php';
require_once 'create.php';
?>
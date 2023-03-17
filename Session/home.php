<?php
session_start();
if($_SESSION["id"] === 404)
{
    echo "yes";
}
else {
    echo "no";
}
if(isset($_POST['logout'])){
    session_destroy();
    header("Location: index.php"); // redirect to login page or wherever you want
    exit();
}
?>

<form method="POST">
    <input type="submit" name="logout" value="Logout">
</form>

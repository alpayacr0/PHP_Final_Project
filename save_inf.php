<?php
require_once "conn.php";

$name = $_POST['nameSurname'];
$password = $_POST['password'];
$email_address = $_POST['email'];

$stmt = $conn->prepare("INSERT INTO users (name_surname, password, role, email) VALUES (:name, :password,  'normal', :email_address)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':email_address', $email_address);

$stmt->execute();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <center>
        <h1><?php echo 'Registration Successful'; 
        header("Refresh:3;url=index.html");?></h1> <br>

        <h4>After 3 seconds you are redirected to the login page.</h4>
    </center>
</body>
</html>
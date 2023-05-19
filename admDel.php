<?php
require_once "conn.php";

$id = $_GET['id'];
$query = "DELETE FROM users WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt -> bindValue(':id',$id);
$stmt -> execute();

echo '<div class="alert alert-success" role="alert">
            The account you selected has been successfully deleted!
        </div>';


header("Location: user_list.php");
exit();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Deleted</title>
</head>
<body>
</body>
</html>


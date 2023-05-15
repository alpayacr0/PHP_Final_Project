<?php
require_once "conn.php";

session_start();

$userid = $_SESSION['id'];

$query = "DELETE FROM users WHERE id = :userid";
$statement = $conn->prepare($query);
$statement-> bindValue(':userid', $userid);
$statement-> execute();

echo '<div class="alert alert-success" role="alert">
          Hesabınız başarıyla silindi!
        </div>';
header("Refresh:1 ; Location: index.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  
</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Panel</title>
  <style>
    .center-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .button-group {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
    }
  </style>
</head>

<body>
  <div class="center-container">
    
    <h1>Hello, <?php echo $_SESSION["name_surname"];?> !</h1>
    <div class="button-group">
        <a class="btn btn-primary" href='edit_inf.php' role="button">Edit Information</a>
        <a class="btn btn-primary" href="del_inf.php" role="button">Delete the Account</a>
      <?php
      if($_SESSION["role"] == 1){
        echo "<a class='btn btn-primary' href='user_list.php' role='button'>List Users</a>";
      }
      ?>
    </div>
  </div>
</body>

</html>
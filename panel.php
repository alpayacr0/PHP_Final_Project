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
    
    <h1>Merhaba, <?php echo $_SESSION["username"];?> !</h1>
    <a href="edit_inf.php"></a>
    <div class="button-group">
        <a class="btn btn-primary" href='deneme.php' role="button">Bilgileri Düzenle</a>
        <a class="btn btn-primary" href="#" role="button">Üyeliği Dondur</a>
      <?php
      if($_SESSION["role"] === 'admin'){
        echo "<a class='btn btn-primary'  role='button'>Üyeleri Listele</a>";
      }
      ?>
    </div>
  </div>
</body>

</html>
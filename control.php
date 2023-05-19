<?php
require_once "conn.php";

if (isset($_POST["mail_address"])&& isset($_POST["password"])) {
  
  $mail_address = $_POST['mail_address'];
  $password = $_POST['password'];
  
  $query = "SELECT * FROM users WHERE email = :mail_address AND password = :password";
  $statement = $conn->prepare($query);
  $statement->bindValue(':mail_address', $mail_address);
  $statement->bindValue(':password', $password);
  $statement->execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    session_start();
    $_SESSION['id'] = $user["id"];
    $_SESSION['name_surname'] = $user["name_surname"];
    $_SESSION['password'] = $user['password'];
    $_SESSION['mail_address'] = $user["email"];
    $_SESSION['role'] = $user["role"];
    header("Location: panel.php");
    exit;
  }
  else{
    for ($x = 3; $x >= 0; $x--) {
      echo "Kullanıcı adı veya şifre yanlış. $x saniye sonra giriş sayfasına yönelndirileceksiniz. Lütfen tekrar deneyiniz.";
      sleep(1);
      header("Location: index.html");
    }
    echo"";
  }

}
?>
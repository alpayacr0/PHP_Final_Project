<?php
$servername = "localhost";
$username = "root";
$password = "";


try {
  $conn = new PDO("mysql:host=$servername;dbname=user_db", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  if (isset($_POST["username"])&& isset($_POST["password"])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $statement = $conn->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user/* $count>0 */) {
      session_start();
      $_SESSION['username'] = $user["username"];
      $_SESSION['role'] = $user["role"];
      $_SESSION['id'] = $user["id"];
      $_SESSION['password'] = $user['password'];
      header("Location: panel.php");
      exit;
    }
    else{
      for ($x = 5; $x >= 0; $x--) {
        echo "Kullanıcı adı veya şifre yanlış. $x saniye sonra giriş sayfasına yönelndirileceksiniz. Lütfen tekrar deneyiniz.";
        sleep(1);
        header("Location: index.html");
      }
      echo"";
    }

  }

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
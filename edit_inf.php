<?php
require_once "conn.php";
session_start();
$id = $_SESSION['id'];
$name_surname = $_SESSION['name_surname'];
$role = $_SESSION['role'];
$mail_address = $_SESSION["mail_address"];
$password = $_SESSION['password'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $newName = $_POST['name_surname'];
    $newPassword = $_POST['password'];
    $newEmail = $_POST['mailaddress'];
    

    try {
        $stmt = $conn->prepare("UPDATE users SET name_surname = :name_surname, password = :newPassword, email = :newEmail, role = :newRole WHERE id = :id");
        $stmt->bindParam(':name_surname', $newName);
        $stmt->bindParam(':newPassword', $newPassword);
        $stmt->bindParam(':newEmail', $newEmail);
        $stmt->bindParam(':newRole', $role);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $_SESSION['name_surname'] = $newName;
        $_SESSION["mail_address"] = $newEmail;
        $_SESSION['password'] = $newPassword;

        echo "Veri güncellendi";
    } catch (PDOException $e) {
        echo "Veri güncelleme hatası: " . $e->getMessage();
    }


    header("Location: panel.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <title>Bilgi Düzenleme</title>
</head>
<body>
    <div class="container d-flex flex-column align-items-center justify-content-center vh-100">
        <h1 class="mb-4">Account Information</h1>
        <div class="card text-center">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="name_surname" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name_surname" name="name_surname" value="<?php echo $name_surname; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="mailaddress" class="form-label">E-mail Address</label>
                        <input type="mailaddress" class="form-control" id="mailaddress" name="mailaddress" value="<?php echo $mail_address; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
  </div>


    </div>
</body>
</html>
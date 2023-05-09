<?php
session_start();

$username = $_SESSION['username'];
$role = $_SESSION['role'];
$id = $_SESSION['id'];

$password = str_repeat('*', strlen($_SESSION['password']));

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
        <h1 class="mb-4">Hesap Bilgileri</h1>
        <div class="card text-center">
            <div class="card-body">
                <form>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Kullanıcı Adı:</span>
                        <input type="text" class="form-control" value="<?php echo $username; ?>">
                    </div>
                
                    <div class="input-group mb-3">
                        <span class="input-group-text">Şifre:</span>
                        <input type="password" class="form-control" value="<?php echo $password; ?>">
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rol:</span>
                        <input type="text" class="form-control" value="<?php echo $role; ?>"readonly>
                    </div>
                    
                    
                    <button type="button" class="btn btn-primary">Düzenle</button>
                </form>
            </div>
        </div>
  </div>


    </div>
</body>
</html>
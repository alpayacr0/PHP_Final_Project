<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin User Edit</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            }
    </style>
</head>
<body>
    <div class="container d-flex flex-column align-items-center justify-content-center vh-100">

    <?php
    require_once 'conn.php';
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
        <h1 class='mb-4'>Acount Information</h1>
        <div class="card text-center">
            <div class="card-body">
                <form action="admEdit.php" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">Id</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $user['id']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="name_surname" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name_surname" name="name_surname" value="<?php echo $user['name_surname']?>">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']?>">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-label" name="role" id="role">
                            <option value="0">Normal</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mailaddress" class="form-label">E-mail Address</label>
                        <input type="mailaddress" class="form-control" id="email" name="email" value="<?php echo $user['email']?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
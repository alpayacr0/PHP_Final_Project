<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <div class="container">
        <?php
        require_once 'conn.php';
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>Full Name</th>";
        echo "<th>Password</th>";
        echo "<th>Role</th>";
        echo "<th>E-mail</th>";
        echo "<th></th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['name_surname']}</td>";
            echo "<td>{$user['password']}</td>";
            echo "<td>{$user['role']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td><a href='admEdit_inf.php?id={$user['id']}' class='btn btn-primary'>Edit</a></td>";
            echo "</tr>";
            }

        echo "</tbody>";
        echo "</table>";
    ?>
  </div>
</body>
</html>

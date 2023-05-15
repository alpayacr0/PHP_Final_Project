<?php
require_once 'conn.php';

$newName = $_POST['name_surname'];
$newPassword = $_POST['password'];
$newRole = $_POST['role'];
$newEmail = $_POST['email'];

$stmt = $conn->prepare("UPDATE users SET name_surname= :name_surname, password=:password, role = :role, email = :email WHERE id = :id");
$stmt->bindParam(':name_surname', $newName);
$stmt->bindParam(':password', $newPassword);
$stmt->bindParam(':role', $newRole);
$stmt->bindParam(':email', $newEmail);
$stmt->bindParam(':id', $_POST['id']);
$stmt->execute();

echo "Information update successful";
header("Refresh:2;url=panel.php");


?>






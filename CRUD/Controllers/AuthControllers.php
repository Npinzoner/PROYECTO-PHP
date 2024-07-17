<?php
session_start();
include '../Models/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user = $_POST['user'];
  $password = $_POST['password'];

  // Preparar y ejecutar la consulta
  $sql = "SELECT * FROM user WHERE user = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $user);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    // Verificar la contraseña
    if ($password === $userData['password']) {
      $_SESSION['user'] = $userData['user'];
      header('Location: ../views/crud.php');
      exit();
    } else {
      header('Location: ../views/home.html');
      exit();
    }
  } else {
    header('Location: ../views/home.html');
    exit();
  }
} else {
  header('Location: ../views/home.html');
  exit();
}

<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "raspa_todo";

// Crear la conexión
$conn = new mysqli($server, $user, $pass, $db);
$conn->set_charset("utf8mb4");

// Verificar conexión
if ($conn->connect_error) {
  error_log("Conexión fallida" . $conn->connect_error);
  die("Conexión fallida. Verifica el log para más detalles.");
}
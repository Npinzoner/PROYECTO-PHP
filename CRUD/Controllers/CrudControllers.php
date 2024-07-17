<?php
include '../Models/db.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../views/home.html');
    exit();
}

//Crear
function createPlay($conn, $game, $number, $city, $bet)
{
  $sql = "INSERT INTO play (game, number, city, bet) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssi", $game, $number, $city, $bet);
  return $stmt->execute();
}

//Leer
function getPlay($conn)
{
  $sql = "SELECT * FROM play";
  $result = $conn->query($sql);
  return $result->fetch_all(MYSQLI_ASSOC);
}

//Eliminar
function deletePlay($conn, $id)
{
  $sql = "DELETE FROM play WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  return $stmt->execute();
}

//Actualizar
function updatePlay($conn, $id, $game, $number, $city, $bet)
{
  $sql = "UPDATE play SET game=?, number=?, city=?, bet=? WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssdi", $game, $number, $city, $bet, $id);
  return $stmt->execute();
}



//Validaciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['action'])) {
    switch ($_POST['action']) {
      case 'create':
        if (isset($_POST['game'], $_POST['number'], $_POST['city'], $_POST['bet'])) {
          $game = $_POST['game'];
          $number = $_POST['number'];
          $city = $_POST['city'];
          $bet = (int) $_POST['bet'];
          if (createPlay($conn, $game, $number, $city, $bet)) {
            header("Location: crud.php");
            exit();
          } else {
            echo "Error al crear el producto";
          }
        }
        break;

      case 'delete':
        if (isset($_POST['id'])) {
          $id = (int) $_POST['id'];
          if (deletePlay($conn, $id)) {
            header("Location: crud.php");
            exit();
          } else {
            echo "Error al eliminar el producto";
          }
        }
        break;

      case 'edit':
        if (isset($_POST['id'], $_POST['game'], $_POST['number'], $_POST['city'], $_POST['bet'])) {
          $id = (int) $_POST['id'];
          $game = $_POST['game'];
          $number = $_POST['number'];
          $city = $_POST['city'];
          $bet = (int) $_POST['bet'];
          if (updatePlay($conn, $id, $game, $number, $city, $bet)) {
            header("Location: crud.php");
            exit();
          } else {
            echo "Error al actualizar el producto";
          }
        }
        break;

      default:
        echo "Acción no reconocida";
        break;
    }
  }
}

// Obtener la lista
$data = getPlay($conn);

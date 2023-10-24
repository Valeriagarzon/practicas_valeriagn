<?php
include('database.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "SELECT * FROM products WHERE id = $id";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed: ' . mysqli_error($connection));
  }

  $product = mysqli_fetch_assoc($result);

  // Devuelve los datos del producto en formato JSON
  echo json_encode($product);
}
?>

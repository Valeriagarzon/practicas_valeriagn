<?php
include('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];

  $query = "UPDATE products SET name = '$name', description = '$description' WHERE id = $id";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die('Query Failed: ' . mysqli_error($connection));
  }

  echo "Producto actualizado exitosamente";
}
?>


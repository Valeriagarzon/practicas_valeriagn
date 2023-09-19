<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];

    if ($sexo === 'femenino' && $edad >= 18 && $edad <= 35) 
    {
        header('Location: respuesta.php?mensaje=Bienvenida,%20usted%20est%C3%A1%20en%20el%20rango%20de%20edad%20permitido.');
        exit();
    } else {
       
        header('Location: respuesta.php?mensaje=Error,%20no%20cumple%20con%20los%20requisitos%20de%20edad%20y%20g%C3%A9nero.');
        exit();
    }
}
?>

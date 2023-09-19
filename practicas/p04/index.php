<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    ?>

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>

<h2>Ejercicio 2</h2>

<p> Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
secuencia compuesta por: impar, par, impar. Estos números deben almacenarse en una matriz de Mx3,
donde M es el número de filas y 3 el número de columnas. Al final muestra el número de iteraciones
y la cantidad de números generados: 12 números obtenidos en 4 iteraciones</p>

<?php
require_once 'p03_funciones.php';
$matriz = array();
$iteraciones = 0;

while (true) {
    $iteraciones++;
    
    $num1 = generarImpar();
    $num2 = generarPar();
    $num3 = generarImpar();
    if ($num1 % 2 == 1 && $num2 % 2 == 0 && $num3 % 2 == 1) {
        $matriz[] = array($num1, $num2, $num3);
        break; 
    }
}
echo "Matriz resultante:\n"; 
foreach ($matriz as $fila) {
    echo implode(", ", $fila) . "\n";  echo '<br>';
}
echo "Número de iteraciones: $iteraciones\n";  echo '<br>';
echo "Cantidad de números generados: " . ($iteraciones * 3) . "\n";  echo '<br>';
?>
</body>
</html>
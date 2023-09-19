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
require_once 'p04_funciones.php';
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

<h2> Ejercicio 3 </h2>
<p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
pero que además sea múltiplo de un número dado.</p>
<p> Crear una variante de este script utilizando el ciclo do-while. </p>
<p> El número dado se debe obtener vía GET. </p>

<?php
require_once 'p04_funciones.php';
if (isset($_GET['numero_dado'])) {
    $numeroDado = intval($_GET['numero_dado']);
} else {
    die("Proporcione un número válido");
}
// Utilizando un ciclo while
$encontrado = false;
$intentos = 0;
while (!$encontrado) {
    $intentos++;
    $numeroAleatorio = generarNumeroAleatorio();
    
    if (esMultiplo($numeroAleatorio, $numeroDado)) {
        $encontrado = true;
    }
}

echo "Usando un ciclo while:\n";  echo '<br>';
echo "Número entero aleatorio múltiplo de $numeroDado encontrado: $numeroAleatorio\n";  echo '<br>';
echo "Número de intentos: $intentos\n";  echo '<br>';  echo '<br>';

// Utilizando un ciclo do-while
$encontrado = false;
$intentos = 0;
do {
    $intentos++;
    $numeroAleatorio = generarNumeroAleatorio();
    
    if (esMultiplo($numeroAleatorio, $numeroDado)) {
        $encontrado = true;
    }
} while (!$encontrado);

echo "\nUsando un ciclo do while:\n";  echo '<br>';
echo "Número entero aleatorio múltiplo de $numeroDado encontrado: $numeroAleatorio\n";  echo '<br>';
echo "Número de intentos: $intentos\n";  echo '<br>';
?>

<h2> Ejercicio 4 </h2>
<p> Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
el valor en cada índice. Es decir: </p>
<p>[97] => a </p>
<p> [98] => b</p>
<p>[99] => c </p>
<p>[122] => z </p>
<p>-Crea el arreglo con un ciclo for</p>
<p>-Lee el arreglo y crea una tabla en XHTML con echo y un ciclo foreach</p>
<p>foreach ($arreglo as $key => $value) { # code...}</p>

<?php
require_once 'p04_funciones.php';
$arreglo = crearArreglo();
?>
    <table border="1">
        <tr>
            <th>Índice</th>
            <th>Valor</th>
        </tr>
        <?php
        foreach ($arreglo as $indice => $valor) 
        {
            echo "<tr>";
            echo "<td>$indice</td>";
            echo "<td>$valor</td>";
            echo "</tr>";
        }
        ?>
    </table>

<h2>Ejercicio 5 </h2>
<p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
bienvenida apropiado.</p>

    <h2>Formulario de Edad y Género</h2>
    <form action="procesar.php" method="post">
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" required><br>

        <label for="sexo">Género (sexo):</label>
        <select name="sexo" id="sexo">
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select><br>

        <input type="submit" value="Enviar">
    </form>



</body>
</html>
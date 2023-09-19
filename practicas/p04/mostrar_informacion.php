<?php
require_once 'registrar_autos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['matricula'])) {
        $matriculaConsulta = strtoupper($_POST['matricula']);
        if (array_key_exists($matriculaConsulta, $parqueVehicular)) {
            $autoInfo = $parqueVehicular[$matriculaConsulta]['Auto'];
            $propietarioInfo = $parqueVehicular[$matriculaConsulta]['Propietario'];
            echo "<h2>Información del Auto con Matrícula: $matriculaConsulta</h2>";
            echo "<h3>Información del Auto:</h3>";
            echo "<ul>";
            foreach ($autoInfo as $campo => $valor) {
                echo "<li>$campo: $valor</li>";
            }
            echo "</ul>";
            echo "<h3>Información del Propietario:</h3>";
            echo "<ul>";
            foreach ($propietarioInfo as $campo => $valor) {
                echo "<li>$campo: $valor</li>";
            }
            echo "</ul>";
        } else {
            echo "No se encontró ningún auto con la matrícula: $matriculaConsulta";
        }
    }
 
    elseif (isset($_POST['consulta_todos'])) {
        echo "<h2>Información de Todos los Autos Registrados</h2>";
        foreach ($parqueVehicular as $matricula => $info) {
            $autoInfo = $info['Auto'];
            $propietarioInfo = $info['Propietario'];
            echo "<hr>";
            echo "<h3>Información del Auto con Matrícula: $matricula</h3>";
            echo "<h4>Información del Auto:</h4>";
            echo "<ul>";
            foreach ($autoInfo as $campo => $valor) {
                echo "<li>$campo: $valor</li>";
            }
            echo "</ul>";
            echo "<h4>Información del Propietario:</h4>";
            echo "<ul>";
            foreach ($propietarioInfo as $campo => $valor) {
                echo "<li>$campo: $valor</li>";
            }
            echo "</ul>";
        }
    }
} else {
    echo "Acceso no válido.";
}
?>
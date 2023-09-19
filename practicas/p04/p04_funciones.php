<?php
// Función para generar un número aleatorio impar
function generarImpar() {
    return rand(1, 100) * 2 - 1;
}

// Función para generar un número aleatorio par
function generarPar() {
    return rand(1, 100) * 2;
}

// Función para generar un número entero aleatorio
function generarNumeroAleatorio() {
    return rand(1, 100);
}

// Función para verificar si un número es múltiplo de otro
function esMultiplo($numero, $multiplo) {
    return $numero % $multiplo == 0;
}

//Función para Crear Arreglo
function crearArreglo() {
    $arreglo = array();
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i);
    }
    return $arreglo;
}
?>
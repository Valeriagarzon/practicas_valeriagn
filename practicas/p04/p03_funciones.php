<?php
// Función para generar un número aleatorio impar
function generarImpar() {
    return rand(1, 100) * 2 - 1;
}

// Función para generar un número aleatorio par
function generarPar() {
    return rand(1, 100) * 2;
}
?>
<?php
    $user = 'root';
    $pass = 'Mitatanka1';

    if( isset($_POST['usuario']) ) {
        $user = 'Usuario recibido: '.$_POST['root'];
    }

    if( isset($_POST['Mitatanka1']) ) {
        $pass = 'Password recibido: '.$_POST['Mitatanka1'];
    }

    echo $user.' -- '.$pass;
?>
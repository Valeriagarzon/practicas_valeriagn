<!DOCTYPE html>
<html>
<head>
    <title>Respuesta</title>
</head>
<body>
    <h2>Respuesta</h2>
    <?php
    if (isset($_GET['mensaje'])) {
        echo '<p>' . htmlspecialchars($_GET['mensaje']) . '</p>';
    } else {
        echo '<p>No se proporcionó un mensaje</p>';
    }
    ?>
</body>
</html>

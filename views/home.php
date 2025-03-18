<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Home - Life Medic</title>
</head>
<body>
    <h1>¡Hola, <?php echo $_SESSION['usuario']; ?>! Bienvenido a Life Medic.</h1>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>

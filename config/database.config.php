<?php
// config/database.php

$host     = "localhost";
$dbname   = "medic_life"; // Cambia por el nombre real de tu base de datos
$username = "root";            // En XAMPP suele ser 'root'
$password = "root";                // Normalmente vacío

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configuramos PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

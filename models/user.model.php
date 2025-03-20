<?php
require_once '../../config/database.config.php';

function validateUser($email, $password) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password AND status = 'AC'");
        $stmt->execute([
            ':email' => $email,
            ':password' => $password
        ]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    } catch (PDOException $e) {
        // Si hay un error, puedes loguearlo o mostrar mensaje
        error_log("Error al validar usuario: " . $e->getMessage());
        return false;
    }
}
?>

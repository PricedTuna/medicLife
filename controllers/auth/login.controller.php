<?php
session_start();
include '../models/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (validarUsuario($email, $password)) {
        $_SESSION['usuario'] = $email;
        header('Location: ../public/home.php');
        exit();
    } else {
        header('Location: ../public/index.php?error=1');
        exit();
    }
} else {
    header('Location: ../public/index.php');
    exit();
}

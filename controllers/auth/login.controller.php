<?php
session_start();
include '../../models/user.model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (validateUser($email, $password)) {
        $_SESSION['usuario'] = $email;
        header('Location: ../../views/dashboard/dashboard.view.php');
        exit();
    } else {
        header('Location: ../../index.php?error=1');
        exit();
    }
} else {
    header('Location: ../../index.php');
    exit();
}

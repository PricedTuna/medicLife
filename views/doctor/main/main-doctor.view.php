<?php
require $_SERVER['DOCUMENT_ROOT'] . '/medicLife/config/database.config.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/medicLife/views/components/sidebar.styles.css">
    <script src="/medicLife/views/components/sidebar.app.js" defer></script>
    <script src="/medicLife/views/doctor/list/views-handler.js" defer></script>
    <link rel="stylesheet" href="/medicLife/views/doctor/main/main-doctor.styles.css">
    <link rel="stylesheet" href="/medicLife/views/doctor/list/list-doctors.styles.css">
    <link rel="stylesheet" href="/medicLife/views/doctor/register/register-doctor.styles.css">
    <title>Gestión de Médicos</title>
</head>

<body style="display: flex;">

    <?php
    $sidebarPath = $_SERVER['DOCUMENT_ROOT'] . '/medicLife/views/components/sidebar.php';
    if (file_exists($sidebarPath)) {
        include $sidebarPath;
    } else {
        echo "<p style='color: red;'>Error: No se encontró el archivo sidebar.php en '$sidebarPath'</p>";
    }
    ?>

    <!-- Contenido principal -->
    <main class="content">
    <?php
$headerPath = $_SERVER['DOCUMENT_ROOT'] . '/medicLife/views/doctor/main/header-doctor.view.php';
if (file_exists($headerPath)) {
    include $headerPath;
} else {
    echo "<p style='color: red;'>Error: No se encontró el archivo header-doctor.view.php en '$headerPath'</p>";
}
?>
        <div id="dynamic-content">

            <?php include 'list-doctors.view.php'; ?>
        </div>
    </main>

</body>

</html>
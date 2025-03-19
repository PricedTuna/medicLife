<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard </title>
    <link rel="stylesheet" href="./dashboard.styles.css">
    <script src="./dashboard.app.js" defer></script>
    <link rel="stylesheet" href="../components/sidebar.styles.css">
    <script src="../components/sidebar.app.js" defer></script>

</head>

<body>

<?php include '../components/sidebar.php'; ?>
    <main>
        <div class="main-content">
            <header>
                <h1>Dashboard</h1>
                <div class="search-container">
                    <input type="text" placeholder="Search type of keywords">
                </div>
            </header>
            <section class="stats">
                <div class="card">
                    <h3></h3>
                    <p></p>
                </div>
                <div class="card">
                    <h3></h3>
                    <p></p>
                </div>
                <div class="card">
                    <h3></h3>
                    <p></p>
                </div>
            </section>
            <section class="chart">
                <h3>Visitas de Pacientes</h3>
                <div class="chart-placeholder"></div>
            </section>
            <section class="patient-data">
                <h3>Calendario</h3>
            </section>
        </div>
        <div class="doctor-info">
            <div class="doctor-card">
                <div class="doctor-photo">Foto DR</div>
                <h3>Nombre del doctor</h3>
                <div class="doctor-stats">
                    <p>Citas <br> <strong>5</strong></p>
                    <p>Pacientes <br> <strong>40</strong></p>
                </div>
            </div>
            <section class="upcoming-appointments">
                <h3>Siguientes Citas</h3>
                <p><strong>15 /marzo/2025</strong></p>
                <p>08:30 am - 10:30 am <br><strong>Cita</strong> <br> Paciente</p>
                <p>08:30 am - 10:30 am <br><strong>Cita</strong> <br> Paciente</p>
            </section>
            <section class="upcoming-appointments-month">
                <h3>Citas del mes </h3>
                <p><strong>15 /marzo/2025</strong></p>
                <p>08:30 am - 10:30 am <br><strong>Cita</strong> <br> Paciente</p>
                <p>08:30 am - 10:30 am <br><strong>Cita</strong> <br> Paciente</p>
            </section>
        </div>
    </main>
</body>

</html>
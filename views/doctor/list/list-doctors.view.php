<?php
// obtener_doctores.php
require $_SERVER['DOCUMENT_ROOT'] . '/medicLife/config/database.config.php';

try {
    $stmt = $pdo->query("SELECT * FROM doctors");
    $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener doctores: " . $e->getMessage());
}
?>

    <link rel="stylesheet" href="./list-doctors.styles.css">
 <!-- Tabla -->
 <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>CURP</th>
                            <th>RFC</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Género</th>
                            <th>Fecha de nacimiento</th>
                            <th>Estado</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                            <th>Código Postal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($doctors) > 0): ?>
                        <?php foreach ($doctors as $doctor): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($doctor['id']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['names']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['last_name'] . ' ' . $doctor['last_name2']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['CURP']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['RFC']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['phone']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['email']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['gender']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['birth_date']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['id_state']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['id_municipality']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['id_locality']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['CP']); ?></td>
                            <td><button class="delete-btn">🗑️</button></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="14">No hay doctores registrados.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

<?php
require '../../../config/database.config.php';

try {
    $stmt = $pdo->query("SELECT id_state, id, name FROM municipalities");
    $municipalities = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    $stmt = $pdo->query("SELECT id, name FROM states");
    $states = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $stmt = $pdo->query("SELECT id_state, id_municipality, id, name FROM localities");
    $localities = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    die("Error al obtener tablas: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./register-doctor.styles.css">
    <script src="./register-doctor.app.js" defer></script>
    <title>Registro de Doctores</title>
</head>

<body>
    <div class="center-container">
        <div class="form-container">
            <div class="steps">
                <div class="step step-active" data-step="1">Paso 1</div>
                <div class="step" data-step="2">Paso 2</div>
                <div class="step" data-step="3">Paso 3</div>
            </div>

            <h2>Registro de Doctores</h2>

            <form id="doctor-form">
                <!-- Paso 1 -->
                <div class="form-step" id="step-1">
                    <div class="form-group">
                        <label for="lastName">Apellido Paterno</label>
                        <input type="text" id="lastName" name="fatherLastName" required>
                    </div>
                    <div class="form-group">
                        <label for="motherLastName">Apellido Materno</label>
                        <input type="text" id="motherLastName" name="motherLastName" required>
                    </div>
                    <div class="form-group">
                        <label for="firstName">Nombre</label>
                        <input type="text" id="firstName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Número Telefónico</label>
                        <input type="number" id="phoneNumber" name="phoneNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Sexo</label>
                        <select id="gender" name="gender" required>
                            <option value="">Seleccione...</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthDate">Fecha de Nacimiento</label>
                        <input type="date" id="birthDate" name="birthDate" required>
                    </div>
                    <button type="button" class="next-btn" onclick="nextStep(2)">Siguiente</button>
                </div>

                <!-- Paso 2 -->
                <div class="form-step" id="step-2" style="display: none;">
                    <div class="form-group">
                        <label for="street">Calle</label>
                        <input type="text" id="street" name="street" required>
                    </div>
                    <div class="form-group">
                        <label for="neighborhood">Colonia</label>
                        <input type="text" id="neighborhood" name="neighborhood" required>
                    </div>
                    <div class="form-group">
                        <label for="postalCode">Código Postal</label>
                        <input type="number" id="postalCode" name="postalCode" required>
                    </div>
                    <div class="form-group">
                        <label for="extNumber">Número Exterior</label>
                        <input type="text" id="extNumber" name="extNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="intNumber">Número Interior (Opcional)</label>
                        <input type="text" id="intNumber" name="intNumber">
                    </div>
                    <div class="form-group">
                        <label for="state">Estado</label>
                        <select name="state" id="state">
                            <option value="">Seleccione...</option>
                            <?php foreach ($states as $state): ?>
                                <option value="<?php echo state.id ?>"><?php echo state.name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="municipality">Municipio</label>
                        <select name="municipality" id="municipality">
                            <option value="">Seleccione...</option>
                            <?php foreach ($municipalities as $municipy): ?>
                                <option value="<?php echo municipy.id_state+municipy.id ?>"><?php echo municipy.name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="locality">Localidad</label>
                        <select name="locality" id="locality">
                            <option value="">Seleccione...</option>
                            <?php foreach ($localities as $locality): ?>
                                <option value="<?php echo locality.id_state+locality.id_municipality+locality.id ?>"><?php echo locality.name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="button" class="prev-btn" onclick="prevStep(1)">Atrás</button>
                    <button type="button" class="next-btn" onclick="nextStep(3)">Siguiente</button>
                </div>


                <!-- Paso 3 -->
                <div class="form-step" id="step-3" style="display: none;">
                    <div class="form-group">
                        <label for="curp">CURP</label>
                        <input type="text" id="curp" name="curp" required>
                    </div>
                    <div class="form-group">
                        <label for="rfc">RFC</label>
                        <input type="text" id="rfc" name="rfc" required>
                    </div>
                    <div class="form-group">
                        <label for="affiliationNumber">Número de Afiliación</label>
                        <input type="text" id="affiliationNumber" name="affiliationNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="professionalLicense">Cédula Profesional</label>
                        <input type="text" id="professionalLicense" name="professionalLicense" required>
                    </div>
                    <div class="form-group">
                        <label for="specialty">Especialidad</label>
                        <input type="text" id="specialty" name="specialty" required>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="file-label">Subir Foto</label>
                        <input type="file" id="photo" name="photo" accept="image/*" required>
                    </div>

                    <button type="button" class="prev-btn" onclick="prevStep(2)">Atrás</button>
                    <button type="submit" class="submit-btn">Registrar</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>
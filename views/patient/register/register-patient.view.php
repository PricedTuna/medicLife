<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./register-patient.styles.css">
    <link rel="stylesheet" href="../../components/sidebar.styles.css">
    <script src="../../components/sidebar.app.js" defer></script>

    <script src="./register-patient.app.js" defer></script>
    <title>Registro de Paciente</title>
</head>
<body>

    <div class="center-container">
    <?php include '../../components/sidebar.php'; ?> <!-- Incluye el sidebar -->
        <div class="form-container">
            <h2>Registro de Paciente</h2>

            <div class="steps">
                <div class="step step-active">Paso 1</div>
                <div class="step">Paso 2</div>
                <div class="step">Paso 3</div>
                <div class="step">Paso 4</div>
            </div>

            <form id="patient-form">
    <!-- Paso 1: Datos Personales -->
    <div class="form-step" id="step-1">
        <div class="form-group">
            <label for="lastName">Apellido Paterno</label>
            <input type="text" id="lastName" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="motherLastName">Apellido Materno</label>
            <input type="text" id="motherLastName" name="last_name2"required>
        </div>
        <div class="form-group">
            <label for="firstName">Nombre</label>
            <input type="text" id="firstName" name="names" required>
        </div>
        <div class="form-group">
            <label for="phoneNumber">Número Telefónico</label>
            <input type="number" id="phoneNumber" name="phone" required>
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
            <input type="date" id="birthDate" name="birth_date" required>
        </div>
        <div class="form-group">
            <label for="curp">CURP</label>
            <input type="text" id="curp" name="CURP" required >
        </div>
        <div class="form-group">
            <label for="rfc">RFC</label>
            <input type="text" id="rfc" name="RFC"required>
        </div>
        <div class="form-group">
            <label for="affiliationNumber">Número de Afiliación</label>
            <input type="text" id="affiliationNumber" name="insurance_number" required>
        </div>
        <button type="button" class="next-btn" onclick="nextStep(2)">Siguiente</button>
    </div>

    <!-- Paso 2: Dirección -->
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
            <input type="number" id="postalCode" name="CP" required>
        </div>
        <div class="form-group">
            <label for="extNumber">Número Exterior</label>
            <input type="text" id="extNumber" name="external_number"required>
        </div>
        <div class="form-group">
            <label for="country">País</label>
            <input type="text" id="country" name="" required>
        </div>
        <div class="form-group">
            <label for="state">Estado</label>
            <input type="text" id="state" required>
        </div>
        <div class="form-group">
            <label for="municipality">Municipio</label>
            <input type="text" id="municipality" required>
        </div>
        <div class="form-group">
            <label for="locality">Localidad</label>
            <input type="text" id="locality" required>
        </div>
        <button type="button" class="prev-btn" onclick="prevStep(1)">Atrás</button>
        <button type="button" class="next-btn" onclick="nextStep(3)">Siguiente</button>
    </div>

    <!-- Paso 3: Información Adicional -->
    <div class="form-step" id="step-3" style="display: none;">
        <div class="form-group">
            <label for="bloodType">Tipo de Sangre</label>
            <select id="bloodType" required>
                <option value="">Seleccione...</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>
        <div class="form-group">
            <label for="maritalStatus">Estado Civil</label>
            <select id="maritalStatus" required>
                <option value="">Seleccione...</option>
                <option value="Soltero/a">Soltero/a</option>
                <option value="Casado/a">Casado/a</option>
                <option value="Divorciado/a">Divorciado/a</option>
                <option value="Viudo/a">Viudo/a</option>
            </select>
        </div>
        <div class="form-group">
            <label for="weight">Peso (kg)</label>
            <input type="number" id="weight" required>
        </div>
        <div class="form-group">
            <label for="height">Altura (cm)</label>
            <input type="number" id="height" required>
        </div>
        <div class="form-group">
            <label for="ethnicGroup">Grupo Étnico</label>
            <input type="text" id="ethnicGroup">
        </div>
        <div class="form-group">
            <label for="religion">Religión</label>
            <input type="text" id="religion">
        </div>
        <button type="button" class="prev-btn" onclick="prevStep(2)">Atrás</button>
        <button type="button" class="next-btn" onclick="nextStep(4)">Siguiente</button>
    </div>

    <!-- Paso 4: Contacto de Emergencia -->
    <div class="form-step" id="step-4" style="display: none;">
        <div class="form-group">
            <label for="contactFirstName">Nombre del Contacto</label>
            <input type="text" id="contactFirstName" required>
        </div>
        <div class="form-group">
            <label for="contactLastName">Apellido Paterno</label>
            <input type="text" id="contactLastName" required>
        </div>
        <div class="form-group">
            <label for="contactMotherLastName">Apellido Materno</label>
            <input type="text" id="contactMotherLastName" required>
        </div>
        <div class="form-group">
            <label for="contactPhone">Número Telefónico</label>
            <input type="number" id="contactPhone" required>
        </div>
        <div class="form-group">
            <label for="contactRelation">Relación con el Paciente</label>
            <input type="text" id="contactRelation" required>
        </div>
        <button type="button" class="prev-btn" onclick="prevStep(3)">Atrás</button>
        <button type="submit" class="submit-btn">Registrar</button>
    </div>
</form>

        </div>
    </div>
</body>
</html>
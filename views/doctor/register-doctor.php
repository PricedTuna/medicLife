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
                        <input type="text" id="lastName" required>
                    </div>
                    <div class="form-group">
                        <label for="motherLastName">Apellido Materno</label>
                        <input type="text" id="motherLastName" required>
                    </div>
                    <div class="form-group">
                        <label for="firstName">Nombre</label>
                        <input type="text" id="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Número Telefónico</label>
                        <input type="number" id="phoneNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Sexo</label>
                        <select id="gender" required>
                            <option value="">Seleccione...</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthDate">Fecha de Nacimiento</label>
                        <input type="date" id="birthDate" required>
                    </div>
                    <button type="button" class="next-btn" onclick="nextStep(2)">Siguiente</button>
                </div>

                <!-- Paso 2 -->
                <div class="form-step" id="step-2" style="display: none;">
                    <div class="form-group">
                        <label for="street">Calle</label>
                        <input type="text" id="street" required>
                    </div>
                    <div class="form-group">
                        <label for="neighborhood">Colonia</label>
                        <input type="text" id="neighborhood" required>
                    </div>
                    <div class="form-group">
                        <label for="postalCode">Código Postal</label>
                        <input type="number" id="postalCode" required>
                    </div>
                    <div class="form-group">
                        <label for="extNumber">Número Exterior</label>
                        <input type="text" id="extNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="intNumber">Número Interior (Opcional)</label>
                        <input type="text" id="intNumber">
                    </div>
                    <div class="form-group">
                        <label for="country">País</label>
                        <input type="text" id="country" required>
                    </div>
                    <div class="form-group">
                        <label for="state">Estado</label>
                        <input type="text" id="state" required>
                    </div>
                    <div class="form-group">
                        <label for="municipality">Municipio</label>
                        <input type="text" id="municipality" required>
                    </div>
                    <button type="button" class="prev-btn" onclick="prevStep(1)">Atrás</button>
                    <button type="button" class="next-btn" onclick="nextStep(3)">Siguiente</button>
                </div>


                <!-- Paso 3 -->
                <div class="form-step" id="step-3" style="display: none;">
                    <div class="form-group">
                        <label for="curp">CURP</label>
                        <input type="text" id="curp" required>
                    </div>
                    <div class="form-group">
                        <label for="rfc">RFC</label>
                        <input type="text" id="rfc" required>
                    </div>
                    <div class="form-group">
                        <label for="affiliationNumber">Número de Afiliación</label>
                        <input type="text" id="affiliationNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="professionalLicense">Cédula Profesional</label>
                        <input type="text" id="professionalLicense" required>
                    </div>
                    <div class="form-group">
                        <label for="specialty">Especialidad</label>
                        <input type="text" id="specialty" required>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="file-label">Subir Foto</label>
                        <input type="file" id="photo" accept="image/*" required>
                    </div>

                    <button type="button" class="prev-btn" onclick="prevStep(2)">Atrás</button>
                    <button type="submit" class="submit-btn">Registrar</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./register-patient.styles.css">
  <title>Register patient</title>
</head>
<body>

  <div class="center-container">
    <div class="nav"><img src="./assets/menu-icon.png" height="10px" width="10px" /></div>
    <div class="form-container">
      <div class="steps">
          <div class="step step-completed">Paso 1</div>
          <div class="step">Paso 2</div>
          <div class="step">Paso 3</div>
      </div>
      <h2>Registro de Pacientes</h2>
      <form action="#" method="POST">
          <div class="form-group">
              <label for="fullName">Nombre completo</label>
              <input type="text" id="fullName" name="fullName" placeholder="Pito Perez Peraza" required>
          </div>
          <div class="form-group">
              <label for="age">Edad</label>
              <input type="number" id="age" name="age" min="0" max="120" placeholder="30" required>
          </div>
          <div class="form-group">
              <label for="gender">Séxo</label>
              <select id="gender" name="gender" required>
                  <option value="">Seleccione una opción</option>
                  <option value="male">Masculino</option>
                  <option value="female">Femenino</option>
                  <option value="other">Otro</option>
              </select>
          </div>
          <div class="form-group">
              <label for="phone">Teléfono</label>
              <input type="tel" id="phone" name="phone" placeholder="123-456-7890" required>
          </div>
          <div class="form-group">
              <label for="email">Correo electrónico</label>
              <input type="email" id="email" name="email" placeholder="correo@ejemplo.com">
          </div>
          <!--<div class="form-group">
              <label for="reason">Motivo de consulta</label>
              <input type="text" id="reason" name="reason" placeholder="Dolor de cabeza, revisión general..." required>
          </div>
        -->
          <button type="submit" class="submit-btn">Registrar</button>
      </form>
  </div>
  </div>
  
</body>
</html>

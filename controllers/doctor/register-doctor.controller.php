<?php

require '../../config/database.config.php';

function validarCampo($valor, $longitudMax, $campoNombre) {
  if (empty($valor)) {
    throw new Exception("El campo $campoNombre es obligatorio.");
  }
  if (strlen($valor) > $longitudMax) {
    throw new Exception("El campo $campoNombre supera la longitud máxima de $longitudMax caracteres.");
  }
}

function validarRegex($valor, $regex, $campoNombre) {
  if (!preg_match($regex, $valor)) {
    throw new Exception("El campo $campoNombre no tiene el formato correcto.");
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // DATOS DEL MEDICO:
  $names = $_POST['name'];
  $last_name = $_POST['fatherLastName'];
  $last_name2 = $_POST['motherLastName'];
  $id_state = $_POST['state'];
  $id_municipality = $_POST['municipality'];
  $id_locality = $_POST['locality'];
  $CP = $_POST['postalCode'];
  $street = $_POST['street'];
  $external_number = $_POST['extNumber'];
  $internal_number = $_POST['intNumber'];
  $neighborhood = $_POST['neighborhood'];
  $insurance_number = $_POST['affiliationNumber'];
  $professional_id = $_POST['professionalLicense'];
  $birth_date = $_POST['birthDate'];
  $CURP = $_POST['curp'];
  $RFC = $_POST['rfc'];
  $phone = $_POST['phoneNumber'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];

  // DATOS DE ESPECIALIDAD:
  $specialty = $_POST['specialty'];

  try {
    validarCampo($names, 40, 'nombre');
    validarCampo($last_name, 40, 'apellido paterno');
    validarCampo($last_name2, 40, 'apellido materno');
    validarRegex($CP, '/^\d{5}$/', 'código postal');
    validarCampo($street, 50, 'calle');
    validarCampo($external_number, 8, 'número exterior');
    validarCampo($internal_number, 8, 'número interior');
    validarCampo($neighborhood, 50, 'colonia');
    validarCampo($insurance_number, 20, 'número de afiliación');
    validarCampo($professional_id, 15, 'cédula profesional');
    validarRegex($birth_date, '/^\d{4}-\d{2}-\d{2}$/', 'fecha de nacimiento (YYYY-MM-DD)');
    validarCampo($CURP, 18, 'CURP');
    validarCampo($RFC, 13, 'RFC');
    validarRegex($phone, '/^\d{10}$/', 'teléfono');
    validarRegex($email, '/^[\w\.\-]+@[\w\.\-]+\.\w{2,4}$/', 'correo electrónico');
    validarCampo($gender, 2, 'género');
    
    // Si todas pasan, se hace el INSERT.
  } catch (Exception $e) {
    header('Location: ../../views/doctor/register/register-doctor.view.php?error=' . urlencode($e->getMessage()));
    exit;
  }

  try {
    $stmt = $pdo->prepare("INSERT INTO doctors (
      names, last_name, last_name2, id_state, id_municipality,
      id_locality, CP, street, external_number, internal_number,
      neighborhood, insurance_number, professional_id, birth_date, CURP, RFC, phone,
      gender, email, photo, status
    ) VALUES (
      :names, :last_name, :last_name2, :id_state, :id_municipality,
      :id_locality, :CP, :street, :external_number, :internal_number,
      :neighborhood, :insurance_number, :professional_id, :birth_date, :CURP, :RFC, :phone,
      :gender, :email, :photo, :status
    )");
    
    $stmt->execute([
      ':names' => $names,
      ':last_name' => $last_name,
      ':last_name2' => $last_name2,
      ':id_state' => $id_state,
      ':id_municipality' => $id_municipality,
      ':id_locality' => $id_locality,
      ':CP' => $CP,
      ':street' => $street,
      ':external_number' => $external_number,
      ':internal_number' => $internal_number,
      ':neighborhood' => $neighborhood,
      ':insurance_number' => $insurance_number,
      ':professional_id' => $professional_id,
      ':birth_date' => $birth_date,
      ':CURP' => $CURP,
      ':RFC' => $RFC,
      ':phone' => $phone,
      ':gender' => $gender,
      ':email' => $email,
      ':photo' => 'FotoAqui',
      ':status' => 'A'
    ]);
    
    header('Location: ../../views/dashboard/dashboard.view.php?success=' . urlencode("doctor creado"));
  } catch (PDOException $e) {
    echo "Error al insertar: " . $e->getMessage();
  }


}
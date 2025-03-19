<?php

require '../../../config/database.config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // DATOS DEL MEDICO:
  $names = $_POST['name'];
  $last_name = $_POST['fatherLastName'];
  $last_name2 = $_POST['motherLastName'];
  $id_state = $_POST['state'];
  $id_municipality = $_POST['municipality'];
  // Falta locality id_locality
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
  $gender = $_POST['gender'];
  $email = $_POST['email'];

  // DATOS DE ESPECIALIDAD:
  $specialty = $_POST['specialty'];

  // DATOS DE LA FOTO
  $carpetaDestino = "uploads/";
  $photo = basename($_FILES['photo']['name']);
  $rutaCompleta = $carpetaDestino . $nombreArchivo;

  try {
    $stmt = $pdo->prepare("INSERT INTO doctor (
    names, last_name, last_name2, id_state, id_municipality,
    id_locality, CP, street, external_number, internal_number,
    neighborhood, insurance_number, birth_date, CURP, RFC, TEL,
    gender, email, photo
    ) VALUES (
    :names, :last_name, :last_name2, :id_state, :id_municipality,
    :id_locality, :CP, :street, :external_number, :internal_number,
    :neighborhood, :insurance_number, :birth_date, :CURP, :RFC, :TEL,
    :gender, :email, :photo)");

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
      ':TEL' => $TEL,
      ':gender' => $gender,
      ':photo' => $photo
    ]);
    
  } catch (PDOException $e) {
    echo "Error al insertar: " . $e->getMessage();
  }


}
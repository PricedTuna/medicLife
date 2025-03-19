<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $names = $_POST['names'];
  $last_name = $_POST['last_name'];
  $last_name2 = $_POST['last_name2'];
  $id_state = $_POST['id_state'];
  $id_municipality = $_POST['id_municipality'];
  $id_locality = $_POST['id_locality'];
  $CP = $_POST['CP'];
  $street = $_POST['street'];
  $external_number = $_POST['external_number'];
  $internal_number = $_POST['internal_number'];
  $neighborhood = $_POST['neighborhood'];
  $insurance_number = $_POST['insurance_number'];
  $birth_date = $_POST['birth_date'];
  $CURP = $_POST['CURP'];
  $RFC = $_POST['RFC'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];


  try {
    $stmt = $pdo->prepare("INSERT INTO doctor (
    names,
    last_name,
    last_name2,
    id_state,
    id_municipality,
    id_locality,
    CP,
    street,
    external_number,
    internal_number,
    neighborhood,
    insurance_number,
    birth_date,
    CURP,
    RFC,
    phone,
    email,
    gender
    ) VALUES (
    :names,
    :last_name,
    :last_name2,
    :id_state,
    :id_municipality,
    :id_locality,
    :CP,
    :street,
    :external_number,
    :internal_number,
    :neighborhood,
    :insurance_number,
    :birth_date,
    :CURP,
    :RFC,
    :phone,
    :email,
    :gender
    )");

    $stmt->execute([
      ':names,' => $names,
      ':last_name,' => $last_name,
      ':last_name2,' => $last_name2,
      ':id_state,' => $id_state,
      ':id_municipality,' => $id_municipality,
      ':id_locality,' => $id_locality,
      ':CP,' => $CP,
      ':street,' => $street,
      ':external_number,' => $external_number,
      ':internal_number,' => $internal_number,
      ':neighborhood,' => $neighborhood,
      ':insurance_number,' => $insurance_number,
      ':birth_date,' => $birth_date,
      ':CURP,' => $CURP,
      ':RFC,' => $RFC,
      ':phone,' => $phone,
      ':email,' => $email,
      ':gender' => $gender
    ]);
  } catch (PDOException $e) {
    echo "Error al insertar: " . $e->getMessage();
  }

}
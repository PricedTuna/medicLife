<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Conexión a la base de datos (asegúrate de tener $pdo configurado)
    require '../../config/database.config.php';

    // Función para validar longitud
    function validarLongitud($campo, $valor, $max) {
        if (strlen($valor) > $max) {
            throw new Exception("El campo $campo excede la longitud máxima de $max caracteres.");
        }
    }

    try {

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
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $blood_type = $_POST['blood_type'];
        $id_emergency_contact = $_POST['id_emergency_contact'];
        $marital_status = $_POST['marital_status'];
        $ethnic_group = $_POST['ethnic_group'];
        $religion = $_POST['religion'];

        $names
        validarLongitud('names', $names, 40);

        $last_name
        validarLongitud('last_name', $last_name, 40);

        $last_name2
        if ($last_name2) validarLongitud('last_name2', $last_name2, 40);

        $id_state = (int)$_POST['id_state'];
        $id_municipality = (int)$_POST['id_municipality'];
        $id_locality = (int)$_POST['id_locality'];

        $CP
        if (strlen($CP) !== 5) throw new Exception("El código postal debe ser de 5 caracteres.");

        $street
        validarLongitud('street', $street, 50);

        $external_number
        validarLongitud('external_number', $external_number, 8);

        $internal_number
        if ($internal_number) validarLongitud('internal_number', $internal_number, 8);

        $neighborhood
        validarLongitud('neighborhood', $neighborhood, 50);

        $insurance_number
        validarLongitud('insurance_number', $insurance_number, 20);

        $birth_date

        $CURP
        if ($CURP && strlen($CURP) !== 18) throw new Exception("La CURP debe tener 18 caracteres.");

        $RFC
        if ($RFC && strlen($RFC) !== 13) throw new Exception("El RFC debe tener 13 caracteres.");

        $phone
        if (strlen($phone) !== 10) throw new Exception("El teléfono debe tener 10 dígitos.");

        $email
        validarLongitud('email', $email, 50);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception("El correo electrónico no es válido.");

        $gender
        if (strlen($gender) > 2) throw new Exception("El género debe ser máximo de 2 caracteres.");

        $status = 'A'; // Puedes establecer un status por defecto

        $stmt = $pdo->prepare("INSERT INTO patients (
            names, last_name, last_name2, id_state, id_municipality, id_locality, CP, street, external_number, internal_number, neighborhood, insurance_number, birth_date, CURP, RFC, phone, email, gender, weight, height, blood_type, id_emergency_contact, marital_status, ethnic_group, religion
        ) VALUES (
            :names, :last_name, :last_name2, :id_state, :id_municipality, :id_locality, :CP, :street, :external_number, :internal_number, :neighborhood, :insurance_number, :birth_date, :CURP, :RFC, :phone, :email, :gender, :weight, :height, :blood_type, :id_emergency_contact, :marital_status, :ethnic_group, :religion
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
            ':birth_date' => $birth_date,
            ':CURP' => $CURP,
            ':RFC' => $RFC,
            ':phone' => $phone,
            ':email' => $email,
            ':gender' => $gender,
            ':weight' => $weight,
            ':height' => $height,
            ':blood_type' => $blood_type,
            ':id_emergency_contact' => $id_emergency_contact,
            ':marital_status' => $marital_status,
            ':ethnic_group' => $ethnic_group,
            ':religion' => $religion,
        ]);

        echo "Paciente insertado correctamente.";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
}
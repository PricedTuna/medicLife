<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Conexión a la base de datos (asegúrate de tener $pdo configurado)
    require 'conexion.php';

    // Función para validar longitud
    function validarLongitud($campo, $valor, $max) {
        if (strlen($valor) > $max) {
            throw new Exception("El campo $campo excede la longitud máxima de $max caracteres.");
        }
    }

    try {
        $names = $_POST['names'];
        validarLongitud('names', $names, 40);

        $last_name = $_POST['last_name'];
        validarLongitud('last_name', $last_name, 40);

        $last_name2 = $_POST['last_name2'] ?? null;
        if ($last_name2) validarLongitud('last_name2', $last_name2, 40);

        $id_state = (int)$_POST['id_state'];
        $id_municipality = (int)$_POST['id_municipality'];
        $id_locality = (int)$_POST['id_locality'];

        $CP = $_POST['CP'];
        if (strlen($CP) !== 5) throw new Exception("El código postal debe ser de 5 caracteres.");

        $street = $_POST['street'];
        validarLongitud('street', $street, 50);

        $external_number = $_POST['external_number'];
        validarLongitud('external_number', $external_number, 8);

        $internal_number = $_POST['internal_number'] ?? null;
        if ($internal_number) validarLongitud('internal_number', $internal_number, 8);

        $neighborhood = $_POST['neighborhood'];
        validarLongitud('neighborhood', $neighborhood, 50);

        $insurance_number = $_POST['insurance_number'];
        validarLongitud('insurance_number', $insurance_number, 20);

        $birth_date = $_POST['birth_date']; // puedes validar formato fecha si quieres con regex

        $CURP = $_POST['CURP'] ?? null;
        if ($CURP && strlen($CURP) !== 18) throw new Exception("La CURP debe tener 18 caracteres.");

        $RFC = $_POST['RFC'] ?? null;
        if ($RFC && strlen($RFC) !== 13) throw new Exception("El RFC debe tener 13 caracteres.");

        $phone = $_POST['phone'];
        if (strlen($phone) !== 10) throw new Exception("El teléfono debe tener 10 dígitos.");

        $email = $_POST['email'];
        validarLongitud('email', $email, 50);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception("El correo electrónico no es válido.");

        $gender = $_POST['gender'];
        if (strlen($gender) > 2) throw new Exception("El género debe ser máximo de 2 caracteres.");

        $status = 'A'; // Puedes establecer un status por defecto

        $stmt = $pdo->prepare("INSERT INTO patients (
            names, last_name, last_name2, id_state, id_municipality, id_locality, CP, street, external_number, internal_number, neighborhood, insurance_number, birth_date, CURP, RFC, phone, email, gender, status
        ) VALUES (
            :names, :last_name, :last_name2, :id_state, :id_municipality, :id_locality, :CP, :street, :external_number, :internal_number, :neighborhood, :insurance_number, :birth_date, :CURP, :RFC, :phone, :email, :gender, :status
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
            ':status' => $status
        ]);

        echo "Paciente insertado correctamente.";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
}

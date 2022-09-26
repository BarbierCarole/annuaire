<?php

$nom = htmlentities(strip_tags($_POST["nom"]));
$prenom = htmlentities(strip_tags($_POST["prenom"]));
$telephone = htmlentities(strip_tags($_POST["telephone"]));
$profession = htmlentities(strip_tags($_POST["profession"]));
$ville = htmlentities(strip_tags($_POST["ville"]));
$codepostal = htmlentities(strip_tags($_POST["codepostal"]));
$adresse = htmlentities(strip_tags($_POST["adresse"]));
$date_de_naissance = htmlentities(strip_tags($_POST["date_de_naissance"]));
$sexe = htmlentities(strip_tags($_POST["sexe"]));
$description = htmlentities(strip_tags($_POST["description"]));
$email = htmlentities(strip_tags($_POST["email"]));

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


// verification presence nom et tel obligatoire
if (empty($nom) || empty($telephone) || empty($email)){
    echo ('Afin de vous recontacter, nous avons besoin de vos nom, numéro de téléphone et email.');
    return;
}

// Verification format telephone
$regexPhone = '@^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$@';
if (!(preg_match($regexPhone, $telephone))) {
    echo 'Votre numéro de telephone est invalide !';
    return;
}
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

// verification format date de naissance
if (!empty($date_de_naissance) && (!(preg_match('@^\\d{4}-\\d{2}-\\d{2}$@', $date_de_naissance)))) {
    echo 'Attention, saisie invalide de la date de naissance.';
    return;
}

if ((strlen($nom) >= 40) || (strlen($nom) >= 40) || (strlen($prenom) >= 40) || (strlen($profession) >= 40) || (strlen($ville) >= 40)|| (strlen($adresse) >= 100))
{
    echo 'Attention, vos renseignements sont trop longs.';
    return;
}

require_once('config.php');

// Ecriture de la requete
$sqlQuery = 'INSERT INTO annuaire(nom, prenom, telephone, profession, ville, codepostal,adresse,date_de_naissance, sexe, description, email) VALUES (:nom, :prenom, :telephone, :profession, :ville, :codepostal, :adresse, :date_de_naissance, :sexe, :description, :email)';

// Préparation
$insertUser = $mysqlClient->prepare($sqlQuery);

//Insertion dans la base de données
$insertUser->execute([
    'nom' => $nom,
    'prenom' => $prenom,
    'telephone' => $telephone,
    'profession' => $profession,
    'ville' => $ville,
    'codepostal' => $codepostal,
    'adresse' => $adresse,
    'date_de_naissance' => $date_de_naissance,
    'sexe' => $sexe,
    'description' => $description,
    'email' => $email
]);



$mysqlClient=null;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulaire de contact</title>
</head>

<body>

    <h1>Récapitulatif des informations fournies dans le formulaire précédent</h1>

    <div class="card">

        <div class="card-body">
            <h5 class="card-title">Rappel de vos informations</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nom : </strong><?php echo $nom ?></li>
                <li class="list-group-item"><strong>Prénom : </strong><?php echo $prenom ?></li>
                <li class="list-group-item"><strong>Téléphone : </strong><?php echo $telephone ?></li>
                <li class="list-group-item"><strong>Email : </strong><?php echo $email ?></li>
                <li class="list-group-item"><strong>Profession : </strong><?php echo $profession ?></li>
                <li class="list-group-item"><strong>Adresse : </strong><?php echo $adresse . '<br>' . $codepostal . ' ' . $ville ?></li>
                <li class="list-group-item"><strong>Date de naissance : </strong><?php echo $date_de_naissance ?></li>
                <li class="list-group-item"><strong>Sexe : </strong>
                    <?php if ($sexe == 'M') {
                        echo 'Homme';
                    } elseif ($sexe == 'F') {
                        echo 'Femme';
                    } else {
                        echo '';
                    }
                    $mf = $sexe = 'M' ? 'Homme' : 'Femme'; ?></li>
                <li class="list-group-item"><strong>Description : </strong><?php echo $description ?></li>
                <ul>
        </div>
    </div>

</body>

</html>
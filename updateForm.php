<?php
$id = htmlentities(strip_tags($_GET['id_annuaire']));

require_once('config.php');

$getAllUsers = $mysqlClient->prepare("SELECT * FROM annuaire WHERE id_annuaire=:id_annuaire");
$getAllUsers->execute([
    'id_annuaire' => $id
]);
$results = $getAllUsers->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour de la fiche utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">


        <h1>Mise à jour de la fiche utilisateur n° <?php echo $id ?>
        
        </h1>
        <form action="displayUpdateForm.php" method="POST" class="mb-4" >
            
        <?php foreach($results as $result): ?>
            <input  class="form-control d-none" id="id_annuaire" name="id_annuaire" value=<?php echo $id ?>>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" maxlength="40" minlength="2" value=<?php echo $result['prenom'] ?>>

            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value=<?php echo $result['nom'] ?> maxlength="40" minlength="2" required='true'>

            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone </label>
                <input type="number"  class="form-control" id="telephone" name="telephone" value=<?php echo $result['telephone'] ?>  required='true'>

            </div>
            <div class="mb-3">
                <label for="profession" class="form-label">Profession</label>
                <input type="text" class="form-control" id="profession" name="profession" value=<?php echo $result['profession'] ?>>

            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" value=<?php echo $result['ville'] ?> maxlength="40">
            </div>
            <div class="mb-3">
                <label for="codepostal" class="form-label">Code Postal</label>
                <input type="number" class="form-control" id="codepostal" name="codepostal"value=<?php echo $result['codepostal'] ?> >

            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" value=<?php echo $result['adresse'] ?> maxlength="100">
            </div>
            <div class="mb-3">
                <label for="date_de_naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value=<?php echo $result['date_de_naissance'] ?> >
            </div>
            <div class="mb-3">
                  <input type="radio" class="btn-check" name="sexe" id="homme" autocomplete="off" <?php if ($result['sexe']=='M'){ echo 'checked';} ?> value="M">
                  <label class="btn btn-outline-primary" for="homme">Homme</label>
                
                  <input type="radio" class="btn-check" name="sexe" id="femme" autocomplete="off" <?php if ($result['sexe']=='F'){ echo 'checked';} ?> value="F">
                  <label class="btn btn-outline-primary" for="femme">Femme</label>

                  <input  style="display:none" type="radio" class="btn-check" name="sexe" id="null" autocomplete="off" <?php if ($result['sexe']=='NULL'){ echo 'checked';} ?> value="NULL"    > 
                  
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea row="3" class="form-control" id="description" name="description" value=<?php echo $result['description'] ?>></textarea>
            </div>
        <?php endforeach ?>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
</body>

</html>
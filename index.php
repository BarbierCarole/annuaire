<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de saisie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">


        <h1>Formulaire de saisie</h1>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" maxlength="40" minlength="2">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" maxlength="40" minlength="2" required='true'>
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone </label>
                <input type="number" class="form-control" id="telephone" name="telephone" required='true'>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="email">@</span>
                    <input type="email" class="form-control"  id="email" name="email" aria-label="email" aria-describedby="email">
                </div>
            </div>
            <div class="mb-3">
                <label for="profession" class="form-label">Profession</label>
                <input type="text" class="form-control" id="profession" name="profession" minlength="0">
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" maxlength="40">
            </div>
            <div class="mb-3">
                <label for="codepostal" class="form-label">Code Postal</label>
                <input type="number" class="form-control" id="codepostal" name="codepostal">
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" maxlength="100">
            </div>
            <div class="mb-3">
                <label for="date_de_naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance">
            </div>
            <div class="mb-3">
                <input type="radio" class="btn-check" name="sexe" id="homme" autocomplete="off" value="M">
                <label class="btn btn-outline-primary" for="homme">Homme</label>

                <input type="radio" class="btn-check" name="sexe" id="femme" autocomplete="off" value="F">
                <label class="btn btn-outline-primary" for="femme">Femme</label>

                <input style="display:none" type="radio" class="btn-check" name="sexe" id="null" autocomplete="off" value="NULL" checked>

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea row="3" class="form-control" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
</body>

</html>
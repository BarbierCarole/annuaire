<?php

require_once('config.php');

$getAllUsers = $mysqlClient->prepare("SELECT * FROM annuaire");
$getAllUsers->execute();
$results = $getAllUsers->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="fr">

<head>
  <title>annuaire</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main class="container">
    <h1>Annuaire des inscrits </h1>
    
    <table class="table">
      <thead>
        <th>N°</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th>Profession</th>
        <th>Ville</th>
        <th>Code Postale</th>
        <th>Adresse</th>
        <th>Date de naissance</th>
        <th>Sexe</th>
        <th>Description</th>
      </thead>
      <tbody>
        <?php

        foreach ($results as $result) : ?>
          <tr>
            <td><?php echo $result['id_annuaire'] ?></td>
            <td><?php echo $result['nom'] ?></td>
            <td><?php echo $result['prenom'] ?></td>
            <td><?php echo $result['telephone'] ?></td>
            <td><?php echo $result['profession'] ?></td>
            <td><?php echo $result['ville'] ?></td>
            <td><?php echo $result['codepostal'] ?></td>
            <td><?php echo $result['adresse'] ?></td>
            <td><?php if(empty($result['date_de_naissance']))
                    { echo '';} 
                    else { echo date('d/m/y',strtotime($result['date_de_naissance']));} 
                ?>
            </td>
            <td><?php echo $result['sexe'] ?></td>
            <td><?php echo $result['description'] ?></td>
            <td><a href="updateForm.php?id_annuaire=<?php echo urlencode($result['id_annuaire']) ?>" class="btn btn-primary">Modifier</a></td>
            <td><a href="delete.php?id_annuaire=<?php echo urlencode($result['id_annuaire']) ?>" class="btn btn-danger">Supprimer</a></td>
            
          </tr>
        <?php endforeach; ?>
        
      </tbody>
    </table>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
</body>

</html>
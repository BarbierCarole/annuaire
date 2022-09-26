<?php
if (empty(htmlentities(strip_tags($_GET['id_annuaire']))))
{
	echo 'Identifiant de suppression invalide.';
    return;
}	

$id = htmlentities(strip_tags($_GET['id_annuaire']));

require_once('config.php');

$getAllUsers = $mysqlClient->prepare("DELETE FROM annuaire WHERE id_annuaire=:id_annuaire");
$getAllUsers->execute([
    'id_annuaire' => $id
]);


header('Location: annuaire.php');
?>

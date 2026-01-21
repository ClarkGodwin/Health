<?php
require '../../db/db_connection.php';

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$centre = $_POST['centre'];
$docteur = $_POST['docteur'];
$phone = $_POST['phone'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];

$conn->query("UPDATE patients SET nom = '$nom', prenom = '$prenom', id_centre_actuel = $centre, id_docteur = '$docteur', adresse = '$adresse', email = '$email', telephone = '$phone' WHERE id_patient = '$id'");

header("Location: index.php");

?>


<?php
require '../../db/db_connection.php';

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$centre = $_POST['centre'];
$specialite = $_POST['specialite'];
$phone = $_POST['phone'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];

$conn->query("UPDATE docteurs SET nom = '$nom', prenom = '$prenom', id_centre = $centre, specialite = '$specialite', adresse = '$adresse', email = '$email', telephone = '$phone' WHERE id_docteur = '$id'");

header("Location: index.php");

?>


<?php
require '../../db/db_connection.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$centre = $_POST['centre'];
$specialite = $_POST['specialite'];
$adresse = $_POST['adresse'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$conn->query("INSERT INTO docteurs(nom, prenom, id_centre, specialite, adresse, telephone, email) VALUES ('$nom', '$prenom', '$centre', '$specialite', '$adresse','$phone','$email')");

header("Location: index.php");

?>


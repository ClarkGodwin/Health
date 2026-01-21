<?php
require '../../db/db_connection.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$centre = $_POST['centre'];
$docteur = $_POST['docteur'];
$adresse = $_POST['adresse'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$conn->query("INSERT INTO patients(nom, prenom, id_centre_actuel, id_docteur, adresse, telephone, email) VALUES ('$nom', '$prenom', '$centre', '$docteur', '$adresse','$phone','$email')");

header("Location: index.php");

?>


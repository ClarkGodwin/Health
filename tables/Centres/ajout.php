<?php
require '../../db/db_connection.php';

$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$conn->query("INSERT INTO centres(nom, adresse, telephone, email) VALUES ('$nom','$adresse','$phone','$email')");

header("Location: index.php");

?>


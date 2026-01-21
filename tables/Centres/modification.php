<?php
require '../../db/db_connection.php';

$id = $_POST['id'];
$nom = $_POST['nom'];
$phone = $_POST['phone'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];

$conn->query("UPDATE centres SET nom = '$nom', adresse = '$adresse', email = '$email', telephone = '$phone' WHERE id_centre = '$id'");

header("Location: index.php");

?>


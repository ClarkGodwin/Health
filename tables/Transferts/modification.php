<?php
require '../../db/db_connection.php';

$id = $_POST['id'];
$centre_source = $_POST['centre_source'];
$centre_destination = $_POST['centre_destination'];
$patient = $_POST['patient'];
$motif = $_POST['motif'];

$conn->query("UPDATE transferts SET id_centre_source = $centre_source, id_centre_destination = $centre_destination, id_patient = '$patient', motif = '$motif' WHERE id_transfert = '$id'");

header("Location: index.php");

?>


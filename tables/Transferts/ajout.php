<?php
require '../../db/db_connection.php';

$centre_source = $_POST['centre_source'];
$centre_destination = $_POST['centre_destination'];
$patient = $_POST['patient'];
$motif = $_POST['motif'];

$conn->query("INSERT INTO transferts(id_centre_source, id_centre_destination, id_patient, motif) VALUES ('$centre_source', '$centre_destination', '$patient', '$motif')");

header("Location: index.php");

?>


<?php
require '../../db/db_connection.php';

$id = $_POST['id'];

$conn->query("DELETE FROM patients WHERE id_patient = '$id'");

header("Location: index.php");

?>


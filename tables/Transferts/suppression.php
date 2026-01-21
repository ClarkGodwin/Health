<?php
require '../../db/db_connection.php';

$id = $_POST['id'];

$conn->query("DELETE FROM transferts WHERE id_transfert = '$id'");

header("Location: index.php");

?>


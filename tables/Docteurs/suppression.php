<?php
require '../../db/db_connection.php';

$id = $_POST['id'];

$conn->query("DELETE FROM docteurs WHERE id_docteur = '$id'");

header("Location: index.php");

?>


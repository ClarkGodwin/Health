<?php
require '../../db/db_connection.php';

$id = $_POST['id'];

$conn->query("DELETE FROM centres WHERE id_centre = '$id'");

header("Location: index.php");

?>


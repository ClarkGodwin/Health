<?php
require __DIR__ . '/../db/db_connection.php';

$tables = [];

$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result) {
 while ($row = $result->fetch_array()) {
  $tableName = $row[0];
  $tables[] = ucfirst($tableName);
 }
}

ob_start();
?>

<style>
header{
 background-color: #f7f7f9;
 padding: 5px 0;
 border-radius: 36px;
 margin-bottom: 10px;
}

li{
 color: red;
 font-size: 30px;
}
</style>

<header>
<ul class="nav justify-content-center">
  <li class="nav-item">
  <a class="nav-link" href="../Home/index.php">Accueil</a>
  </li>
  <?php foreach ($tables as $table){ ?>
  <li class="nav-item">
  <a class="nav-link" href="../<?= $table ?>/index.php">
     <?php
        echo "$table";
     ?>
    </a>
  </li>
  <?php } ?>
 </ul>
</header>

<?php

$content = ob_get_clean();
?>



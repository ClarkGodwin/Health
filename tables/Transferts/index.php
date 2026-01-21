<?php
 require "../../layout/header.php";
 
 $transferts = $conn->query("SELECT * FROM transferts");
 $patients = $conn->query("SELECT * FROM patients");
 $centres = $conn->query("SELECT * FROM centres");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Ma page</title>
 <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="index.css">
 <link rel="stylesheet" href="../../assets/css/index.css">
</head>
<body>
 <?= $content ?>

 <h1>
Les transferts 
</h1>

 <!-- Button trigger modal -->
<button type="button" class="btn btn-info ajout" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
+
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"> Ajout d'un transfert</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="modal-body" action="ajout.php" method="POST">
       <div class="mb-3 row">
        <label for="centre" class="col-sm-2 col-form-label">Centre de départ</label>
        <div class="col-sm-10">
         <select class="form-control" name="centre_source"> 
  	   <?php foreach($centres as $centre) :?>
	    <option value=<?= $centre['id_centre']?> ><?= ucfirst($centre['nom']) ?></option>
  	   <?php endforeach; ?>
         </select>
        </div>
       </div>
       <div class="mb-3 row">
        <label for="centre" class="col-sm-2 col-form-label">Centre de destination</label>
        <div class="col-sm-10">
         <select class="form-control" name="centre_destination"> 
  	   <?php foreach($centres as $centre) :?>
	    <option value=<?= $centre['id_centre']?> ><?= ucfirst($centre['nom']) ?></option>
  	   <?php endforeach; ?>
         </select>
        </div>
       </div>
       <div class="mb-3 row">
        <label for="patient" class="col-sm-2 col-form-label">Patient</label>
        <div class="col-sm-10">
         <select class="form-control" name="patient"> 
  	   <?php foreach($patients as $patient) :?>
	    <option value=<?= $patient['id_patient']?> ><?= ucfirst($patient['nom']) ?></option>
  	   <?php endforeach; ?>
         </select>
        </div>
       </div>
       <div class="mb-3 row">
        <label for="nom" class="col-sm-2 col-form-label">Motif</label>
        <div class="col-sm-10">
         <input type="text" required class="form-control" name="motif">
        </div>
       </div>
	<button type="submit" class="btn btn-info soumettre form-control" >Soumettre</button>
      </form>
    </div>
  </div>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Centre de départ</th>
      <th scope="col">Centre de déstination</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0 ;
 while($transfert = $transferts->fetch_assoc()) :
    $i++ ?>
    <tr>
    <th scope="row"><?= $i ?></th>
    <td><?php foreach($centres as $centre) :
	if($centre['id_centre'] == $transfert['id_centre_source']){
        echo $centre['nom'];
       } endforeach;?></td>
    <td><?php foreach($centres as $centre) :
	if($centre['id_centre'] == $transfert['id_centre_destination']){
        echo $centre['nom'];
       } endforeach;?></td>
    <td>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#details<?=$i?>">Détails</button>

<!-- Modal -->
<div class="modal fade" id="details<?=$i?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	<h1 class="modal-title fs-5" id="staticBackdropLabel">Détails du transfert</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div>
	<p>Centre de départ: <?php foreach($centres as $centre) :
	if($centre['id_centre'] == $transfert['id_centre_source']){
        echo $centre['nom'];
       } endforeach;?> </p>
       </div>
       <div>
	<p>Centre de déstination: <?php foreach($centres as $centre) :
	if($centre['id_centre'] == $transfert['id_centre_destination']){
        echo $centre['nom'];
       } endforeach;?> </p>
       </div>
       <div>
	<p>Patient : <?php foreach($patients as $patient) :
	if($patient['id_patient'] == $transfert['id_patient']){
        echo $patient['nom'];
       } endforeach;?> </p>
       </div>
       <div>
        <p>Motif : <?=$transfert["motif"]?> </p>
       </div>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modifier<?=$i?>">Modifier</button>

<!-- Modal -->
<div class="modal fade" id="modifier<?=$i?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	<h1 class="modal-title fs-5" id="staticBackdropLabel">Modification du transfert</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="modal-body" action="modification.php" method="POST">
       <div class="mb-3 row">
        <label for="centre" class="col-sm-2 col-form-label">Centre de départ</label>
        <div class="col-sm-10">
         <select class="form-control" name="centre_source"> 
  	   <?php foreach($centres as $centre):?>
	    <option value=<?= $centre['id_centre']?> ><?= ucfirst($centre['nom']) ?></option>
  	   <?php endforeach; ?>
         </select>
        </div>
       </div>
       <div class="mb-3 row">
        <label for="centre" class="col-sm-2 col-form-label">Centre de déstination</label>
        <div class="col-sm-10">
         <select class="form-control" name="centre_destination"> 
  	   <?php foreach($centres as $centre):?>
	    <option value=<?= $centre['id_centre']?> ><?= ucfirst($centre['nom']) ?></option>
  	   <?php endforeach; ?>
         </select>
        </div>
       </div>
       <div class="mb-3 row">
        <label for="patient" class="col-sm-2 col-form-label">Patient</label>
        <div class="col-sm-10">
         <select class="form-control" name="patient"> 
  	   <?php foreach($patients as $patient):?>
	    <option value=<?= $patient['id_patient']?> ><?= ucfirst($patient['nom']) ?></option>
  	   <?php endforeach; ?>
         </select>
        </div>
       </div>
       <div class="mb-3 row">
        <label for="nom" class="col-sm-2 col-form-label">Motif</label>
        <div class="col-sm-10">
         <input type="text" required class="form-control" name="motif" value="<?=$transfert["motif"]?>">
        </div>
       </div>
       <input type="hidden" name="id" value="<?=$transfert['id_transfert']?>" >
	<button type="submit" class="btn btn-info soumettre form-control" >Soumettre</button>
      </form>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer<?=$i?>">Supprimer</button>

<!-- Modal -->
<div class="modal fade" id="supprimer<?=$i?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	<h1 class="modal-title fs-5" id="staticBackdropLabel">Suppression du transfert</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="modal-body" action="suppression.php" method="POST">
       <div class="mb-3 row">
        <label for="nom" class="form-control">Êtes-vous sûr de vouloir supprimer cette ligne</label>
        <div class="col-sm-10">
	<input type="hidden" required class="form-control" name="id" value="<?=$transfert["id_transfert"]?>">
        </div>
       </div>
	<button type="submit" class="btn btn-danger form-control" >Supprimer</button>
      </form>
    </div>
  </div>
</div>
    </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
 <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
 require "../../layout/header.php";
 
 $patients = $conn->query("SELECT * FROM patients");
 $docteurs = $conn->query("SELECT * FROM docteurs");
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
Les patients 
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel"> Ajout d'un patient</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="modal-body" action="ajout.php" method="POST">
       <div class="mb-3 row">
        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
         <input type="text" required class="form-control" name="nom">
        </div>
       </div>
       <div class="mb-3 row">
        <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
        <div class="col-sm-10">
         <input type="text" required class="form-control" name="prenom">
        </div>
       </div>
       <div class="mb-3 row">
        <label for="centre" class="col-sm-2 col-form-label">Centre</label>
        <div class="col-sm-10">
         <select class="form-control" name="centre"> 
  	   <?php foreach($centres as $centre) :?>
	    <option value=<?= $centre['id_centre']?> ><?= ucfirst($centre['nom']) ?></option>
  	   <?php endforeach; ?>
         </select>
        </div>
       </div>
       <div class="mb-3 row">
        <label for="docteur" class="col-sm-2 col-form-label">Docteur</label>
        <div class="col-sm-10">
         <select class="form-control" name="docteur"> 
  	   <?php foreach($docteurs as $docteur) :?>
	    <option value=<?= $docteur['id_docteur']?> ><?= ucfirst($docteur['nom']) ?></option>
  	   <?php endforeach; ?>
         </select>
        </div>
       </div>
       <div class="mb-3 row">
        <label for="nom" class="col-sm-2 col-form-label">Adresse</label>
        <div class="col-sm-10">
         <input type="text" required class="form-control" name="adresse">
        </div>
       </div>
       <div class="mb-3 row">
        <label for="nom" class="col-sm-2 col-form-label">Téléphone</label>
        <div class="col-sm-10">
         <input type="number" required class="form-control" name="phone">
        </div>
       </div>
       <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
         <input type="email" required class="form-control" name="email">
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
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0 ;
 while($patient = $patients->fetch_assoc()) :
    $i++ ?>
    <tr>
    <th scope="row"><?= $i ?></th>
    <td><?= $patient["nom"] ?></td>
    <td><?= $patient["email"] ?></td>
    <td>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#details<?=$i?>">Détails</button>

<!-- Modal -->
<div class="modal fade" id="details<?=$i?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	<h1 class="modal-title fs-5" id="staticBackdropLabel">Détails de <?= $patient["nom"]?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div>
        <p>Nom : <?=$patient["nom"]?> </p>
       </div>
       <div>
        <p>Prénom : <?=$patient["prenom"]?> </p>
       </div>
       <div>
	<p>Centre : <?php foreach($centres as $centre) :
	if($centre['id_centre'] == $patient['id_centre']){
        echo $centre['nom'];
       } endforeach;?> </p>
       </div>
       <div>
	<p>Docteur : <?php foreach($docteurs as $docteur) :
	if($docteur['id_docteur'] == $patient['id_docteur']){
        echo $centre['nom'];
       } endforeach;?> </p>
       </div>
       <div>
        <p>Adresse : <?=$patient["adresse"]?> </p>
       </div>
       <div>
        <p>Telephone : <?=$patient["telephone"]?> </p>
       </div>
       <div>
        <p>Email : <?=$patient["email"]?> </p>
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
	<h1 class="modal-title fs-5" id="staticBackdropLabel">Modification de <?= $patient["nom"]?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="modal-body" action="modification.php" method="POST">
       <div class="mb-3 row">
        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
	<input type="text" required class="form-control" name="nom" value="<?=$patient["nom"]?>">
        </div>
       </div>
       <div class="mb-3 row">
	<label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
        <div class="col-sm-10">
	<input type="text" required class="form-control" name="prenom" value="<?=$patient["prenom"]?>">
        </div>
       </div>
       <div class="mb-3 row">
        <label for="centre" class="col-sm-2 col-form-label">Centre</label>
        <div class="col-sm-10">
         <select class="form-control" name="centre"> 
  	   <?php foreach($centres as $centre):?>
	    <option value=<?= $centre['id_centre']?> ><?= ucfirst($centre['nom']) ?></option>
  	   <?php endforeach; ?>
         </select>
        </div>
       </div>
       <div class="mb-3 row">
        <label for="docteur" class="col-sm-2 col-form-label">Docteur</label>
        <div class="col-sm-10">
         <select class="form-control" name="docteur"> 
  	   <?php foreach($docteurs as $docteur):?>
	    <option value=<?= $docteur['id_docteur']?> ><?= ucfirst($docteur['nom']) ?></option>
  	   <?php endforeach; ?>
         </select>
        </div>
       </div>
       <div class="mb-3 row">
        <label for="nom" class="col-sm-2 col-form-label">Adresse</label>
        <div class="col-sm-10">
         <input type="text" required class="form-control" name="adresse" value="<?=$patient["adresse"]?>">
        </div>
       </div>
       <div class="mb-3 row">
        <label for="phone" class="col-sm-2 col-form-label">Téléphone</label>
        <div class="col-sm-10">
         <input type="number" required class="form-control" name="phone" value="<?=$patient["telephone"]?>">
        </div>
       </div>
       <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
         <input type="email" required class="form-control" name="email" value="<?=$patient["email"]?>">
        </div>
       </div>
       <input type="hidden" name="id" value="<?=$patient['id_patient']?>" >
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
	<h1 class="modal-title fs-5" id="staticBackdropLabel">Suppression de <?= $patient["nom"]?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="modal-body" action="suppression.php" method="POST">
       <div class="mb-3 row">
        <label for="nom" class="form-control">Êtes-vous sûr de vouloir supprimer cette ligne</label>
        <div class="col-sm-10">
	<input type="hidden" required class="form-control" name="id" value="<?=$patient["id_patient"]?>">
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

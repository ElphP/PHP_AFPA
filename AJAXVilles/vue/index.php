<?php
session_start();
include '../config/Database.php';
include '../Model/Region.php';
include '../Model/Ville.php';

$connexion = new Database;
$maBase = $connexion->connexion();
// $message = $_SESSION['messageBase'];
?>
<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Region Departement Ville exemple avec Ajax & JQuery">
  <meta name="author" content="Ryad Afpa Roubaix">
  <meta name="generator" content="">
  <title>Region Departement Ville exemple</title>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <link href="../assets/css/floating-labels.css" rel="stylesheet">

</head>

<body>
  <form class="form-signin" method="POST" action="">
    <div class="text-center mb-4">
      <h1 class="h3 mb-3 font-weight-normal">Region Departement Ville exemple avec ajax & jquery</h1>
      <!-- <?php if (isset($message)) {
        echo $connexion->getMessageBase();
      } ?> -->
    </div>
    <div class="form-label-group">
      <select class="custom-select d-block w-100" id="region" name="region" onChange="getDepartement(this.value);" required>
        <?php Region::GetAllRegion(); ?>
      </select>
    </div>
    <div class="form-label-group">
      <select class="custom-select d-block w-100" id="departement" name="departement" onChange="getVille(this.value);" required>
        <option value="">Choisissez un département</option>
      </select>
    </div>
    <div class="form-label-group">
      <select class="custom-select d-block w-100" id="ville" name="ville" required>
        <option value="">Choisissez une ville</option>
      </select>
    </div>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Valider</button>
    <br>
    <div class="form-label-group text-center">
      <?php if (isset($_POST['ville'])) { ?>
        <div class="alert alert-primary" role="alert">
          <?php Ville::GetVilleById($_POST['ville']); ?>
        </div>
      <?php }; ?>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">&copy; Afpa Roubaix 2016-2019</p>
  </form>



</body>

</html>
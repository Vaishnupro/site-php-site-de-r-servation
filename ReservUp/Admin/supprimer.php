<?php
session_start();
if (!isset($_SESSION['testsio444'])) {
  header("Location: ../login.php");
}

if (empty($_SESSION['testsio444'])) {
  header("Location: ../login.php");
}

require("../config/modele.php");
$Proprietes = afficher();
?>


<html>

<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <style>
    .form-control {
      border: 2px solid #000000;
      border-radius: 0.25rem;
      background-color: #C7EE49;
      color: #212529;
    }
  </style>
  <img src="https://cdn.pixabay.com/photo/2014/04/02/10/41/button-304224_960_720.png" style="width: 100PX; max-width: 50px;">

  <title></title>



</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ReservUp</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../admin/" style="font-weight: bold">Nouveau</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="supprimer.php">Suppression</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="afficher.php">Proprietes</a>
          </li>
        </ul>
        <div style="display: flex ; justify-content: flex-end;">
          <a href="deconnexion.php" class="btn btn-danger">Se deconnecter</a>
        </div>
      </div>
    </div>
  </nav>


  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <form method="post">


          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Identifiant du propriété</label>
            <input type="number" class="form-control" name="id_propriete" required>
          </div>

          <button type="submit" name="valider" class="btn btn-success">Supprimer le produit </button>

        </form>

      </div>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div>
      <?php foreach ($Proprietes as $propriete) : ?>
        <div class="col">
          <div class="card shadow-sm">
            <h3><?= $propriete->id_propiete ?></h3>
            <img src="<?= $propriete->image ?>">

            <div class="card-body">

              <p class="card-text">Adresse : <?= $propriete->Adresse_P ?>, <?= $propriete->Code_Postal_P ?> <?= $propriete->Ville_P ?></p>
              <p class="card-text">Nombre de chambres : <?= $propriete->Nb_Chambres ?></p>
              <div class="d-flex justify-content-between align-items-center">


              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>




    </div>
  </div>

</body>

</html>

<?php

if (isset($_POST['valider'])) {
  if (
    isset($_POST['id_propriete'])
  ) {
    if (!empty($_POST['id_propriete'])) {


      $id_propriete = htmlspecialchars(strip_tags($_POST['id_propriete']));


      try {
        supprimer($id_propriete);
        echo "La propriété a été ajoutée avec succès !";
      } catch (Exception $e) {
        echo "Une erreur s'est produite : " . $e->getMessage();
      }
    } else {
      echo "Tous les champs sont obligatoires !";
    }
  }
}

?>
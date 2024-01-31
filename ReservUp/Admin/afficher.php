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
      border: 3px solid black;
      border-radius: 0.25rem;
      background-color: #292929;
      color: #ffffff;
    }

    th,
    td {
      border: 2px solid black;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
  </style>


  <title>Toutes les propriétés</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            <a class="nav-link" aria-current="page" href="../admin/">Nouveau</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="supprimer.php">Suppression</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="afficher.php" style="font-weight: bold">Proprietes</a>
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
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Adresse</th>
              <th scope="col">Ville</th>
              <th scope="col">Code Postal</th>
              <th scope="col">Description</th>
              <th scope="col">Nombre de chambres</th>
              <th scope="col">Prix/Nuit</th>
              <th scope="col">Image</th>
              <th scope="col">Editer</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Proprietes as $Propriete) : ?>

              <tr>
                <th scope="row"><?= $Propriete->id_propiete ?></th>

                <td>
                  <?= $Propriete->Nom_P ?></th>
                </td>
                <td>
                  <?= $Propriete->Adresse_P ?></th>
                </td>
                <td>
                  <?= $Propriete->Ville_P ?></th>
                </td>
                <td>
                  <?= $Propriete->Code_Postal_P ?></th>
                </td>
                <td>
                  <?= $Propriete->Description ?>....</th>
                </td>
                <td>
                  <?= $Propriete->Nb_Chambres ?></th>
                </td>
                <td style="font-weight:bold;color:green;">
                  <?= $Propriete->Prix_Nuit ?>€</th>
                </td>
                <td>
                  <img src="<?= $Propriete->image ?>" width="135" height="80">
                </td>
                <td>
                  <a href="editer.php?pdt=<?= $Propriete->id_propriete ?>"><i class="fa fa-pencil" style="font-size:200%"></i></a>
                </td>
              </tr>

            <?php endforeach ?>
          </tbody>
        </table>


      </div>
    </div>
  </div>

</body>

</html>
<?php

require("config/modele.php");

$Proprietes=afficher();

?>

<!doctype html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>ReservUp</title>

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
     crossorigin="anonymous"></script>



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .card {
      height: 500px;
    }

      .card img {
    height: 250px;
    object-fit: cover;
    }
    

    </style>

    
  </head>
  <body>
    
<header data-bs-theme="dark">
  <div class="collapse text-bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4>Votre voyage inoubliable commence ici, sur ReservUp</h4>
          <p class="text-body-secondary">Vivez une expérience immersive et authentique au Sri Lanka en choisissant l'une de nos propriétés de charme, réservables en quelques minutes sur ReservUp</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4>Se connecter :</h4>
          <ul class="list-unstyled">
            <li><a href="login.php" class="text-white">Se connecter</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>ReservUp</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

 
  <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
       
      <?php foreach($Proprietes as $propriete) : ?>
        <div class="col">
          <div class="card shadow-sm">
              <title><?= $propriete->Nom_P ?></title>
              <img src="<?= $propriete->image ?>">

                  <div class="card-body">
                    <p class="card-text"><?= substr($propriete->Description,0,108) ;?>...</p>
                    <p class="card-text">Adresse : <?= $propriete->Adresse_P ?>, <?= $propriete->Code_Postal_P ?> <?= $propriete->Ville_P ?></p>
                    <p class="card-text">Nombre de chambres : <?= $propriete->Nb_Chambres ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Réserver</button>
                      </div>
                      <small class="text" style="fond-weight : bold;"><?=$propriete->Prix_Nuit ?>€</small>
                    </div>
                  </div>
                </div>
              </div>
<?php endforeach; ?>

        
      
      </div>
    </div>
  </div>

</main>
      
  </body>
</html>
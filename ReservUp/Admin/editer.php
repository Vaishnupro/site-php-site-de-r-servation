<?php
session_start();

require("../config/modele.php");

if(!isset($_SESSION['testsio444'])){
 header("Location: ../login.php");
}

 if(empty($_SESSION['testsio444'])){
 header("Location: ../login.php");
}

if(!isset($_GET['pdt'])){
    header("Location: afficher.php");  
}
    
    
if(empty($_GET['pdt'])OR !is_numeric( $_GET['pdt'])){
        header("Location: afficher.php");
}

$id_propriete= $_GET['pdt'];
$id_propriete=getPropriete($id_propriete);


foreach($Proprietes as $Propriete){
$nom = $propriete->Nom_P;
$idpdt=$propriete->id_propriete;
$Adresse=$propriete->Adresse_P;
$Ville=$propriete->Ville_P;
$Cp=$propriete->Code_Postal_P;
$Desc=$propriete->Description;
$Nchambre=$propriete->Nb_Chambres;
$Prix=$propriete->Prix_Nuit;
$Image=$propriete->image;
}
?>



<html>
<head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
     crossorigin="anonymous"></script>

     <style>
        .form-control {
            border: 2px solid  #000000;
            border-radius: 0.25rem;
            background-color:#C7EE49;
            color: #212529;
        }
     </style>
    
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
                <a class="nav-link" aria-current="page" href="../admin/">Nouveau</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="supprimer.php">Suppression</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="afficher.php">Proprietes</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href=""style="font-weight: bold; color:green;">Modification</a>
                </li>
                
            </ul>
            <div style="display: flex ; justify-content: flex-end;">
                <a href="deconnexion.php"class="btn btn-danger">Se deconnecter</a>
            </div>
            </div>
        </div>
        </nav>


    <div class="album py-5 bg-body-tertiary">
     <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <form method="post">

              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nom du propriété</label>
                <input type="text" class="form-control" name="Nom_P" value="<?=$nom ?>"  required>
              </div>

              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Adresse</label>
                <textarea class="form-control" name="Adresse_P" value="<?=$Adresse ?>" required></textarea>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ville</label>
                <input type="text" class="form-control" name="Ville_P"  value="<?=$Ville ?>" required>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Code postal</label>
                <input type="number" class="form-control" name="Code_Postal_P" value="<?=$Cp ?>"  required>
              </div>

              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea class="form-control" name="Description"  value="<?=$Desc ?>" required></textarea>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de Chambres</label>
                <input type="number" class="form-control" name="Nb_Chambres"  value="<?=$Nchambre ?>" required>
              </div>

              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prix</label>
                <input type="number" class="form-control" name="Prix_Nuit" value="<?=$Prix ?>" step="0.01" required>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titre de l'image</label>
                <input type="text" class="form-control" name="image"  value="<?=$Image ?>"required>
              </div>

              <button type="submit" name="valider" class="btn btn-success">Enregistrer</button>

          </form>

        </div>
      </div>
    </div>
  
</body>
</html>

<?php

if(isset($_POST['valider'])) {
    if(isset($_POST['Nom_P']) && isset($_POST['Adresse_P']) && isset($_POST['Ville_P']) && isset($_POST['Code_Postal_P'])
      && isset($_POST['Description']) && isset($_POST['Nb_Chambres']) && isset($_POST['Prix_Nuit']) && isset($_POST['image'])) {
        if(!empty($_POST['Nom_P']) && !empty($_POST['Adresse_P']) && !empty($_POST['Ville_P']) && !empty($_POST['Code_Postal_P'])
        && !empty($_POST['Description']) && !empty($_POST['Nb_Chambres']) && !empty($_POST['Prix_Nuit']) && !empty($_POST['image'])) {
            $nom = htmlspecialchars(strip_tags($_POST['Nom_P']));
            $Adresse = htmlspecialchars(strip_tags($_POST['Adresse_P']));
            $Ville = htmlspecialchars(strip_tags($_POST['Ville_P']));
            $Cp = htmlspecialchars(strip_tags($_POST['Code_Postal_P']));
            $Desc = htmlspecialchars(strip_tags($_POST['Description']));
            $Nchambre = htmlspecialchars(strip_tags($_POST['Nb_Chambres']));
            $Prix = htmlspecialchars(strip_tags($_POST['Prix_Nuit']));
            $Image = htmlspecialchars(strip_tags($_POST['image']));

                modifier($nom, $Adresse, $Ville, $Cp, $Desc, $Nchambre, $Prix, $Image,$id_propriete);
           header("Location:afficher.php");
            

          }
          }
}
?>
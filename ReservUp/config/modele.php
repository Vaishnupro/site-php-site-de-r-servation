<?php


function modifier($nom, $Adresse, $Ville, $Cp, $Desc, $Nchambre, $Prix, $Image, $id_propriete)
{
    if (require("connexion.php")) {
        $req = $access->prepare("UPDATE  proprietes SET Nom_P=?, Adresse_P=?, Ville_P=?, Code_Postal_P=?, `Description`=?, Nb_Chambres=?, Prix_Nuit=?,` image`=? WHERE id_propiete=? ");

        $req->execute(array($nom, $Adresse, $Ville, $Cp, $Desc, $Nchambre, $Prix, $Image, $id_propriete));

        $req->closeCursor();
    }
}
function getPropriete($id_propriete)
{

    if (require("connexion.php"))
        $req = $access->prepare(" SELECT * FROM proprietes WHERE id_propriete=? ");

    $req->execute(array($id_propriete));

    if ($req->rowcount() == 1) {
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;
    } else {
        return false;
    }

    $req->closeCursor();
}

function getAdmin($email, $password)
{

    if (require("connexion.php"))
        $req = $access->prepare(" SELECT * FROM admin WHERE email=? AND motdepasse=?");

    $req->execute(array($email, $password));

    if ($req->rowcount() == 1) {
        $data = $req->fetch();

        return $data;
    } else {
        return false;
    }

    $req->closeCursor();
}


function ajouter($nom, $Adresse, $Ville, $Cp, $Desc, $Nchambre, $Prix, $Image)
{
    if (require("connexion.php")) {
        $req = $access->prepare("INSERT INTO proprietes(Nom_P, Adresse_P, Ville_P, Code_Postal_P, Description, Nb_Chambres, Prix_Nuit, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $req->execute(array($nom, $Adresse, $Ville, $Cp, $Desc, $Nchambre, $Prix, $Image));

        $req->closeCursor();
    }
}

function afficher()
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM proprietes ORDER BY id_propiete DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }
}

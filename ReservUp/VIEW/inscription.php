<?php require_once 'UtilisateurController.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Inscription</h1>
    <!-- Formulaire d'inscription -->
    <form action="UtilisateurController.php" method="post">
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom"><br>
        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="motdepasse">Mot de passe :</label><br>
        <input type="password" id="motdepasse" name="motdepasse"><br>
        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>
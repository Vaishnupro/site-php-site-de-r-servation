<?php require_once 'ProprieteController.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une propriété</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Modifier une propriété</h1>
    <!-- Formulaire pour modifier une propriété -->
    <form action="ProprieteController.php" method="post">
        <label for="nom">Nom de la propriété :</label><br>
        <input type="text" id="nom" name="nom"><br>
        <!-- Autres champs du formulaire -->
        <input type="submit" value="Modifier">
    </form>
</body>

</html>
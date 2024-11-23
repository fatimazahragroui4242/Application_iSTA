<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Consulter un Stagiaire</title>
</head>
<body>
    <h2>Consulter un Stagiaire</h2>
    <form method="GET">
        <label>Matricule :</label>
        <input type="number" name="matStagiaire" required>
        <button type="submit">Rechercher</button>
    </form>

    <?php
    if (isset($_GET['matStagiaire'])) {
        $mat = $_GET['matStagiaire'];
        $result = $conn->query("SELECT * FROM stagiaires WHERE matStagiaire = $mat");

        if ($result->num_rows > 0) {
            $stagiaire = $result->fetch_assoc();
            echo "<p>Nom : " . $stagiaire['nomStagiaire'] . "</p>";
            echo "<p>Prénom : " . $stagiaire['prenomStagiaire'] . "</p>";
            echo "<p>Filière : " . $stagiaire['filiereStagiaire'] . "</p>";
            echo "<p>Année d'étude : " . $stagiaire['anneeEtude'] . "</p>";
        } else {
            echo "<p>Aucun stagiaire trouvé.</p>";
        }
    }
    ?>
</body>
</html>
<?php
include('../connexion.php'); // Inclure le fichier de connexion

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_recette = $_POST['nom_recette'];
    $liste_ingred = $_POST['liste_ingred'];
    $etapes_prep = $_POST['etapes_prep'];
    $duree_prep = $_POST['duree_prep'];
    if (!preg_match("/^[a-zA-Z\s]+$/", $nom_recette)) {
        echo "Le nom de la recette n'est pas valide. Il doit contenir uniquement des lettres et des espaces.";
    } else {
        // Préparer la requête SQL
        $sql = "INSERT INTO recettes (nom_recette, liste_ingred, etapes_prep, duree_prep) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Liaison des paramètres
        $stmt->bind_param("ssss", $nom_recette, $liste_ingred, $etapes_prep, $duree_prep);

        // Exécution de la requête
        $stmt->execute();

        // Fermer la requête et la connexion
        $stmt->close();
        $conn->close();

        echo "Les données ont été ajoutées avec succès à la base de données.";
    }
}
?>

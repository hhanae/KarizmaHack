<?php
include('../connexion.php'); // Inclure le fichier de connexion

// Vérifier si l'ID de la recette est passé en paramètre
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_recette = $_GET['id'];

    // Préparer la requête SQL de suppression
    $sql = "DELETE FROM recettes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_recette);

    // Exécuter la requête
    $stmt->execute();

    // Fermer la requête et la connexion
    $stmt->close();
    $conn->close();

    // Rediriger vers la page principale ou une autre page après la suppression
    header("Location: table-recettes.php");
    exit();
} else {
    // Si l'ID n'est pas spécifié, rediriger vers la page principale
    header("Location: table-recettes.php");
    exit();
}
?>

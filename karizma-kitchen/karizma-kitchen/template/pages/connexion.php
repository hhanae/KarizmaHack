<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "karizma_kitchen";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}
?>

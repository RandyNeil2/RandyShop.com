<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$database = "randyshop";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$name = $_POST['name'];
$descr = $_POST['description'];
$prix = $_POST['prix'];
$stock = $_POST['quantite'];


// Préparer et exécuter la requête d'insertion
$sql = "INSERT INTO produit (produit_name, descr_prod, produit_price, stock ) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $descr, $prix, $stock);

if ($stmt->execute()) {
    echo "Données enregistrées avec succès !";
} else {
    echo "Erreur lors de l'enregistrement des données : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
<?php
// Démarrage de la session
session_start();

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "randyshop";

try {
    // Création de la connexion PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Configuration des options PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si l'utilisateur est connecté ou s'est enregistré
    if (isset($_SESSION['id'])) {
        // Récupération du nom de l'utilisateur à partir de la base de données
        $sql = "SELECT name FROM utilisateur WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $_SESSION['id']);
        $stmt->execute();
        $userName = $stmt->fetchColumn();

        // Stockage du nom dans la variable de session
        $_SESSION['name'] = $userName;

        // Affichage du nom de l'utilisateur
        echo "Bonjour, " . $userName . " !";
    } else {
        // L'utilisateur n'est pas connecté ou enregistré
        echo "<script>
                alert('Veuillez vous connecter ou vous enregistrer pour accéder à cette fonctionnalité.');
                window.location.href = 'connexion.php'; // Remplacez 'login.php' par l'URL de votre page de connexion
              </script>";
        exit;
    }
} catch (PDOException $e) {
    // Une erreur s'est produite lors de la connexion à la base de données
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$conn = null;
?>
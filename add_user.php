<?php
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

    // Récupération des données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mdp = ($_POST['password']);
    $password = password_hash($mdp, PASSWORD_DEFAULT);
    $phone = $_POST['phone'];

    // Requête SQL pour insérer un nouvel utilisateur
    $sql = "INSERT INTO utilisateur (name, email, password, phone) VALUES (:name, :email, :password, :phone)";

    // Préparation de la requête
    $stmt = $conn->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);

    // Exécution de la requête
    $stmt->execute();

    // Récupération de l'ID de l'utilisateur nouvellement créé
    $userId = $conn->lastInsertId();

    // Démarrage de la session
    session_start();

    // Stockage des informations de l'utilisateur dans la session
    $_SESSION['userId'] = $userId;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;

    // L'utilisateur a été enregistré avec succès
    echo "Enregistrement réussi !";

    // Redirection vers la page d'accueil ou la page de profil
    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    // Une erreur s'est produite lors de l'enregistrement
    echo "Erreur lors de l'enregistrement : " . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$conn = null;
?>

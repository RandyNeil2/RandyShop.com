<?php
// Informations de connexion à la base de données
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "randyshop";

/**
 * Connexion d'un utilisateur.
 *
 * @param string $email L'email de l'utilisateur.
 * @param string $password Le mot de passe de l'utilisateur.
 * @return string Le résultat de la tentative de connexion.
 */
function loginUser($email, $password) {
    global $servername, $dbusername, $dbpassword, $dbname;

    try {
        // Création de la connexion PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Désinfection de l'email pour éviter les injections SQL
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Vérification de la validité de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "L'adresse email n'est pas valide.";
        }

        // Requête SQL pour vérifier les informations de connexion
        $sql = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Vérification des résultats
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                

            // Vérification du mot de passe haché
            if (password_verify($password, $user['password'])) {
                // Connexion réussie
                return "Connexion réussie.";
            } else {
                // Mot de passe incorrect
                return "Mot de passe incorrect.";
            }
        } else {
            // Utilisateur non trouvé
            return "Aucun utilisateur trouvé avec cet email.";
        }
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        return "Erreur de connexion : " . $e->getMessage();
    } finally {
        // Fermeture de la connexion
        $conn = null;
    }
}

// Vérification que les données POST sont présentes
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $user_password = $_POST['password'];
    echo loginUser($email, $user_password);
} else {
    echo "Veuillez fournir un email et un mot de passe.";
}
?>
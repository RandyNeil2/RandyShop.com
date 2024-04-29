<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Style/style.css">
</head>
<body>

    <div class="containerRegister">
        <div class="logoContainer">
            <a href="./index.php"><img class="logo" src="./assets/images/Logo.png" alt="logo"></a>
        </div>
        <h1>Rejoignez notre communauté</h1>
        <p>Inscrivez-vous pour créer un compte.</p>
        <form action="connexion.php" method="POST">
            <input class='name' type="text" placeholder="Nom"  name="username"  required>
            <input type="email" placeholder="E-mail" name="email" required>
            <input type="password" placeholder="Mot de passe" name="password" required>
            <button type="submit">S'inscrire</button>
        </form>
        <p>Vous avez deja un compte?
            <a href="./login.php">Connectez vous</a></p>
    </div>
    
</body>
</html>
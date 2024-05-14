<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Style/style.css">
</head>
<body>
    <div class="bodylogin">
    <div class="containerLogin">
        <div class="logoContainer">
        <a href="./index.php"><img class="logo" src="./assets/images/Logo.png" alt="logo"></a>
    </div>
        <h1>Ravis de vous revoir!</h1>
        <p>Veuillez vous connecter pour accéder à votre compte.</p>
        <form action="connexion.php" method="POST">
        <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" id="email" name="email" placeholder="pikafire@gmail.com" required>
        </div>

        <div class="form-group">
          <label for="phone">Mot de passe:</label>
        <input type="password"  id="password" name="password" placeholder="...." required>
        </div>
            <button type="submit">Se connecter</button>
        </form>
        <br>
        <br>
        <p>Vous n'avez pas de compte?
            <a href="./register.php">Inscrivez vous</a></p>
    </div>
</div>
</body>
</html>
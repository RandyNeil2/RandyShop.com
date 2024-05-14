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
        <form action="add_user.php" method="POST">
               
          <div class="form-group">
          <label for="name">Nom :</label>
          <input type="text" id="name" name="name" placeholder="Entrez votre nom" required>
        </div>
         <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
        </div>

        <div class="form-group">
          <label for="phone">Mot de passe:</label>
        <input type="password"  id="password" name="password" placeholder="Mot de passe" required>
        </div>

        <div class="form-group">
          <label for="phone">Téléphone :</label>
          <input type="tel" id="phone" name="phone" placeholder="Entrez votre téléphone" required>
        </div>
       
   <button type="submit">S'inscrire</button>
        </form>
        <p>Vous avez deja un compte?
            <a href="./login.php">Connectez vous</a></p>
        </div>
         
    </div>
    
</body>
</html>
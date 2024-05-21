<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Style/style.css">
</head>
<body>
  <?php 
  session_start();

  if (isset($_SESSION['name'])) {
      $userName = $_SESSION['name'];
  } 
  ?>

    <nav>
        <a href="./index.php">
          <div class="logoPres">  
           <div class="logo-container"> <img src="./assets/images/Logo.png" alt="logo"></div>
         
          <h3>Randy<span>Shop</span></h3>
          </div></a>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Rechercher...">
                <button id="searchButton">Rechercher</button>
            </div>
            <!-- <div id="results"></div> -->
    
            <div class="dropdown">
            <button class="dropbtn">    <?php if (isset($_SESSION['name'])) { ?>
        <!-- Texte à afficher après la connexion -->
       <p><?php echo $userName ?></p>
      
       <script><img id="welcome-text"  class='headimg' src="./assets/images/1.svg  alt="> <p id="welcome-text"> compte</p> <?php } ?></button>
            document.getElementById('welcome-text').style.display = 'none'; 
       </script>
                <div class="dropdown-content">
                  <a href="./register.php">S'inscrire</a>
                  <a href="login.php">Se connecter</a>
                </div>
              </div>
    
              <a href="./panier.php"> <img src="./assets/images/shopping-basket.png"kart></a>
        </nav>
    <div class="bodyCheckout">
       
        <div class="container">
            
            <h1>Informations du Client</h1>
            <form action="#" method="POST">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
    
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
    
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required>
    
                <label for="telephone">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" required>
    
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" required>
    
                <label for="quartier">Quartier :</label>
                <input type="text" id="quartier" name="quartier" required>
    
                <button type="submit">Valider et Imprimer la Facture</button>
            </form>
            <p>Retournez <a href="./panier.php">dans le panier</a></p>
        </div>
        
        </div>
        
    

    <footer>
        <div class="footer-content">

            <div class="footer-column">
                <h3>FastLink</h3>
                <ul>
                  <li><a href="./index.php">Acceuil</a></li>
                  <li><a href="./panier.php">Panier</a></li>
                  <li><a href="./checkout.php">Se connecter</a></li>
                </ul>
              </div>
          <div class="footer-column">
            <h3>À propos</h3>
            <ul>
              <li><a href="#">Qui sommes-nous ?</a></li>
              <li><a href="#">Notre mission</a></li>
              <li><a href="#">Notre équipe</a></li>
            </ul>
          </div>
      
          <div class="footer-column">
           <a href="./serviceClient.php"><h3>Service client</h3></a> 
            <ul>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Retours et échanges</a></li>
            </ul>
          </div>
      
          <div class="footer-column">
            <h3>Informations</h3>
            <ul>
              <li><a href="#">Conditions générales</a></li>
              <li><a href="#">Politique de confidentialité</a></li>

            </ul>
          </div>
      
          <div class="footer-column">
            <h3>Suivez-nous</h3>
            <ul class="social-media">
              <li><a href="#"><i  class="fa-brands fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      
        <div class="footer-copyright">
          <p>Copyright &copy; 2024 RandyShop</p>
        </div>
      </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/style.css">
    <title>Document</title>
</head>
<body>
  <?php 
  session_start();

  if (isset($_SESSION['name'])) {
      $userName = $_SESSION['name'];
  } 
  ?>
<div class="bodyDashboard">
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
                  <a href="./register.html">S'inscrire</a>
                  <a href="login.html">Se connecter</a>
                </div>
              </div>
    
              <a href="./panier.html"> <img src="./assets/images/shopping-basket.png"kart></a>
        </nav> 

        <div class="mainDashboard">
        <div class="sessionBtn">
          <div class="dashGreat">
           <p>Hi! <span><?php echo $userName ?></span> San</p>  
          </div>
    <button class="page-button" onclick="afficherDiv('div1')"><img src="./assets/images/user-svgrepo-com (2).svg" alt=""><p>User</p><p>></p></button>
    <button autofocus class="page-button" onclick="afficherDiv('div2')"><img src="./assets/images/user-gear-svgrepo-com.svg" alt=""><p>Admin</p><p>></p></button>
    </div>
     

    <div class="mainSession">
    <div id="div1" class="content" style="display: none;">
      <!-- Contenu de la première div -->
      <h2>Informations Personnelles</h2>
      <form action="/update" method="post">
        <div class="update">
        <div class="updateLeft">
          
          <div class="form-group">
          <label for="name">Nom :</label>
          <input type="text" id="name" name="name" placeholder="Entrez votre nom" required>
        </div>
         <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
        </div>

        </div>
        <div class="updateRight">
        
        
        <div class="form-group">
          <label for="address">Adresse :</label>
          <input type="text" id="address" name="address" placeholder="Entrez votre adresse" required>
        </div>

        <div class="form-group">
          <label for="phone">Téléphone :</label>
          <input type="tel" id="phone" name="phone" placeholder="Entrez votre téléphone" required>
        </div>

        </div>
        
        </div>
        <div class="form-groupbtn">
          <button class="ok" type="submit">Mettre à jour</button>
        </div>
      
      </form>
      <div class="userTable">

        <h2>
          Historique des commandes

        </h2>
      <table class="custom-table">
        <thead>
          <tr>
            <th>#Order</th>
            <th>Date</th>
            <th>Status</th>
            <th>Total Order</th>
            <th >Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Donnée 1</td>
            <td>Donnée 2</td>
            <td>Donnée 3</td>
            
            <td>Donnée 2</td>
            <td class="action">
            <!-- <div class="action1"><img src="./assets/images/edit-3-svgrepo-com.svg" alt=""><p>Edit</p></div> -->
            <div class="action2"><img src="./assets/images/dustbin-bin-trush-svgrepo-com (1).svg" alt=""><p>Delete</p></div>
          </td>
          </tr>
         
          
        </tbody>
      </table>
    </div>

    </div>
    
    <div id="div2" class="content" style="display: none;">
      <!-- Contenu de la deuxième div -->
      <div class="dashContainer">
         <h2>Gestion des catégories</h2>
         <button class='addProd' id="ajouter-produit-btn" onclick="afficherFormulaire()">+Ajouter</button>
              <div id="overlay" onclick="cacherFormulaire()"></div>
    <div id="formulaire-container" style="display: none;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nom de la catégorie : <input type="text" name="nom" required><br>
        Description : <textarea name="description" rows="3" required></textarea><br>
        <input type="submit" name="submit" value="Ajouter">
        </div>
    </form>
          <h2>
          Vos Produits

        </h2>
    <form action="add_products.php" method="post">
  <div class="containers">
    <div class="alignementBouton">
      <button class='addProd' id="ajouter-produit-btn" onclick="afficherFormulaire()">+Ajouter</button>
    </div>
    <div id="overlay" onclick="cacherFormulaire()"></div>
    <div id="formulaire-container" style="display: none;">
      <h2>Ajouter un produit</h2>
      <div class="update">
        <div class="updateLeft">
          <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" placeholder="Entrez nom du produit" required>
          </div>
          <div class="form-group">
            <label for="name">Categorie:</label>
            <input type="text" id="categorie" name="categorie" placeholder="Entrez sa categorie">
          </div>
          <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="7" required></textarea>
          </div>
        </div>
        <div class="updateRight">
          <div class="qte-prix">
            <div class="form-group">
              <label for="prix">Prix Unitaire:</label>
              <input type="number" id="prix" name="prix" step="0.01" required>
            </div>
            <div class="form-group">
              <label for="quantite">Quantité :</label>
              <input type="number" id="quantite" name="quantite" required>
            </div>
          </div>
          <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" id="image" name="image">
          </div>
        </div>
      </div>
      <div class="form-buttons">
        <button class="goBack" type="button" onclick="annulerEnregistrement()">Annuler</button>
        <button class="ok" type="submit">Ajouter</button>
      </div>
    </div>
  </div>
</form>

<table class="custom-table">
  <thead>
    <tr>
      <th>Produits</th>
      <th>Categories</th>
      <th>PU</th>
      <th>Quantité</th>
      <th>Qté en Stock</th>
      <th>Total</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Donnée 1</td>
      <td>Donnée 1</td>
      <td>Donnée 2</td>
      <td>Donnée 3</td>
      <td>Donnée 1</td>
      <td>Donnée 2</td>
      <td class="action">
        <div class="action1"><img src="./assets/images/edit-3-svgrepo-com.svg" alt=""><p>Edit</p></div>
        <div class="action2"><img src="./assets/images/dustbin-bin-trush-svgrepo-com (1).svg" alt=""><p>Delete</p></div>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>


<footer class="dashFooter">
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
<script src="./script/script.js"></script>
</html>
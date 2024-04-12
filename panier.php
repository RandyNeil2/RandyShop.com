<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Style/style.css">
    
  <?php  $jsonCartData = file_get_contents("./assets/data/cart.json"); 
          $cart = json_decode($jsonCartData, true);  

          if (isset($_POST['delete_btn'])) {
             $elementId = $_POST['delete_btn'];
            // Rechercher l'index de l'élément à supprimer
            $index = array_search($elementId, array_column($cart, 'id'));
            
        
            // Supprimer l'élément du tableau si l'index a été trouvé
            if ($index !== false) {
              unset($cart[$index]);
              $cart = array_values($cart); // Réindexer le tableau
          }        
                // Encoder le tableau en JSON
                $jsonData = json_encode($cart);
        
                // Écrire le JSON dans le fichier
                file_put_contents('./assets/data/cart.json', $jsonData);
        
                echo 'L\'élément a été supprimé avec succès.';
            } else {
                echo 'L\'élément n\'a pas été trouvé dans le tableau.';
            }
            var_dump($cart);
        
        ?>  
 

</head>
<body>
    <div class="bodyPanier">
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
                <button class="dropbtn">Compte</button>
                <div class="dropdown-content">
                  <a href="./register.php">S'inscrire</a>
                  <a href="login.php">Se connecter</a>
                </div>
              </div>
    
              <a href="./panier.php"> <img src="./assets/images/shopping-basket.png"kart></a>
        </nav>

  
        <div class="panier">

            <div class="listePanier">
                <h2>Détail de votre Panier</h2>
                
       <?php foreach($cart as $cartProduct){ 
        ?>
                <div class="kartProducts">
                   <div class="kartProductImg"> <img src="<?php echo $cartProduct['img'] ?>"></div>
                   <div class="suppbutton"><form method="post">
                   <div class="h3"><h3><?php echo $cartProduct['name']  ?></h3></div>
                   <form method="post" action="panier.php"> <button type="submit" name="delete_btn" class="suppBtn">Rétirer</button></div></form>
              

                    <h4><?php echo $cartProduct['prix']  ?>XAF</h4>
                    
        <div class="quantite-form">
          <label for="quantite">Quantité: <div>
           <button type="button" onclick="decrementer()">-</button>
            <input  id="quantite" name="quantite" value="<?php echo $cartProduct['quantite']  ?>" min="1">
             <button type="button" onclick="incrementer()">+</button>
          </div></label>
       
          </div>
                     
                   
                </div>
            
         <?php } ?>
         </div>

            <div class="facture">
                <h2>Facture</h2>
                <div class="factureDetails">
                    <div class="total"><h1>Total:</h1></div>
                    <div class="details">
                        <p>Sous-Total:</p>
                        <p>Livraison:</p>
                        <p>Garantie:</p>
                    </div>
                    <a href="./panier.php"><button>Passer La commande</button></a>
                </div>



            </div>
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

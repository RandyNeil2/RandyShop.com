  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="./Style/style.css">
      
    <?php  $jsonCartData = file_get_contents("./assets/data/cart.json"); 
            $cart = json_decode($jsonCartData, true); 
            
            
    


    if (!is_array($cart) || empty($cart)) {
      $object_count=0;
  }else{


  $object_count = count($cart);
  }

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
          
                // echo 'L\'élément a été supprimé avec succès.';
              } else {
                  //echo 'L\'élément n\'a pas été trouvé dans le tableau.';
              }
              //var_dump($cart);

            
              $totalPrice = 0;
              
              
              // Parcourir le tableau $cart et additionner les quantités et les prix
              foreach ($cart as $cartItem) {
                $itemTotal = $cartItem['quantite'] * $cartItem['prix'];
                $totalPrice += $itemTotal;
                $qte = $cartItem["quantite"];
                }




                //Creer un nouveau tableau Json Commande

                function fileWriteAppend(){
                  $current_data = file_get_contents('./assets/data/commande.json');
                  $productin = $GLOBALS['product'];
                  $array_data = json_decode($current_data, true);
                  $index = array_search($productin->id, array_column($array_data, "id"));
                 
                    $produit = array(
                      'id' => $productin->id,
                      'name' => $productin->name,
                      'img' => $productin->img,
                      'prix' => $productin->price,
                      'quantite' => 1
                      
                  );
                  foreach ($array_data as $index => $prod) {
                    if ($prod['id'] === $produit['id']) {
                       
                        $array_data[$index]["quantite"]++;
                        $final_data = json_encode($array_data);
                        return $final_data;
                    }
                }
            
         
                array_push($array_data, $produit);
                $final_data = json_encode($array_data);
                return $final_data;
            }
        
                function fileCreateContent(){
                  $file = fopen("./assets/data/cart.json", "w");
                  $productin = $GLOBALS['product'];
                  echo "<h2>" . $productin->id . "</h2>";
                  $produit = array(
                    'id' => $productin->id,
                    'name' => $productin->name,
                    'img' => $productin->img,
                    'prix' => $productin->price,
                    'quantite' => 1
                    
                );
                $array_data[] = $produit;
                $final_data = json_encode($array_data);
                fclose($file);
                return $final_data;
                  
                }

                
               
            
                    
                
              
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
      
                <div class="refKart"> <a href="./panier.php"> <img src="./assets/images/shopping-basket.png"kart></a>
          <div class="numberKart"><?php echo $object_count?></div>
          
          
          </div>
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
                    <form method="post" action="panier.php"> 
                      <button type="submit" value=" <?php echo $cartProduct['id']; ?>"name="delete_btn" class="suppBtn">Rétirer</button></div></form>
                

                      <h4 class="h4"><?php echo $cartProduct['prix']  ?>XAF </h4>
                      
          <div class="quantite-form">
            <label for="quantite">Quantité: <div>
              <form method="post" action="panier.php">
            <button type="submit" name="increment_" >-</button>
              <input  id="quantite" name="quantite" value="<?php echo $cartProduct["quantite"]?>" min="1">
              <button type="submit" name="decrement_">+</button>
              </form>
            </div></label> 
            
        
            </div>
                      
                    
                  </div>
              
          <?php } ?>
          </div>

              <div class="facture">
                  <h2>Facture</h2>
                  <div class="factureDetails">
                      <div class="total"><h1>Total:<?php echo $totalPrice ?>XAF</h1></div>
                      <div class="details">
                          <p>Sous-Total:<?php echo $totalPrice ?>XAF</p>
                          <p>Livraison:</p>
                          <p>Garantie:</p>
                      </div>
                      <form action="./commande.php">
                      <a href="./commande.php"><button type="submit">Passer La commande</button></a>
                      </form>
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

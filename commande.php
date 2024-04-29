<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Style/style.css">
    <?php
// Récupérer la date actuelle
$date_actuelle = date('Y-m-d');

$Jsondata = file_get_contents('./assets/data/cart.json');
$cartNum = json_decode($Jsondata,true);


if (!is_array($cartNum) || empty($cartNum)) {
  $object_count=0;
}else{


$object_count = count($cartNum);
}       $Jsondata = file_get_contents('./assets/data/cart.json');
$cartNum = json_decode($Jsondata,true);


if (!is_array($cartNum) || empty($cartNum)) {
  $object_count=0;
}else{


$object_count = count($cartNum);
}


$jsonCartData = file_get_contents("./assets/data/commande.json"); 
            $com = json_decode($jsonCartData, true); 
// Afficher la date actuelle


 $jsonCartData = file_get_contents("./assets/data/cart.json"); 
            $cart = json_decode($jsonCartData, true); 

if (isset($_POST['collect']))  {
  $commandeData = array();

  foreach ($cart as $cartProduct) {
      $productData = array(
          'id' => $cartProduct['id'],
          'name' => $cartProduct['name'],
          'prix' => $cartProduct['prix'],
          'quantite' => $cartProduct['quantite'],
          'total' => $cartProduct['quantite'] * $cartProduct['prix']
      );

      $commandeData[] = $productData;
  }

  $final_data = json_encode($commandeData, JSON_PRETTY_PRINT);
  file_put_contents('./assets/data/commande.json', $final_data);
  exit;
  echo 'collect Success';
}




// Vérifier que les données du formulaire ont été soumises
if (isset($_POST['generate'])){

    // Créer un objet à partir des données du formulaire
    $formData = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'Numero' => $_POST['phone'],
        //'message' => $_POST['message'],
        'payement' => $_POST['payment'],
        'lieu_livraison' => $_POST['deliver']
      );
    
    // Transformer l'objet en JSON
    $jsondata = json_encode($formData);

    // Faire quelque chose avec les données JSON (les enregistrer dans un fichier, les envoyer à une API, etc.)
    file_put_contents('./assets/data/form_data.json', $jsondata);
;
    exit;


    $jsonCartData = file_get_contents("./assets/data/form_data.json"); 
            $form = json_decode($jsonCartData, true); 



}


?>
</head>
<body>      
        <div class="bodyCommande">
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
            <button class="dropbtn"><img class='headimg' src="./assets/images/1.svg  alt=""> compte</button>
            <div class="dropdown-content">
              <a href="./register.php">S'inscrire</a>
              <a href="login.php">Se connecter</a>
            </div>
          </div>

          <div class="refKart"> <a href="./panier.php"> <img src="./assets/images/shopping-basket.png"kart></a>
         <div class="numberKart"><?php echo $object_count?></div>
        
        
        </div>
    </nav>
    <div class="order-confirmation-container">
    <div class="logoContainer">
        <a href="./index.php"><img class="logo" src="./assets/images/Logo.png" alt="logo"></a>
    </div>
      <header>
        
        <h1>Commande finalisée</h1>
      </header>
      <div class="order-form-container">
      <header>
        <h1>Formulaire de commande</h1>
      </header>
      <main>
        <form id="myForm" method="post" action="./commande.php">
          <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Adress mail:</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="phone">Téléphone :</label>
            <input type="tel" id="phone" name="phone" required>
          </div>
          <div class="form-group">
            <label for="payment">Méthode de paiement :</label>
            <select id="payment" name="payment" required>
              <option value="">Choisissez une méthode</option>
              <option value="om">Orange Money</option>
              <option value="momo">Mobile Money</option>
              <option value="cash">A la Livraison</option>
            </select>
            <div class="form-group">
            <label for="deliver">Lieu de Livraison :</label>
            <select id="deliver" name="deliver" required>
              <option value="">Nyalla</option>
              <option value="Kotto">Kotto</option>
              <option value="Bepanda">Bepanda</option>
              <option value="yassa">yassa</option>
              <option value="ange_raphael">Ange Raphael</option>
              <option value="citee des palmiers">citee des palmiers</option>
              <option value="Bepanda">Bepanda</option>
              <option value="Bonapriso">Bonapriso</option>
            </select>
            <br>
            <br>
            
            <button type="submit" name="generate">Generer ma Facture</button>
        
          </div>
          
        </form>
      </main>
    </div>
      
      <main>
        <section class="order-summary">
          <h2>Récapitulatif de votre commande</h2>

          <table>
            <thead>
              <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach($com as $comData) {
            ?>
                <td class="td"><?php echo $comData["name"] ?></td>
                <td><?php echo $comData["quantite"] ?></td>
                <td><?php echo $comData["prix"] ?><span> XAF</span></td>
                <td><?php echo $comData["prix"]*$comData["quantite"]  ?></td>
              </tr>
              <?php }?>
              
            </tbody>
          </table>
          
          <p class="totale">Total à payer :<?php 
          $prixTotal=0;
          foreach($com as $comData) {
           $prixTotal += $comData["prix"];}
           echo $prixTotal ?>  <span> XAF</span></p>
        </section>
      
          <section class="order-details">
          <h2>Détails de la commande</h2>
          <p>Numero du telephone:     <?php echo $form['name']?></p>
          <p>Nom du client : </p>
          <p>Numéro de commande : 12345</p>
          <p>Date de la commande : <?php echo $date_actuelle; ?></p>
          <p>Méthode de livraison : </p>
          <p>Méthode de paiement :</p>
          <p>Délivré par:      <span> RandyShop™</span></p>
        </section>
        <form >

     
            <br>
            <br>
    <button type="submit">Valider la commande</button>
    </form>
    
        <section class="next-steps">
          <h2>Étapes suivantes</h2>
          <p>Votre commande sera préparée et expédiée dans les plus brefs délais.</p>
          <p>Vous recevrez un e-mail de confirmation une fois votre commande expédiée.</p>
          <p>Vous pouvez suivre l'état de votre commande dans votre compte en ligne.</p>
        </section>
      </main>
    
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
    </div>


  
</body>
</html>
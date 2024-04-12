<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/style.css">
    <title>Document</title>

    
</head>
<body>
<?php $jsondata = file_get_contents('./assets/data/category.json');
  $json_parsed_data = json_decode($jsondata, true);
  ?>
    <?php $item = $_GET['item']; 
        $jsoncategoriesdata = file_get_contents('./assets/data/category.json');
        $jsonproduitdata = file_get_contents('./assets/data/produit.json');
        $categories = json_decode($jsoncategoriesdata);
        $produits = json_decode($jsonproduitdata);
        
        // $cats = [];
        // foreach ($categories as $cat) {
        //   if($cat->name == $item)
        //   array_push($cats, $cat);
        // }
        $index = array_search($item, array_column($categories, 'name'));
        $category = $categories[$index];
        $productIds = $category->listdeproduits;
        $products = [];
        foreach ($produits as $produit) {
          if(in_array($produit->id, $productIds)){
            array_push($products,$produit);
          }
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
            <button class="dropbtn">Compte</button>
            <div class="dropdown-content">
              <a href="./register.php">S'inscrire</a>
              <a href="login.php">Se connecter</a>
            </div>
          </div>

          <a href="./panier.php"> <img src="./assets/images/shopping-basket.png"kart></a>
    </nav>


<div class="bodyCategory">

    <div class="filter-container">
        <form action="filter.php" method="get">
          <label for="category">Catégorie :<?php echo $category->name ?></label>
          <select name="category">
            <option value="all">Toutes</option>
            <option value="telephone">Électronique</option>
            <option value="pc">Pc</option>
            <option value="console">Consoles</option>
            <option value="accessoire">Accessoires</option>
            <option value="jeux">Jeux</option>
          </select>
      
          <label for="price-range">Gamme de prix :</label>
          <input type="range" name="price-range" min="0" max="1000" step="10">
      
          <label for="brand">Marque :</label>
          <input type="text" name="brand">
          
          <div class="btn">
            <button>
               Filtrer
            </button></div>
        </form>
      </div>
      <div class="div">
      <div class="event">
        <h3>Résultat: /</h3>
        
      </div>

      
      
      <div class="grid-container">
      <?php   foreach ($products as $product) {
       ?> <!-- <button class="left-btn" onclick="scrollContent('left')">←</button> -->
        <a href="./produit.php?id=<?php echo $product->id ?>"><div class="product"> 
          <img class="prooduct-img" src="<?php echo  $product->img?>" alt="">
         <h3><?php echo $product->name ?></h3>
          <h4><?php echo $product->price ?></h4>
        </div></a>
        <!-- Ajoutez d'autres produits ici -->
        <?php } ?>
        <!-- <button class="right-btn" onclick="scrollContent('right')">→</button> -->
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
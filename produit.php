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

<?php $id = $_GET['id']; 
        $jsonproduitdata = file_get_contents('./assets/data/produit.json');
        $produits = json_decode($jsonproduitdata);
        
        // $cats = [];
        // foreach ($categories as $cat) {
        //   if($cat->name == $item)
        //   array_push($cats, $cat);
        

        $Jsondata = file_get_contents('./assets/data/cart.json');
  $cartNum = json_decode($Jsondata,true);


  if (!is_array($cartNum) || empty($cartNum)) {
    $object_count=0;
}else{


$object_count = count($cartNum);
}




        $index = array_search($id, array_column($produits, 'id'));
        $product = $produits[$index];
        $work = false;

        if(array_key_exists('test', $_POST)){
          if(file_exists('./assets/data/cart.json')){
            $final_data = fileWriteAppend();
            if(file_put_contents('./assets/data/cart.json', $final_data))
     {
          $message = "<label class='text-success'>Data added Success fully</p>";
     }
            $work = true;

          }else{
            $final_data = fileCreateContent();
            if(file_put_contents('./assets/data/cart.json', $final_data))
     {
          $message = "<label class='text-success'>File createed and  data added Success fully</p>";
     }
          }

        }

        function fileWriteAppend(){
          $current_data = file_get_contents('./assets/data/cart.json');
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



    <div class="bodyProd">

      <div class="prodPresentation">
        <img src="<?php echo $product->img?>" alt="">
      </div>

      <div class="prodDescrition">
        <div class="nomProduit">
          <h2><?php echo $product->name ?></h2>
          <p><?php echo $product->description ?></p>
        </div>
        <div class="mainProd">
          

          <div class="description">
            <div class="stock">
              <h5>En Stock!</h5>
            </div>
             
            <div class="price">
              <h3 class="realPrice"><?php echo $product->price ?>XAF</h3>
              <h4 class="dashPrice">21000 XAF</h4>
              <h5><?php if($work) {  ?>  <span>Great job</span><?php } else{?> <span>'Not yet'</span> <?php }?></h5>
            </div>

            <div class="color">
              <p>Les couleurs du produit</p>
               <div class="containerColor"> 
                <a href=""><div class="color-circle red"></div></a>
               <a href=""> <div class="color-circle blue"></div></a>
               <a href=""> <div class="color-circle green"></div></a>
               </div> 
            </div>
            <form method="post">
          <button type="submit" name="test" class="addKart">
              
                <img src="./assets/images/shopping-basket.png" alt="add_to_Kart">
                <p>Ajouter au Panier</p>
      </button>
      </form>
            
          </div>
           <div class="livraison">
              <form>
                <label for="ville"><img src="./assets/images/map-marked-alt-svgrepo-com (2).svg" alt=""> Ville de livraison :</label>
                <select id="ville" name="ville">
                  <option value="Douala">Douala</option>
                  <option value="yaounde">Yaounde</option>
                  <option value="buea">Buea</option>
                  <option value="bafoussam">Bafoussam</option>
                </select>
                <br>
                <br>
                <label for="quartier">Quartier :</label>
                <select id="quartier" name="quartier">
                  <option value="quartier1">Nyalla</option>
                  <option value="quartier2">Yassa</option>
                  <option value="quartier3">Bonamousadi</option>
                  <option value="quartier4">Kotto</option>
                  <option value="quartier5">Makepe</option>
                  <option value="quartier6">Komkana</option>
                  <option value="quartier7">Denver</option>
                  <option value="quartier8">Noa</option>
                </select>
                <br>
                <br>
                <img class="deliver" src="./assets/images/delivery-point-deliver-delivery-truck-delivery-location-svgrepo-com.svg" alt="">
                <p><STRong>Prix :</STRong></p>
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
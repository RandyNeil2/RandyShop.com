<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/style.css">
    <title>Document</title>
</head>
<?php $jsondata = file_get_contents('./assets/data/category.json');
  $categories = json_decode($jsondata);
  ?>
<body>
 
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
            <button class="dropbtn"><img src="" alt=""> Compte</button>
            <div class="dropdown-content">
              <a href="./register.php"><img src="" alt=""> S'inscrire</a>
              <a href="login.php"> <img src="" alt=""> Se connecter</a>
            </div>
          </div>

          <a href="./panier.php"> <img src="./assets/images/shopping-basket.png"kart></a>
    </nav>


          <header>
            <a href="">Top Vente</a>
            <a href="">Offre Gaming</a>
            <a href="">Top Marque</a>
            <a href="">CustomShop</a>
          </header>

<div class="body">

        <div class="top">
            <div class="categorie">
            <?php foreach ($categories as $category) {
  ?>
                <a href="./Categorie.php?item=<?php echo $category->name; ?>"><?php echo $category->name; ?></a>
                <?php }
  ?>
            </div>

            <div class="slider-container">
              <div class="slider">
                <img class="img"  src="./assets/images/CarousselImg/1.jpg" alt="Image 1">
                <img  class="img" src="./assets/images/CarousselImg/2.jpeg" alt="Image 2">
                <img class="img" src="./assets/images/CarousselImg/3.jpeg" alt="Image 3">
              </div>
              <div class="slider-controls">
              </div>
            </div>
              <div class="top-right">
                <div class="topLinks"></div>
                <div class="topLinks"></div>
              </div>
        </div>
          
        <div class="container">
            <div class="content">
              <div class="container_Carousel"><a href="./categorie.php"><img src="./assets/images/containerImg/Laptop_computer_SVG_Vector_Digital_Icon-removebg-preview.svg" alt="laptop"></a></div>
                <div class="container_Carousel"> <a href="./categorie.php"><img src="./assets/images/containerImg/Smart_Tv_Clipart_Transparent_Background__Smart_Led_Tv_Vector_Transparent_Background__Led_Tv_Png__Smart_Android_Tv_Png__Tv_Icon_Png_PNG_Image_For_Free_Download-removebg-preview.svg" alt="tv"></a></div>
                <div><a href="./categorie.php" class="container_Carousel"><img src="./assets/images/containerImg/Video_Game_Console_With_Gamepad_free_vector_icons_designed_by_Freepik-removebg-preview.svg" alt="Game"></a></div>
                <div><a href="./categorie.php" class="container_Carousel"><img src="./assets/images/containerImg/Wi-Fi_Logo_PNG_Vector__SVG__Free_Download-removebg-preview.svg" alt="Modem"></a></div>
                <div><a href="./categorie.php" class="container_Carousel"><img src="./assets/images/containerImg/Tshirt_free_icons_designed_by_iconixar-removebg-preview.svg" alt="Vetement"></a></div>
            </div>
            <!-- <button class="left-btn" onclick="scrollContent('left')">←</button>
            <button class="right-btn" onclick="scrollContent('right')">→</button> -->
          </div>

          <div class="event">
            <h3>Vente Flash</h3>
            <button><a href="">Voir Plus</a></button>
          </div>

          <div class="grid-container">
            <!-- <button class="left-btn" onclick="scrollContent('left')">←</button> -->
            <a href="./produit.php"><div class="product"> 
              <img class="product-img" src="" alt="">
             <div class='descriptionProd'><h3>Nom du Produit</h3>
              <p>descriptin</p>
              <h4>Prix:</h4></div>
            </div></a>

            <a href="./produit.php"><div class="product"> 
              <img class="product-img" src="" alt="">
             <div class='descriptionProd'><h3>Nom du Produit</h3>
              <p>descriptin</p>
              <h4>Prix:</h4></div>
            </div></a>
            

            <a href="./produit.php"><div class="product"> 
              <img class="prooduct-img" src="" alt="">
             <div class='descriptionProd'><h3>Nom du Produit</h3>
              <p>descriptin</p>
              <h4>Prix:</h4></div>
            </div></a>
            <!-- Ajoutez d'autres produits ici -->
            
            <!-- <button class="right-btn" onclick="scrollContent('right')">→</button> -->
          </div>


          <div class="pub">
            <div class="pubs">
              <!-- <a href="./categorie.php"><img class="imagePub" src="./assets/images/pubs/TVpubs.jpeg" alt="">
            </a>--></div> 
            <div class="pubs">
               <!-- <a href="./categorie.php"><img  class="imagePub" src="./assets/images/pubs/GamesPub.jpeg" alt="">
            </a>--></div> 
          </div>

          <div class="event">
            <h3>Vente Flash</h3>
            <button><a href="">Voir Plus</a></button>
          </div>
    
          <div class="grid-container">
           <a href="./produit.php"><div class="product"> 
              <img class="prooduct-img" src="" alt="">
             <div class='descriptionProd'><h3>Nom du Produit</h3>
              <p>descriptin</p>
              <h4>Prix:</h4></div>
            </div></a>
            <!-- <button class="left-btn" onclick="scrollContent('left')">←</button>
            <button class="right-btn" onclick="scrollContent('right')">→</button> -->
            </div>

            <div class="event">
                <h3>Vente Flash</h3>
                <button><a href="">Voir Plus</a></button>
              </div>
        
              <div class="grid-container">
                <a href="./produit.php"><div class="product"> 
                  <img class="prooduct-img" src="" alt="">
                 <h3>Nom du Produit</h3>
                  <p>descriptin</p>
                  <h4>Prix:</h4>
                </div></a>
                <!-- <button class="left-btn" onclick="scrollContent('left')">←</button>
                <button class="right-btn" onclick="scrollContent('right')">→</button> -->
                </div>


               <a href=""><div class="pub2">
                  
                </div>
              </a> 



                <div class="main">
            <div class="pubLeft">
            <!-- <img class="imagePub" src="./assets/images/pubs/consolesPub.jpeg" alt=""> -->
              <h4>Vetement Custom</h4>
              <img src="" alt="">
              <p>Lorem ipsum dolor sit amet 
                consectetur adipisicing elit. Exercitationem, cum.
              </p>
            </div>

            
                <div class="gridContainer">
                  <a href="./produit.php"><div class="product"> 
                    <img class="prooduct-img" src="" alt="">
                   <h3>Nom du Produit</h3>
                    <p>descriptin</p>
                    <h4>Prix:</h4>
                  </div></a>
                    
                  </div>

            </div>
            <div class="grid-container">
              <a href="./produit.php"><div class="product"> 
                <img class="prooduct-img" src="" alt="">
               <h3>Nom du Produit</h3>
                <p>descriptin</p>
                <h4>Prix:</h4>
              </div></a>
                
                </div>

                <div class=" marketing">
                    <div class="brand"><img src="./assets/images/Marketing/d.png" alt=""></div>
                    
                    <div class="brand"><img src="./assets/images/Marketing/f.png" alt=""></div>
                    
                    <div class="brand"><img src="./assets/images/Marketing/q.png" alt=""></div>
                    
                    <div class="brand"><img src="./assets/images/Marketing/s.png" alt=""></div>
                    
                </div>


                <div class="seo">
                    <h3>RandyShop</h3>



                    <p>
                      Bienvenue sur notre site de e-commerce! Découvrez une expérience d'achat exceptionnelle où la qualité, le choix et la satisfaction de nos clients sont notre priorité.
                       Parcourez notre large sélection de produits de haute qualité, trouvez les dernières tendances et laissez-vous inspirer par nos offres exclusives. Faites de chaque achat une expérience unique et enrichissante.
                        Rejoignez-nous dès aujourd'hui et laissez-vous séduire par le monde du shopping en ligne avec facilité et plaisir!
                    </p>
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

    <script src="./script/script.js"></script>
</body>
</html>
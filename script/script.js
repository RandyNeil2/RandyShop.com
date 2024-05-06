const slider = document.querySelector('.slider');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const slideWidth = slider.clientWidth;
let currentPosition = 0;

prevBtn.addEventListener('click', () => {
  currentPosition += slideWidth;
  if (currentPosition > 0) {
    currentPosition = -slideWidth * (slider.childElementCount - 1);
  }
  slider.style.transform = `translateX(${currentPosition}px)`;
});

nextBtn.addEventListener('click', () => {
  currentPosition -= slideWidth;
  if (currentPosition < -slideWidth * (slider.childElementCount - 1)) {
    currentPosition = 0;
  }
  slider.style.transform = `translateX(${currentPosition}px)`;
});
  
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName('dropdown-content');
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

  function scrollContent(direction) {
    const content = document.querySelector('.content');
    const scrollOffset = 50;
    
    if (direction === 'left') {
      content.scrollLeft -= scrollOffset;
    } else if (direction === 'right') {
      content.scrollLeft += scrollOffset;
    }
  }


  function afficherDiv(divId) {
    var divs = document.getElementsByClassName("content");
    for (var i = 0; i < divs.length; i++) {
      divs[i].style.display = "none";
    }
    document.getElementById(divId).style.display = "block";
  }




  function afficherFormulaire() {
    var ajouterProduitBtn = document.getElementById("ajouter-produit-btn");
    var overlay = document.getElementById("overlay");
    var formulaireContainer = document.getElementById("formulaire-container");
    
    ajouterProduitBtn.style.display = "none";
    overlay.style.display = "block";
    formulaireContainer.style.display = "block";
  }
  
  function cacherFormulaire() {
    var ajouterProduitBtn = document.getElementById("ajouter-produit-btn");
    var overlay = document.getElementById("overlay");
    var formulaireContainer = document.getElementById("formulaire-container");
    
    ajouterProduitBtn.style.display = "block";
    overlay.style.display = "none";
    formulaireContainer.style.display = "none";
  }
  
  function annulerEnregistrement() {
    var ajouterProduitBtn = document.getElementById("ajouter-produit-btn");
    var overlay = document.getElementById("overlay");
    var formulaireContainer = document.getElementById("formulaire-container");
    
    ajouterProduitBtn.style.display = "block";
    overlay.style.display = "none";
    formulaireContainer.style.display = "none";
  }

  
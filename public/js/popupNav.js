// Définition de la fonction "menu"
function menu() {
  // Sélection de l'élément avec la class "popupNav"
  var popupNav = document.getElementById("popupNav");

  // Vérification du style actuel de l'élément
  if (popupNav.style.display === "block") {
    // Si le style est "block", masquer l'élément en définissant le style sur "none"
    popupNav.style.display = "none";
  } else {
    // Sinon, afficher l'élément en définissant le style sur "block"
    popupNav.style.display = "block";
  }
}

// Sélection du bouton avec la classe "btnMenu" dans le document
var btnMenu = document.querySelector(".menuBurger");

// Vérification de l'existence du bouton
if (btnMenu) {
  // Ajout d'un écouteur d'événements au clic sur le bouton, appelant la fonction menu définie
  btnMenu.addEventListener("click", menu);
}

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

//Création d'une fonction nommée menu2 pour appuyer sur la photo
function menu2() {
  // Sélection de l'élément avec la class "popupPhoto"
  var popupPhoto = document.getElementById("popupPhoto");

  // Vérification du style actuel de l'élément
  if (popupPhoto.style.display === "block") {
    // Si le style est "block", masquer l'élément en définissant le style sur "none"
    popupPhoto.style.display = "none";
  } else {
    // Sinon, afficher l'élément en définissant le style sur "block"
    popupPhoto.style.display = "block";
  }
}

// Sélection du bouton avec la classe "btnPhoto" dans le document
var btnPhoto = document.getElementById("photo_profil");

// Vérification de l'existence du bouton
if (btnPhoto) {
  // Ajout d'un écouteur d'événements au clic sur le bouton, appelant la fonction menu définie
  btnPhoto.addEventListener("click", menu2);
}

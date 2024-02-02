// Sélection des éléments HTML
const daysTag = document.querySelector(".days"),
      currentDate = document.querySelector(".current-date"),
      prevNextIcon = document.querySelectorAll(".icons span");

// Initialisation de la date actuelle
let date = new Date(),
    currYear = date.getFullYear(),
    currMonth = date.getMonth();

// Tableau des noms des mois en français
const months = ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet",
                "Août", "Septembre", "Octobre", "Novembre", "Decembre"];

// Fonction pour rendre le calendrier
const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
        lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
        lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
        lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
    let liTag = "";

    // Ajoute les jours du mois précédent s'il y a des jours avant le premier jour du mois
    for (let i = firstDayofMonth; i > 0; i--) {
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    // Ajoute les jours du mois en cours
    for (let i = 1; i <= lastDateofMonth; i++) {
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }

    // Ajoute les jours du mois suivant s'il y a des jours après le dernier jour du mois
    for (let i = lastDayofMonth; i < 6; i++) {
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
    }

    // Met à jour le mois et l'année affichés
    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    
    // Met à jour le contenu HTML de l'élément avec la classe "days" avec les jours du mois
    daysTag.innerHTML = liTag;
};

// Appelle la fonction pour rendre le calendrier au chargement de la page
renderCalendar();

// Ajoute des écouteurs d'événements aux icônes de navigation précédente et suivante
prevNextIcon.forEach(icon => {
    icon.addEventListener("click", () => {
        // Modifie le mois en fonction de l'icône cliquée (précédent ou suivant)
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        // Si le mois est en dehors de la plage [0, 11], ajuste l'année et le mois en conséquence
        if (currMonth < 0 || currMonth > 11) {
            date = new Date(currYear, currMonth);
            currYear = date.getFullYear();
            currMonth = date.getMonth();
        } else {
            date = new Date();
        }

        // Appelle la fonction pour rendre le calendrier avec le mois mis à jour
        renderCalendar();
    });
});

const contenu = document.querySelector(".contenu");
const nom = document.querySelector("#nom");
const adresse = document.querySelector("#adresse");
const ville = document.querySelector("#ville");
const btnEnvoyer = document.querySelector("#envoyer");

btnEnvoyer.addEventListener("click", () => {
  envoieRestauTest(nom.value, adresse.value, ville.value);
});

function afficherRestau() {
  contenu.innerHTML = "";
  let url =
    "http://localhost/hb/PHP-intro/baseFramework2/examemPhp/?type=restaurant&action=index";

  fetch(url)
    .then((reponse) => reponse.json())
    .then((restaurants) => {
      console.log(restaurants);

      restaurants.forEach((restaurant) => {
        templateRestau = `<div>
        <hr>
            <h2>Nom du restaurant : ${restaurant.nom}</h2>
            <p><strong>${restaurant.adresse}</strong></p>
            <p><strong>${restaurant.ville}</strong></p>
            <button id="${
              restaurant.id
            }" class="btn btn-danger boutonSuppr"><strong>X</strong></button>
        ${afficherPlat(restaurant.plats)}<hr>
    </div>
    
   `;
        contenu.innerHTML += templateRestau;
      });
      document.querySelectorAll(".boutonSuppr").forEach((bouton) => {
        bouton.addEventListener("click", () => {
          supprimerRestau(bouton.id);
        });
      });
    });
}

function envoieRestauTest(nom, adresse, ville) {
  let urlVoiture =
    "http://localhost/hb/PHP-intro/baseFramework2/examemPhp/?type=restaurant&action=new";

  let bodyRequete = {
    nom: nom,
    adresse: adresse,
    ville: ville,
  };
  let requete = {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(bodyRequete),
  };
  fetch(urlVoiture, requete)
    .then((reponse) => reponse.json())
    .then((restaurant) => {
      console.log(restaurant);
      afficherRestau();
      document.querySelector("#nom").value = "";
      document.querySelector("#adresse").value = "";
      document.querySelector("#ville").value = "";
    });
}

function supprimerRestau(id) {
  let url =
    "http://localhost/hb/PHP-intro/baseFramework2/examemPhp/?type=restaurant&action=suppr";

  let bodyRequete = {
    id: id,
  };

  let requete = {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(bodyRequete),
  };
  fetch(url, requete)
    .then((reponse) => reponse.json())
    .then((donnees) => {
      afficherRestau();
    });
}

function afficherPlat(tableauPlats) {
  let plats = "";

  tableauPlats.forEach((plat) => {
    let template = `
    <div>
        <h3>Le plat :${plat.description}</h3>
        <p>le prix ${plat.price} € </p>
        <button id="${plat.id}" class="btn btn-danger boutonSuppr"><strong>X</strong></button></div>`;

    plats += template;
    document.querySelectorAll(".boutonSuppr").forEach((bouton) => {
      bouton.addEventListener("click", () => {
        console.log("coucou");
      });
    });
  });

  return plats;
}

function supprimerPlat(id) {
  let url =
    "http://localhost/hb/PHP-intro/baseFramework2/examemPhp/?type=plat&action=suppr";

  let bodyRequete = {
    id: id,
  };

  let requete = {
    method: "DELETE",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(bodyRequete),
  };
  fetch(url, requete)
    .then((reponse) => reponse.json())
    .then((donnees) => {
      console.log(donnees);
      afficherRestau();
    });
}

afficherRestau();

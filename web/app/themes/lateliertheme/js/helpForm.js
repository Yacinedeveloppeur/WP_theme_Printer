// management of form submission without use selection autoComplete

const submitTextarea = document.getElementById("btn-search-submit");
const textarea = document.getElementById("autoComplete");
const submitForm = document.getElementById("help-form");

submitForm.addEventListener("submit", function (e) {
  e.preventDefault();
  const textareaVal = document.getElementById("autoComplete").value;
  for (let index = 0; index < data.length; index++) {
    const element = data[index];
    if (
      element.code_barre_boite.toUpperCase() == textareaVal.toUpperCase() ||
      element.code_barre_cartouche.toUpperCase() == textareaVal.toUpperCase() ||
      element.modele_cartouche.toUpperCase() == textareaVal.toUpperCase()
    ) {
      return (document.querySelector(".selection").innerHTML =
        "<h2>Modèle de la cartouche : " +
        textareaVal +
        "</h2><p>" +
        element.description +
        "</p> <ul><li>Code barre de la boîte : " +
        element.code_barre_boite +
        "</li><li> Code barre de la cartouche : " +
        element.code_barre_cartouche +
        "</li></ul>");
    } else if (textareaVal == "") {
      document.querySelector(
        ".selection"
      ).innerHTML = `<p>Veuillez remplir le formulaire.</p>`;
    } else {
      document.querySelector(
        ".selection"
      ).innerHTML = `<p><strong>Aucun résultat trouvé pour <strong>"${textareaVal}"</strong></p>`;
    }
  }
});

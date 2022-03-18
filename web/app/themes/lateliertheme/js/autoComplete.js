// API Advanced Configuration Object
const keys = Object.keys(data[0]);

// The autoComplete.js Engine instance creator
const autoCompleteJS = new autoComplete({
  data: {
    src: data,
    keys: [keys[0], keys[1], keys[2]],
    cache: true,
    filter: (list) => {
      // Filter duplicates
      // incase of multiple data keys usage
      const filteredResults = Array.from(
        new Set(list.map((value) => value.match))
      ).map((modele_cartouche) => {
        return list.find((value) => value.match === modele_cartouche);
      });
      return filteredResults;
    },
  },
  placeHolder: "Ex: 32165465454",
  resultsList: {
    element: (list, data) => {
      const info = document.createElement("p");
      info.classList.add("results-count");
      if (data.results.length > 0) {
        info.innerHTML = `Affichage de <strong>${
          data.results.length
        }</strong> résultat${data.matches.length > 1 ? "s" : ""} sur <strong>${
          data.matches.length
        }</strong>`;
      } else {
        info.innerHTML = `<strong>${data.matches.length}</strong> résultat trouvé pour <strong>"${data.query}"</strong>`;
      }
      list.prepend(info);
    },
    noResults: true,
    maxResults: 15,
    tabSelect: true,
  },
  resultItem: {
    element: (item, data) => {
      // Modify Results Item Style
      item.style = "display: flex; justify-content: space-between;";
      // Modify Results Item Content
      item.innerHTML = `
        <span style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
          ${data.match}
        </span>
        <span style="display: flex; align-items: center; font-size: 13px; font-weight: 100; text-transform: uppercase; color: black;">
          ${data.key}
        </span>`;
    },
    highlight: true,
  },
  events: {
    input: {
      focus: () => {
        if (autoCompleteJS.input.value.length) autoCompleteJS.start();
      },
    },
  },
});

autoCompleteJS.input.addEventListener("selection", function (event) {
  const feedback = event.detail;
  autoCompleteJS.input.blur();
  // Prepare User's Selected Value
  const selection = feedback.selection.value[feedback.selection.key];
  const description = feedback.selection.value.description;
  const code_barre_boite = feedback.selection.value.code_barre_boite;
  const code_barre_cartouche = feedback.selection.value.code_barre_cartouche;
  const submit = document.getElementById("btn-search-submit");
  // Render selected choice to selection div
  submit.addEventListener("click", function (e) {
    e.preventDefault();
    const textareaValue = document.getElementById("autoComplete").value;
    if (textareaValue == selection) {
      document.querySelector(".selection").innerHTML =
        "<h2>Modèle de la cartouche : " +
        selection +
        "</h2><p>" +
        description +
        "</p> <ul><li>Code barre de la boîte : " +
        code_barre_boite +
        "</li><li> Code barre de la cartouche : " +
        code_barre_cartouche +
        "</li></ul>";
    } else {
      document.querySelector(
        ".selection"
      ).innerHTML = `<p><strong>Aucun résultat trouvé pour <strong>"${textareaValue}"</strong></p>`;
    }
  });
  // Replace Input value with the selected value
  autoCompleteJS.input.value = selection;
});

autoCompleteJS.searchEngine = "loose";
// strict or loose mode

// Blur/unBlur page elements
const action = (action) => {
  const title = document.querySelector("h1");
  const selection = document.querySelector(".selection");
  if (action === "dim") {
    title.style.opacity = 1;
    selection.style.opacity = 1;
  } else {
    title.style.opacity = 1;
    selection.style.opacity = 0.1;
  }
};

// Blur/unBlur page elements on input focus
["focus", "blur"].forEach((eventType) => {
  autoCompleteJS.input.addEventListener(eventType, () => {
    // Blur page elements
    if (eventType === "blur") {
      action("dim");
    } else if (eventType === "focus") {
      // unBlur page elements
      action("light");
    }
  });
});

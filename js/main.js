function verif() {
  const nom = document.getElementById("nom").value;
  const prenom = document.getElementById("prenom").value;
  // const age = document.getElementById("age").value;
  const moyenne = document.getElementById("moyenne").value;
  // const numero = document.getElementById("numero").value;

  if (!is_string(nom) || !is_string(prenom)) {
    alert("nom et prénom doive être alphabétiques");
    return false;
  }
  if (isNaN(moyenne)) {
    alert("Moyenne doit être Numérique entre 0 et 20");
    return false;
  }
}

function is_string(txt) {
  count = 0;
  for (let i = 0; i < txt.length; i++) {
    if ("A" <= txt[i].toUpperCase() && txt[i].toUpperCase() <= "Z") {
      count++;
    }
  }
  return txt.length == count;
}

function is_number(txt) {
  count = 0;
  point = true;
  for (let i = 0; i < txt.length; i++) {
    if ("0" <= txt[i] && txt[i] <= "9") {
      count++;
    } else if (point && txt[i] == ".") {
      count++;
      point = false;
    }
  }
  return txt.length == count;
}

try {
  const themeBtn = document.getElementById("theme-btn");
  const html = document.documentElement;
  if (html.getAttribute("theme") === "dark") {
    themeBtn.innerText = "Go Light";
    console.log("go light");
  } else {
    themeBtn.innerText = "Go Dark";
    console.log("go dark");
  }
} catch (error) {
  console.log("Error", error);
}

function changeTheme() {
  const themeBtn = document.getElementById("theme-btn");
  const html = document.documentElement;
  is_dark = html.getAttribute("theme") == "dark";
  if (is_dark) {
    html.setAttribute("theme", "light");
    window.localStorage.setItem("theme", "light");
    themeBtn.innerText = "Go Dark";
  } else {
    html.setAttribute("theme", "dark");
    window.localStorage.setItem("theme", "dark");
    themeBtn.innerText = "Go Light";
  }
}

// activate input on clicking his button
const btns = document.querySelectorAll(".edit-btn");
btns.forEach((btn) => {
  btn.addEventListener("click", () => {
    let input = btn.previousElementSibling;
    let is_disabled = input.hasAttribute("disabled");
    let is_important = input.hasAttribute("data-important");
    let is_confirm = true;

    if (is_important && is_disabled) {
      is_confirm = confirm(" > Sensitive data < , Do you Want to complete ?");
    }
    if (is_disabled && is_confirm) {
      input.removeAttribute("disabled");
      btn.style.opacity = "1";
      btn.style.backgroundColor = "rgba(180, 60, 60, 0.8)"; // background : red;
      btn.innerText = "Exit";
    } else {
      input.setAttribute("disabled", "");
      btn.style.opacity = "0.8";
      btn.style.backgroundColor = "";
      btn.innerText = "Edit";
    }
  });
});

// verify inputs values on submitting
function verif() {
  const nom = document.getElementById("nom").value;
  const prenom = document.getElementById("prenom").value;
  const moyenne = document.getElementById("moyenne").value;

  if (!is_string(nom) || !is_string(prenom)) {
    alert("nom et prénom doive être alphabétiques");
    return false;
  }
  if (isNaN(moyenne)) {
    alert("Moyenne doit être Numérique entre 0 et 20");
    return false;
  }
  // remove disabled attribute from inputs
  removeDisabled();
}

function verifIdNumero() {
  const idNumero = document.getElementById("idNumero").value;
  if (!is_number(idNumero)) {
    alert("  the select number is not valid !!  ");
    return false;
  }
}

function removeDisabled() {
  document.querySelectorAll(".text-input").forEach((input) => {
    input.removeAttribute("disabled");
  });
}

// verify is a string
function is_string(txt) {
  count = 0;
  for (let i = 0; i < txt.length; i++) {
    if ("A" <= txt[i].toUpperCase() && txt[i].toUpperCase() <= "Z") {
      count++;
    }
  }
  return txt.length == count;
}

// verify is a number
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

// parce the users info to the inputs after submitting the first form
function parceInfo(nom, prenom, age, moyenne, numero, idNumero) {
  document.getElementById("nom").value = nom;
  document.getElementById("prenom").value = prenom;
  document.getElementById("age").value = age;
  document.getElementById("moyenne").value = moyenne;
  document.getElementById("numero").value = numero;
  document.getElementById("idNumeroSec").value = idNumero;
}

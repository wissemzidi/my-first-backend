<!DOCTYPE html>
<html lang="en" theme="light">

<script src="js/mainFirst.js"></script>
<style>
  html[theme="light"] {
    --main-linear-bg: linear-gradient(20deg,
        rgba(114, 63, 255),
        rgba(58, 166, 255));
    background-image: var(--main-linear-bg);
    background-color: #eee;
  }

  /* dark theme */
  html[theme="dark"] {
    --main-linear-bg: linear-gradient(20deg, rgba(14, 10, 22), rgba(11, 17, 22));
    background-color: #222;
    background-image: var(--main-linear-bg);
  }
</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="./img/profile_pic.jpg" type="image/png">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/edit.css">
  <script defer src="./js/main.js"></script>
  <title>Edit Account</title>
</head>

<body>

  <header>
    <button id="theme-btn" onclick="changeTheme()" type="button" class="button theme-btn">Theme</button>
  </header>

  <main>
    <fieldset class="p-3" style="border-radius: 20px;">
      <legend>
        <h1 class="page-title" class="p-2">Edit Account</h1>
      </legend>
      <!-- action="./index.php"  -->
      <!-- old info -->
      <form method="post" onsubmit="return verifIdNumero()" name="firstForm" class="form-header">
        <input class="text-input" type="number" min="1" name="idNumero" id="idNumero" placeholder="numero to select" autofocus required />
        <button class="submit-btn" type="submit" name="numeroSubmitBtn">Send</button>
      </form>

      <form onsubmit="return verif()" name="editingForm" action="./edit-form.php" method="post" class="change-name-form d-grid gap-20">

        <hr style="margin-block: 1rem; border: none; border-bottom: 1px solid rgba(250, 250, 250, 0.2);">
        <!-- new info -->
        <div>
          <input class="text-input" type="text" name="nom" id="nom" placeholder="New name" readonly required />
          <button class="edit-btn" type="button" aria-pressed="false">Edit</button>
        </div>
        <div>
          <input class="text-input" type="text" name="prenom" id="prenom" placeholder="New Last name" readonly required />
          <button class="edit-btn" type="button">Edit</button>
        </div>
        <div>
          <input class="text-input" type="number" name="age" id="age" placeholder="New age" min="16" max="19" readonly required />
          <button class="edit-btn" type="button">Edit</button>
        </div>
        <div>
          <input class="text-input" type="text" name="moyenne" id="moyenne" placeholder="New Moyenne" readonly required />
          <button class="edit-btn" type="button">Edit</button>
        </div>
        <div>
          <input class="text-input" type="number" name="numero" id="numero" placeholder="New Number" data-important="true" readonly required />
          <button class="edit-btn" type="button">
            Edit
          </button>
        </div>

        <div class="d-flex align-c p-t-10 gap-1" style="justify-content: space-between; padding-right: 10px">
          <div>
            <a href="./index.php" class="submit-btn" style="text-decoration: none;">Home</a>
          </div>
          <div>
            <input class="text-input hidden-ele" type="number" name="idNumeroSec" id="idNumeroSec" aria-hidden="true" style="width: 0; height: 0; padding: 0;" />
            <button class="submit-btn" type="submit" name="submitBtn">Submit</button>
            <button class="submit-btn" type="reset">Reset</button>
          </div>
        </div>

      </form>
    </fieldset>
  </main>
</body>

<script src="./js/edit.js"></script>
<noscript>
  <p class="error">Please reactivate javascript because some of the website functionalities will not work !!</p>
</noscript>

</html>
<?php
require "./func.php";
if (isset($_POST['numeroSubmitBtn'])) {
  $conn = connectToDb();
  $idNumero = $_POST['idNumero'];
  if (!is_numeric($idNumero)) {
    mysql_close($conn);
    die("<p class='error'>Not today bro ;)</p>");
  } else {
    $Rq = "SELECT * FROM eleves WHERE Numero='$idNumero'";
    $res = mysql_query($Rq);

    // handle if the response is empty => no user found
    if (mysql_num_rows($res) < 1) {
      mysql_close($conn);
      die("<p class='error'>Number not found in our DB :(</p>");
    } else {
      while ($enreg = mysql_fetch_array($res)) {
        $nom = $enreg['Nom'];
        $prenom = $enreg['Prenom'];
        $age = $enreg['Age'];
        $moyenne = $enreg['Moyenne'];
        $numero = $enreg['Numero'];
        print("
          <script>
            parceInfo('$nom', '$prenom', '$age', '$moyenne', '$numero', '$idNumero');
          </script>");
        mysql_close($conn);
      }
    }
  }
}
?>
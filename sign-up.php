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
  <!-- <link href="css/style.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="./css/framework.css">
  <link rel="stylesheet" href="./css/sign-up.css">
  <script defer type="text/javascript" src="./js/main.js"></script>
  <title>Sign Up</title>
</head>

<body>
  <header>
    <button id="theme-btn" onclick="changeTheme()" type="button" class="button theme-btn">Theme</button>
  </header>

  <main>
    <fieldset class="p-3" style="border-radius: 20px;">
      <legend>
        <h1 class="page-title" class="p-2">Sign Up</h1>
      </legend>
      <!-- action="./index.php"  -->
      <form onsubmit="return verif()" method="post" class="change-name-form d-grid gap-20">
        <input class="text-input" type="text" name="nom" id="nom" placeholder="Your name" autofocus required />
        <input class="text-input" type="text" name="prenom" id="prenom" placeholder="Your Last name" required />
        <input class="text-input" type="number" name="age" id="age" placeholder="Your age" min="16" max="19" required />
        <input class="text-input" type="text" name="moyenne" id="moyenne" placeholder="Your Moyenne" required />
        <input class="text-input" type="number" name="numero" id="numero" placeholder="Your Number" required />

        <div class="d-flex align-c p-t-10 gap-1" style="justify-content: space-between; padding-right: 10px">
          <div>
            <a href="./index.php" class="submit-btn" style="text-decoration: none;">Home</a>
          </div>
          <div>
            <button class="submit-btn" type="submit" name="submitBtn">Submit</button>
            <button class="submit-btn" type="reset">Reset</button>
          </div>
        </div>

      </form>
    </fieldset>
  </main>
</body>

</html>

<?php
function setNewInfo($nom, $prenom, $age, $moyenne, $numero)
{
  $request = "INSERT INTO eleves (Nom, Prenom, Age, Moyenne, Numero) VALUES ('$nom', '$prenom', '$age', '$moyenne', '$numero')";
  mysql_query($request);

  if (mysql_errno() == '1062') {
    echo "<hr>";
    die("<span class='error'>Your Number is used before !</span>");
  } elseif (mysql_error()) {
    echo "<hr>";
    die("<span class='error'>An Error happened !!</span>");
  }
}


// 
// Main
require "func.php";
if (isset($_POST['submitBtn'])) {
  $conn = connectToDb();
  // getting inputs values
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $age = $_POST['age'];
  $moyenne = $_POST['moyenne'];
  $numero = $_POST['numero'];

  if (!verifInput($nom, $prenom, $age, $moyenne, $numero)) {
    echo ("<error class='error'>Not today bro ;)</error>");
    mysql_close($conn);
  } else {
    setNewInfo($nom, $prenom, $age, $moyenne, $numero);
    mysql_close($conn);
    goToMain();
  }
}
?>
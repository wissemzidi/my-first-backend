<!DOCTYPE html>
<html lang="en">

<style>
  html {
    background-image: linear-gradient(20deg,
        rgba(68, 0, 255, 0.75),
        rgba(0, 114, 207, 0.75));
  }
</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="./img/profile_pic.jpg" type="image/png">
  <link href="./css/framework.css" rel="stylesheet">
  <link href="./css/sign-in.css" rel="stylesheet">
  <script defer type="text/javascript" src="./js/main.js"></script>
  <title>Check Account</title>
</head>

<body>
  <header>

  </header>

  <main>
    <fieldset class="p-3" style="border-radius: 20px;">
      <legend>
        <h1 class="page-title" class="p-2">Check Account</h1>
      </legend>
      <!-- action="./index.php"  -->
      <form onsubmit="return verif()" method="post" class="change-name-form d-grid gap-20">
        <input class="text-input" type="text" name="nom" id="nom" placeholder="Your name" autofocus required />
        <input class="text-input" type="text" name="prenom" id="prenom" placeholder="Your Last name" required />
        <input class="text-input" type="number" name="age" id="age" placeholder="Your age" min="16" max="19" required />
        <input class="text-input" type="text" name="moyenne" id="moyenne" placeholder="Your Moyenne" required />
        <input class="text-input" type="number" name="numero" id="numero" placeholder="Your Number" min="0" required />

        <div class="d-flex align-c p-t-10 gap-1" style="justify-content: space-between; padding-right: 10px">
          <div>
            <a href="./index.php" class="submit-btn" style="text-decoration: none;">Home</a>
          </div>
          <div>
            <button class="submit-btn" type="submit" name="submitBtn">Check</button>
            <button class="submit-btn" type="reset">Reset</button>
          </div>
        </div>

      </form>
    </fieldset>
  </main>

</body>

</html>

<?php
// Main
require "./func.php";
if (isset($_POST['submitBtn'])) {
  $conn = connectToDb();

  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $age = $_POST['age'];
  $moyenne = $_POST['moyenne'];
  $numero = $_POST['numero'];

  if (!verifInput($nom, $prenom, $age, $moyenne, $numero)) {
    die("<error class='error'>Not today bro ;)</error>");
  };

  if (auth($nom, $prenom, $age, $moyenne, $numero)) {
    echo "<error class='error'>You account is in Our DB";
  } else {
    echo "<error class='error'>Your account isn't in Our Db";
  };
  mysql_close($conn);
}
?>
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
  <link href="css/DBusers.css" rel="stylesheet">
  <script defer src="./js/main.js"></script>
  <title>Users Accounts</title>
</head>

<body>
  <header>
    <button id="theme-btn" onclick="changeTheme()" type="button" class="button theme-btn">Theme</button>
    <a class="homeLink" href="./index.php">Return Home</a>
    <button class="homeLink" onclick="window.location.reload();" type="submit">Refresh</button>
  </header>

  <main>

    <?php
    function showDbContent()
    {
      $request = "SELECT * FROM eleves";
      $res = mysql_query($request);

      echo ("
    <table cellspacing=0 align='center' class='usersTable'>
      <tr class='usersTitles'>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Age</th>
        <th>Moy</th>
        <th>Num</th>
      </tr>
  ");
      while ($enreg = mysql_fetch_array($res)) {
        echo ("
      <tr>
        <td>" . $enreg['Nom'] . "</td>
        <td>" . $enreg['Prenom'] . "</td>
        <td>" . $enreg['Age'] . "</td>
        <td>" . $enreg['Moyenne'] . "</td>
        <td>" . $enreg['Numero'] . "</td>
      </tr>
    ");
      }
      echo "</table>";
    }
    // 
    // Main
    require "./func.php";
    $conn = connectToDb();
    showDbContent();
    mysql_close($conn);
    ?>


  </main>
</body>

</html>
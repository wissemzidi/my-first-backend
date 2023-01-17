<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/DBusers.css" rel="stylesheet">
    <title>Users Accounts</title>
  </head>
  <body>
    <header>
      <a class="homeLink" href="./index.php">Return Home</a>
      <button class="homeLink" onclick="window.location.reload();" type="submit">Refresh</button>
    </header>

    <main>

<?php
function showDbContent() {
  $request = "SELECT * FROM eleves";
  $res = mysql_query($request);

  echo ("
    <table cellspacing=0 align='center' class='usersTable'>
      <tr class='usersTitles'>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Age</th>
        <th>Moyenne</th>
        <th>Numero</th>
      </tr>
  ");
  while ($enreg = mysql_fetch_array($res)) {
    echo ("
      <tr>
        <td>".$enreg['Nom']."</td>
        <td>".$enreg['Prenom']."</td>
        <td>".$enreg['Age']."</td>
        <td>".$enreg['Moyenne']."</td>
        <td>".$enreg['Numero']."</td>
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
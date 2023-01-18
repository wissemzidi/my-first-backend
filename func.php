<?php
function connectToDb()
{
  require "./dbInfo.php";

  $conn = mysql_connect($hostName, $sqlName, $sqlPwd);
  if (!$conn) {
    die("<span class='error'>
        Our server is currently out of service. Please try again later
      </span>");
    return;
  }
  mysql_select_db($dbName);
  return $conn;
};


function auth($nom, $prenom, $age, $moyenne, $numero)
{
  $request = "SELECT * FROM eleves WHERE Nom='$nom' and Prenom='$prenom' and Age='$age' and Moyenne='$moyenne' and Numero='$numero'";
  $res = mysql_query($request);
  if ($res && mysql_num_rows($res) > 0) {
    return true;
  } else {
    return false;
  }
};


function verifInput($nom, $prenom, $age, $moyenne, $numero)
{
  $letters = $nom . $prenom;
  for ($i = 0; $i < strlen($letters); $i++) {
    if (!("A" <= strtoupper($letters[$i]) && strtoupper($letters[$i]) <= "Z")) {
      return false;
    }
  }
  $numbers = $age . $numero;
  if (strlen(intval($numbers)) != strlen($numbers)) {
    return false;
  }
  if (!floatval($moyenne)) {
    return false;
  }
  return true;
}


function goToMain()
{
  echo ("
  <script type='text/javascript'>
    window.location.href = './index.php';
  </script>
  ");
};

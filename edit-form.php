<?php
require "./func.php";

function editInfo($nom, $prenom, $age, $moyenne, $numero, $idNumero)
{
  $request = "UPDATE eleves SET Nom='$nom', Prenom='$prenom', Age='$age', 
    Moyenne='$moyenne', Numero='$numero' WHERE Numero='$idNumero'";
  mysql_query($request);

  if (mysql_errno() == '1062') {
    echo "<hr>";
    die("Your Number is used before !");
  } elseif (mysql_error()) {
    echo mysql_error();
    die("An Error happened !!");
  }
}

$conn = connectToDb();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$moyenne = $_POST['moyenne'];
$numero = $_POST['numero'];

// $idNumero = "<script>localStorage.getItem('idNumero');</script>";
$idNumero = $numero;

if (verifInput($nom, $prenom, $age, $moyenne, $idNumero)) {
  editInfo($nom, $prenom, $age, $moyenne, $numero, $idNumero);
  // goToMain();
} else {
  die("Not today Bro ;)");
}

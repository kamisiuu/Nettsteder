<?php
session_start();
if(!isset($_SESSION['loggedin'])){ //if login in session is not set
    header("Location: loginn.php");
}
?>
<?php

$servernavn = "localhost";
$brukernavn = "root";
$passord = "LuPa4(!195";
$dbnavn = "arbeidstimer";
$bruker_id = $_SESSION["bruker_id"];

// skap tilkobling
$tilkobling = new mysqli($servernavn, $brukernavn, $passord, $dbnavn);
// sjekk tilkobling
if ($tilkobling->connect_error) {
  die("tilkoblingen feilet: " . $conn->connect_error);
}
$arbeidsstedsnavnErr = "";
$arbeidsstedsnavn = "";
$ledigarbeidssted = false;


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["arbeidsstedsnavn"])){
      $arbeidsstedsnavnErr = "Du må skrive inn navnet på arbeiddstedet";
    } else {
      $arbeidsstedsnavn = test_input($_POST["arbeidsstedsnavn"]);
      $user = mysql_fetch_array(mysql_query("SELECT * FROM arbeidssted WHERE arbeidsstedsnavn='$arbeidsstedsnavn'"));
      // sjekk om arbeidsstedsnavn inneholder bare bokstaver og mellomrom
      if(!preg_match("/[a-zA-Z ]*$/", $arbeidsstedsnavn)){
        $arbeidsstedsnavnErr = "Det er tillatt med bare bokstaver og mellomrom";
      }elseif ($user>=1) {
        $ledigarbeidssted = false;
      }
      elseif($user==0){
        $ledigarbeidssted = true;
      }
    }
}

if($ledigarbeidssted == true){

  $sql = "INSERT INTO arbeidssted (arbeidsstedsnavn, bruker_id) VALUES ('$arbeidsstedsnavn','$bruker_id') ";
  $result = $tilkobling->query($sql);
}
if($ledigarbeidssted == false){
  $arbeidsstedsnavnErr = "Dette arbeidsstedet er allerede brukt";
}

function test_input($data) {
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$tilkobling->close();

header("Location: index.php");
?>

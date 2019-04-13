<?php
session_start();
if(!isset($_SESSION["loggedin"])){
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

$regnStartDato = "";
$regnSluttDato = "";
$newDate = "";
$newDate2 = "";
$regnStartDatoErr = "";
$regnSluttDatoErr = "";
$regnStartDatoKlar = false;
$regnSluttDatoKlar = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty($_POST["regnStartDato"])){
  $regnStartDatoErr="Du har ikke valgt noen dato";
  }else{
  $regnStartDato  = test_input($_POST["regnStartDato "]);

  $newDate = date("Y-m-d", strtotime($regnStartDato));

}

if(empty($_POST["regnSluttDato"])){
  $regnSluttDatoErr=" Du har ikke valgt noen dato";
}else{
  $regnSluttDato = test_input($_POST["regnSluttDato"]);
$newDate2 = date("Y-m-d", strtotime($regnSluttDato));


}
}

if($startDatoKlar && $sluttDatoKlar == true ){

  $sql = "INSERT INTO arbeidsdag (arbeidsstedID, bruker_id, startarbeidsdag, sluttarbeidsdag) VALUES('0','$bruker_id','$newDate', '$newDate2') ";
  $result = $tilkobling->query($sql);
}
if($startDatoKlar && $sluttDatoKlar == false ){
  $startDatoErr="h";
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$tilkobling->close();

header("Location: index.php");
?>

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

$startDato = "";
$sluttDato = "";
$newDate = "";
$newDate2 = "";
$startDatoErr = "";
$sluttDatoErr = "";
$startDatoKlar = false;
$sluttDatoKlar = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty($_POST["startDato"])){
  $startDatoErr="det er ingen dato";
  }else{
  $startDato = test_input($_POST["startDato"]);

$newDate = date("Y-m-d H:i", strtotime($startDato));
  $checkDato = mysqli_fetch_array(mysqli_query("SELECT * FROM arbeidsdag WHERE bruker_id='$bruker_id' AND startarbeidsdag='$newDate'"));
  if($checkDato!=0){
    $startDatoKlar=false;
  }else{
    $startDatoKlar=true;
  }
}

if(empty($_POST["sluttDato"])){
  $sluttDatoErr=" det er ingen dato";
}else{
  $sluttDato = test_input($_POST["sluttDato"]);
$newDate2 = date("Y-m-d H:i", strtotime($sluttDato));

  $checkDatoa = mysqli_fetch_array(mysqli_query("SELECT * FROM arbeidsdag WHERE  bruker_id='$bruker_id' AND sluttarbeidsdag='$newDate2'"));
  if($checkDatoa!=0){
    $sluttDatoKlar=false;
  }else{
    $sluttDatoKlar=true;
  }
}
}

if($startDatoKlar && $sluttDatoKlar == true ){

  $sql = "INSERT INTO arbeidsdag (arbeidsstedID, bruker_id, startarbeidsdag, sluttarbeidsdag, anTimer) VALUES('0','$bruker_id','$newDate', '$newDate2',
    (SELECT TIMESTAMPDIFF(SECOND,'$newDate','$newDate2'))) ";

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

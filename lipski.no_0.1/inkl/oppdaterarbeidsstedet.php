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

$tilkobling= new mysqli($servernavn, $brukernavn, $passord, $dbnavn);

if ($tilkobling->connect_error) {
  die("tilkoblingen feilet: " . $conn->connect_error);
}

$asnavn2 =  "";
$selectcomponent2 = "";
$asnavn2Err ="";
$selectcomponent2Err = "";
$askanoppdateres = false;
$askanoppdateres2 = false;


if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty($_POST["select2"])){
    $selectcomponent2Err = "Du må skrive inn navnet på arbeiddstedet";
  } else {
    $selectcomponent2 = test_input($_POST["select2"]);
    $usera = mysqli_fetch_array(mysqli_query("SELECT * FROM arbeidssted WHERE bruker_id='$bruker_id'"));
    if($usera!=0){
      $askanoppdateres2= false;
    }else{
      $askanoppdateres2= true;
    }
}


if(empty($_POST["asnavn2"])){
  $asnavn2Err = "Du må skrive inn navnet på arbeiddstedet";
} else {
    $asnavn2 = test_input($_POST["asnavn2"]);
    $user= mysqli_fetch_array(mysqli_query("SELECT * FROM arbeidssted WHERE bruker_id='$bruker_id'"));
    if($user!=0){
      $askanoppdateres = false;
    }else{
      $askanoppdateres = true;
    }
}
}





if($askanoppdateres && $askanoppdateres2 == true){
 $sql="UPDATE arbeidssted SET arbeidsstedsnavn ='$asnavn2' WHERE bruker_id='$bruker_id' AND arbeidsstedsnavn='$selectcomponent2' ";
$result = $tilkobling->query($sql);
}
if($askanoppdateres && $askanoppdateres2 == false){
    $asnavn2Err = "Du har ikke fylt ut feltet";
}



function test_input($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$tilkobling->close();

header("Location: index.php");
 ?>

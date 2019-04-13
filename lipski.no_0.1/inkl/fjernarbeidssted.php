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
$kanslettes = false;


if ($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty($_POST["select-component"])){
  $arbeidsstedsnavnErr = "";
}else{
      $arbeidsstedsnavn = test_input($_POST["select-component"]);
      $user = mysqli_fetch_array(mysqli_query("SELECT * FROM arbeidssted WHERE bruker_id='$bruker_id'"));
      // sjekk om arbeidsstedsnavn inneholder bare bokstaver og mellomrom

        if ($user!=0) {
        $kanslettes = false;
      }else{
        $kanslettes = true;
      }
    }
}

if($kanslettes == true){

  $sql = "DELETE FROM arbeidssted WHERE bruker_id='$bruker_id' AND arbeidsstedsnavn='$arbeidsstedsnavn'";
  $result = $tilkobling->query($sql);
}
if($kanslettes== false){
  $arbeidsstedsnavnErr = "Dette arbeidsstedet er allerede brukt";
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

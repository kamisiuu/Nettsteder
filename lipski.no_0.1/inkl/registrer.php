<?php

session_start();

if(isset($_SESSION["loggedin"])){
	header("Location: loginn.php");
}

$connection = mysql_connect("localhost", "root", "LuPa4(!195") or die("Error kunne ikke koble til serveren");
mysql_select_db("arbeidstimer", $connection) or die("Error , kunne ikke koble til databasen");

$emailErr = $emailErr2 = $passwordErr = $passwordErr2 = $nameErr = "";
$name = $email = $email2 = $password = $password2 = "";
$ledigepost = $likemail2 = $riktigpassordformat = $likpassord2 = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {

	if(empty($_POST["name"])) {
		$nameErr= "Du må skrive navnet ditt";
	}else {
		 $name = test_input($_POST["name"]);
		 if(!preg_match("/^[a-zA-Z]*$/", $name)) {
			$nameErr="Du skrev feil format av tekst";
		 }
	}

	if(empty($_POST["email"])) {
		$emailErr = "email er nødvendig for å registrere deg";
	}else {
		$email= test_input($_POST["email"]);
		$user = mysqli_fetch_array(mysql_query("SELECT * FROM bruker WHERE epost='$email'"));
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailErr= "Du skrev feil format av epostadresse";
		}elseif($user != 0) {
			$emailErr= "Denne epostadressen er opptatt";
		}else{
			$ledigepost= true;
		}
	}

	if (empty($_POST["email2"])) {
		$emailErr2="du må bekrefte eposten din";
	}else {
		$email2 = test_input($_POST["email2"]);
		if($email2 !== $email) {
			$emailErr2="epostadressene dine er forskjellige";
			$likemail2=false;
		}
		$likemail2=true;
	}

	if(empty($_POST["password"])) {
		$passwordErr="du må fylle ut dette feltet";
	}else {
		$password = test_input($_POST["password"]);
		if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)){
			$passwordErr="passordet ditt skal minst bestå av 8 tegn, små og store bokstaver og spesielle tegn";
			$riktigpassordformat=false;
		}
		$riktigpassordformat=true;
	}

	if (empty($_POST["password2"])) {
		$passwordErr2="du må bekrefte passordet ditt";
	}else {
		$password2 = test_input($_POST["password2"]);
		if($email2 !== $email) {
			$emailErr2="passordene dine er forskjellige";
			$likpassord2= false;
		}
		$likpassord2= true;
	}

	if( $user==0 && $ledigepost && $likemail2 && $riktigpassordformat && $likpassord2==true ){
		$passwordHash = hash("sha512", $password);
		mysql_query("INSERT INTO bruker (navn, epost , passord) VALUES ('$name', '$email', '$passwordHash')");

		header("Location: loginn.php");

	}

}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


?>

<!DOCTYPE html>
<html lang="no">
<head>

  <title>lipski.no</title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/minstil.css" type="text/css">
  <link rel="stylesheet" href="css/loginn.css" type="text/css">

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

   <style>
.error {color: #FF0000;}
</style>

</head>
<body id="myPage" class="backgroundblue2">

<nav class="navbar navbar-default navbar-fixed-top bottom-line" >

  <div class="container">

    <div class="navbar-header ">
      <button type="button" class="navbar-toggle navbar-fixed-top" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<a class="navbar-brand" href="../index.php">lipski.no</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
       <?php
						if(!isset($_SESSION['loggedin'])){ //if login in session is not set
					?>
					<li><a href="registrer.php"><span class="glyphicon glyphicon-user"></span> Registrering</a></li>
					<li><a href="loginn.php"><span class="glyphicon glyphicon-log-in"></span> Logg inn</a></li>
					<?php
					} else{
					?>
					<li><a href="index.php"><span class="glyphicon glyphicon-user"></span> <?php echo ucfirst($_SESSION['navn']); ?></a></li>
					<li><a href="loggut.php"><span class="glyphicon glyphicon-log-out"></span> Logg ut</a></li>
					<?php
					}
					?>
    </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center ">

<h3 class="textshadow text-center">Registrer deg</h3>
        <div class="card card-container boxshadow">


            <p id="profile-name" class="profile-name-card"></p>


<!-- snip -->
            <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            	<input  type="text" name="name" id="inputEmail" class="form-control" placeholder="Navn" required autofocus>
                  <span  class="error text-center "><?php echo  $nameErr ;?></span>

                <input  type="email" name="email" id="inputEmail" class="form-control" placeholder="Epost" required autofocus>
                  <span  class="error text-center "><?php echo  $emailErr ;?></span>

                <input  type="email" name="email2" id="inputEmail" class="form-control" placeholder="Bekreft eposten" required autofocus>
				  <span  class="error text-center "><?php echo  $emailErr2 ;?></span>

                <input  type="password" name="password" id="inputPassword" class="form-control" placeholder="Passord" required>
                  <span  class="error text-center "><?php echo  $passwordErr ;?></span>

                <input  type="password" name="password2" id="inputPassword" class="form-control" placeholder="Bekreft passordet" required>
				 <span  class="error text-center "><?php echo  $passwordErr2 ;?></span>

                <span  class="error text-center ">

					  </span>
                <div id="remember" class="checkbox">

                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" value="Submit">Registrer deg som ny bruker!</button>
            </form><!-- /form -->
            <a href="loginn.php" class="forgot-password">
               Logg inn
            </a>
        </div><!-- /card-container -->

    </div><!-- /container -->


















<footer class="container-fluid text-center" >

  <br>

    <a href="https://www.facebook.com/kamisiuu"><i class="fa fa-facebook-square fa-inverse fa-4x" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/kamisiuu/"><i class="fa fa-instagram fa-inverse fa-4x" aria-hidden="true"></i></a>
        <a href="https://no.linkedin.com/in/kamil-lipski-81187b54"><i class="fa fa-linkedin-square fa-inverse fa-4x" aria-hidden="true"></i></a>
  <p> Copyright © Kamil Lipski 2016 </p>
</div>
</footer>


</body>
</html>

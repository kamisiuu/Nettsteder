<?php
session_start();
if(isset($_SESSION['loggedin'])){ //if login in session is not set
    header("Location: index.php");
}

// Kobler til databasen
$connection = mysql_connect("localhost", "root", "LuPa4(!195") or die("Error, kunne ikke koble til server!");
mysql_select_db("arbeidstimer", $connection) or die("Kunne ikke koble til database!");

$emailErr = $passwordErr = "";
$pic = $email = $password = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

	if(empty($_POST["email"])) {
		$emailErr= "epost er nødvendig for å logge inn";
	} else {
		$email= test_input($_POST["email"]);
		$user = mysql_fetch_array(mysql_query("SELECT * FROM `bruker` WHERE `epost`='$email'"));
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      	$emailErr = "feil format av epostadressen din";
        }elseif($user == 0) {
         	$emailErr = "dette brukernavnet finnes ikke";
        }elseif($user >= 1) {
        		$_SESSION["emailValid"] = true;

        		$pic=$user["pic"];

        }



    }

	if(empty($_POST["password"])) {
		$passwordErr= "passord er nødvendig for å logge inn";
	} else {
		$passwordHash = hash("sha512", $_POST["password"]);
		$password= test_input($passwordHash);

		$user2 = mysql_fetch_array(mysql_query("SELECT * FROM `bruker` WHERE `passord`='$password' and `epost`='$email'"));

		if($user == 0 && $user2 == 0) {
         $passwordErr = "";
        }
        elseif($user2 == 0) {
         $passwordErr = "du skrev feil passord prøv igjen";
        }
        elseif($user2 >= 1) {
        	$_SESSION["passwordValid"] = true;
        	$bruker_id= $user["bruker_id"];
        	$navn= $user["navn"];

        }
	}


	if($_SESSION["emailValid"] && $_SESSION["passwordValid"] == true && $user && $user2 > 1){

		$userID = $user['bruker_id'];
		mysql_query("UPDATE `bruker` SET `user_salt`='$salt' WHERE `bruker_id`='$userID'");
		$_SESSION["loggedin"] = true;
		$_SESSION['bruker_id'] = $bruker_id;
		$_SESSION['navn'] = $navn;

		header("Location: index.php");
	}




}
function test_input($data) {
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



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

<h3 class="textshadow text-center">Logg deg inn</h3>
        <div class="card card-container boxshadow">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
				<?php if($pic==null){echo  "<img id='profile-img' class='profile-img-card' src='//ssl.gstatic.com/accounts/ui/avatar_2x.png'";
				}
				else{
					echo "<img id='profile-img' class='profile-img-card' src='data:image/jpeg;base64 " . base64_encode(stream_get_contents($pic)) . "'/>";

					}
				?>


            <p id="profile-name" class="profile-name-card"></p>

            <form id="contactForm" class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

         		<input  type="email" name="email" id="inputEmail" class="form-control" placeholder="Brukernavn" required autofocus>





               <input  type="password" name="password" id="inputPassword" class="form-control" placeholder="Passord" required>





              <div class="alert alert-danger" role="alert" id="myAlert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p>
                <?php
                    echo $emailErr;
                    echo $passwordErr;
                ?>
              </p>
              </div>



            <script>
    $(document).ready(function(){
        $(".close").click(function(){
            $("#myAlert").alert("close");
        });
    });
    </script>
<script>

  var emailError = "<?php echo $emailErr; ?>";
  var passwordErr = "<?php echo $passwordErr; ?>";
  if(emailError == "" && passwordErr == ""){
$("#myAlert").hide();
  }else{
    $("#myAlert").show();
  }
</script>




                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" value="Submit">La oss starte!</button>
            </form><!-- /form -->

			  <script>
$(document).ready(function() {
    $('#contactForm').formValidation({
        framework: 'bootstrap',
        err: {
            container: function($field, validator) {
                // Look at the markup
                //  <div class="col-xs-4">
                //      <field>
                //  </div>
                //  <div class="col-xs-5 messageContainer"></div>
                return $field.parent().next('.messageContainer');
            }
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    },
                    stringLength: {
                        max: 100,
                        message: 'The title must be less than 100 characters long'
                    }
                }
            }
        }
    });
});
</script>

            <a href="#" class="forgot-password">
                Har du glemt ditt passord?
            </a>
                <br>
             <a href="registrer.php" class="forgot-password">
               Er du ikke registrert ? Registrer deg her !
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

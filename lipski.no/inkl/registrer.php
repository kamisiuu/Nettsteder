
<!DOCTYPE html>
<html lang="no">
<title>Timeregistrering</title>
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/bootstrap-material-design.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

    <link rel="stylesheet" href="./css/bootstrap-material-datetimepicker.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
    <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap-material-datetimepicker.js"></script>
</head>
<body style="background-color:#ffffff;">

<nav class="navbar navbar-default" >

  <div class="container-fluid">

    <div class="navbar-header ">
      <button type="button" class="navbar-toggle navbar-fixed-top" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<a class="navbar-brand" href="../index.php">LIPSKI.NO</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
       					<li><a href="registrer.php"><span class="glyphicon glyphicon-user"></span> Registrering</a></li>
					<li><a href="loginn.php"><span class="glyphicon glyphicon-log-in"></span> Logg inn</a></li>
					    </ul>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class=" col-sm-2 col-sm-2 col-md-3 col-lg-4"></div>
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
            <h3 class="text-center">Registrering</h3>
            <br><br>

            <form role="form" method="post" action="/inkl/registrer.php">
                <div class="form-group">
                    <div class="form-control-wrapper">
            	        <input  type="text" name="name" id="inputName" class="form-control floating-label" placeholder="Navn" required autofocus>
                    </div>
                    <div class="alert alert-danger alert-dismissible text-center" id="nameAlert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>!</strong>
                    </div>
                </div>
                <script>
                    var nameErr= "";
                    if(!nameErr == ""){
                        $("#nameAlert").fadeIn("slow");
                    }else{
                        $("#nameAlert").alert("close");
                    }
                    $("#inputName").on("click keypress", function ( event ) {
                        $("#nameAlert").alert("close");
                    });

                </script>

                <div class="form-group">
                    <div class="form-control-wrapper">
                        <input  type="email" name="email" id="inputEmail" class="form-control floating-label" placeholder="Epost" required autofocus>
                    </div>
                    <div class="alert alert-danger alert-dismissible text-center" id="emailAlert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong></strong>
                    </div>
                </div>
                <script>
                    var emailErr="";
                    if(!emailErr == ""){
                        $("#emailAlert").fadeIn("slow");
                    }else{
                        $("#emailAlert").alert("close");
                    }
                    $("#inputEmail").on("click keypress",function ( event ) {
                       $("#emailAlert").alert("close");
                    });
                </script>

                <div class="form-group">
                    <div class="form-control-wrapper">
                        <input  type="email" name="email2" id="inputEmail2" class="form-control floating-label" placeholder="Bekreft eposten" required autofocus>
                    </div>
                    <div class="alert alert-danger alert-dismissible text-center" id="emailAlert2">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong></strong>
                    </div>
                </div>
                <script>
                    var emailErr = "";
                    if(!emailErr == ""){
                        $("#emailAlert2").fadeIn("slow");
                    }else{
                        $("#emailAlert2").alert("close");
                    }
                    $("#inputEmail2").on("click keypress", function ( event ) {
                        $("#emailAlert2").alert("close");
                    });
                </script>

                <div class="form-group">
                    <div class="form-control-wrapper">
                        <input  type="password" name="password" id="inputPassword" class="form-control floating-label" placeholder="Passord" required>
                    </div>
                    <div class="alert alert-danger alert-dismissible text-center" id="passwordAlert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong></strong>
                    </div>
                </div>
                <script>
                    var passwordErr = "";
                    if(!passwordErr == ""){
                        $("#passwordAlert").fadeIn("slow");
                    }else{
                        $("#passwordAlert").alert("close");
                    }
                    $("#inputPassword").on("click keypress", function ( event ) {
                        $("#passwordAlert").alert("close");
                    });
                </script>

                <div class="form-group">
                    <div class="form-control-wrapper">
                        <input  type="password" name="password2" id="inputPassword2" class="form-control floating-label" placeholder="Bekreft passordet" required>
                    </div>
                    <div class="alert alert-danger alert-dismissible text-center" id="passwordAlert2">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong></strong>
                    </div>
                </div>
                <script>
                    var passwordErr2 = "";
                    if(!passwordErr2 == ""){
                        $("#passwordAlert2").fadeIn("slow");
                    }else{
                        $("#passwordAlert2").alert("close");
                    }
                    $("#inputPassword2").on("click keypress", function ( event ) {
                        $("#passwordAlert2").alert("close");
                    });
                </script>
                <br><br>
                <div class="text-center">
                    <button class="btn btn-success" type="submit" value="Submit">Registrer deg som ny bruker!</button>
                </div>
                <br>
                <div class="text-center">
                    <a href="loginn.php" class="forgot-password">
                    Er du allerede en bruker? Logg inn
                    </a>
                </div>

            </form><!-- /form -->
        </div>
        <div class=" col-sm-2 col-sm-2 col-md-3 col-lg-4"></div>
    </div>

</div>


















<footer class="container-fluid text-center" >

  <br>

    <a href="https://www.facebook.com/kamisiuu"><i class="fa fa-facebook-square fa-inverse fa-4x" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/kamisiuu/"><i class="fa fa-instagram fa-inverse fa-4x" aria-hidden="true"></i></a>
        <a href="https://no.linkedin.com/in/kamil-lipski-81187b54"><i class="fa fa-linkedin-square fa-inverse fa-4x" aria-hidden="true"></i></a>
  <p> Copyright © Kamil Lipski 2017 </p>

</footer>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script type="text/javascript">
    $(document).ready(function()
    {
        $.material.init()
    });
</script>
</body>
</html>

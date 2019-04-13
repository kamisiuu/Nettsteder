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
            <h3 class="text-center">Innlogging</h3>
<br><br>
            <form role="form" method="post" action="/inkl/loginn.php">
                <div class="form-group">
                    <div class="form-control-wrapper">
                        <input type="text"  name="email" id="emailInput" class="form-control floating-label" placeholder="Epost" required autofocus>
                    </div>
                    <div class="alert alert-danger text-center" role="alert" id="emailAlert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>
                                                    </p>
                    </div>
                </div>
                <script>
                    var emailErr="";
                    if(!emailErr==""){
                        $("#emailAlert").show();
                    }else{
                        $("#emailAlert").alert("close");
                    }
                    $("#emailInput").on("click keypress",function ( event ) {
                        $("#emailAlert").alert("close");
                    });
                </script>
                <div class="form-group">
                    <div class="form-control-wrapper">
                        <input type="password" name="password" id="passwordInput" class="form-control floating-label" placeholder="Passord">
                    </div>
                    <div class="alert alert-danger text-center" role="alert" id="passwordAlert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>
                                                    </p>
                    </div>
                </div>
                <script>
                    var passwordErr="";
                    if(!passwordErr==""){
                        $("#passwordAlert").show();
                    }else{
                        $("#passwordAlert").alert("close");
                    }
                    $("#passwordInput").on("click keypress",function ( event ) {
                        $("#passwordAlert").alert("close");
                    });
                </script>

                <br><br>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Logg inn</button>
                </div>
                <div class="text-center">
                    <a href="glemt-passord.php" class="forgot-password">
                        Har du glemt ditt passord?
                    </a>
                    <br>
                    <a href="registrer.php" class="forgot-password text-center">
                        Er du ikke registrert ? Registrer deg her !
                    </a>
                </div>
            </form>
        </div>
        <div class=" col-sm-2 col-sm-2 col-md-3 col-lg-4"></div>
    </div>

</div>





<script>
    $(document).ready(function(){
        $(".close").click(function(){
            $("#myAlert").alert("close");
        });
    });
</script>
<script>

  var emailError = "";
  var passwordErr = "";
  if(emailError == "" && passwordErr == ""){
$("#myAlert").alert("close");
  }else{
    $("#myAlert").show();
  }
</script>













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

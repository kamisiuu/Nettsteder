<?php
// Starter sessjon.
session_start();

?>

<!DOCTYPE html>
<html lang="no">
<head>

  <title>lipski.no</title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">

  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/minstil.css" type="text/css">

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <!-- Custom CSS -->

  <link rel="stylesheet" href="css/circle.css">
  <style>
  /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }



  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none;
    }
  }
  </style>
</head>
<body id="myPage">

<nav class="navbar navbar-default navbar-fixed-top bottom-line boxshadow " >

  <div class="container">

    <div class="navbar-header navbar-left ">
      <button type="button" class="navbar-toggle navbar-fixed-top" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">

        <li><a class="scroll-page" href="#ommeg">OM MEG</a></li>
        <li><a class="scroll-page" href="#dokumenter">DOKUMENTER</a></li>
        <li><a class="scroll-page" href="#ferdigheter">FERDIGHETER</a></li>
        <li><a class="scroll-page" href="#kontakt">KONTAKT</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

      <?php
					// Sjekker om du er logget inn eller ikke. Hvis du er logget inn så får man opp brukernavn og mulighet til og logget ut.
						if(!isset($_SESSION['loggedin'])){ //if login in session is not set
					?>
					<li><a href="inkl/registrer.php"><span class="glyphicon glyphicon-user"></span> Registrer</a></li>
					<li><a href="inkl/loginn.php"><span class="glyphicon glyphicon-log-in"></span> Logg inn</a></li>
					<?php
					} else{
					?>
					<li><a href="inkl/index.php"><span class="glyphicon glyphicon-user"></span> <?php echo ucfirst($_SESSION['navn']); ?></a></li>
					<li><a href="inkl/loggut.php"><span class="glyphicon glyphicon-log-out"></span> Logg ut</a></li>
					<?php
					}
					?>
    </ul>


    </div>
  </div>
</nav>

  <div class="backgroundblue2 container-fluid text-center boxshadow " >
<h1 style="color:#fff;">NYHETER</h1>
      <br><br>  <br><br> <br>

      <div id="myCarousel" class="carousel slide text-center container-fluid" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <div class="container1">
        <h4 style="color:#fff;">"Hei! Jeg heter Kamil og jeg studerer Design og utvikling av it-systemer på Høyskolen i Østfold"</h4>
        </div>
      </div>
      <div class="item">
        <div class="container1">
        <h4 style="color:#fff;">"Jeg og mine medstudenter vant Laurbærbladet!"<br><span style="font-style:normal;">Jov Vegard Gribsrød, Lasse Andre Fløien, Mohamad Haissam Jalloul, Kamil Lipski, Jim E. Melby</span></h4>
      </div>
      </div>

      <div class="item">
        <div class="container1">
        <h4 style="color:#fff;">"Trenger du hjelp med pc eller kanskje designe din egen nettside, ta kontakt!"<br><span style="font-style:normal;"></span>Ferdigheter:
           Lage interaktive nettsteder, webapplikasjoner, lage mobilapplikasjoner i Java, koble alt opp mot databaser</h4>

         </div>
      </div>

    </div>


  </div>

</div>

<!-- Container (About Section) -->
<div id="ommeg" class="container-fluid bg-black boxshadow">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<h2 style="color:#fff;" class="text-center">Om meg</h2>
      <br><br>
    </div>

  </div>
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
      <img src="img/me.jpg" width="275" height="350" class="img-rounded boxshadow slide">
      <h4 style="color:#fff;">Kamil Lipski</h4>
<br><br>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">



      <h4 style="color:#fff;">
        Jeg er en 24 år gammel mann som tar bachelorstudium i Informatikk på Høyskolen i Østfold. Underveis i dette studiet
        har jeg lært å forstå, utvikle, drifte og reparere it-systemer. Jeg lærer også om planlegging av store IT-systemer hvor flere systemer
        kan snakke sammen, men hovedfokuset i studiet er likevel lagt på systemutvikling og programmering.
      </h4>
      <h4 style="color:#fff;">
        Mine kollegaer og jeg fra studiet har nylig blitt ferdig med å skrive bacheloroppgaven og
        utviklet teknologisk løsning som reduserer mobbing, og vi alle fikk toppkarakter.
      </h4>
      <h4 style="color:#fff;">
      Opprinnelig kommer jeg fra Polen hvor jeg reiser til om sommeren sammen med min familie eller venner.
      </h4>

      <h4 style="color:#fff;">
        Jeg håper jeg kan snart finne en karrierevei som kan hjelpe meg med å utvikle mine ferdigheter.
      </h4>
       <h4 style="color:#fff;">
         Lenger ned på siden kan dere finne dokumenter som mine medstudenter og jeg har arbeidet med på skolen.
       </h4>

    </div>

 </div>


<br><br>
  </div>



<div class="container-fluid text-center boxshadow">
  <br><br>



<h2><strong>Vi vant prisen for beste studentprosjekt på bachelornivå!</strong></h2>

<br><br>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
     </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
       <div id="mCarousel" class="carousel slide" data-ride="carousel">
       <!-- Indicators -->
       <ol class="carousel-indicators">
         <li data-target="#mCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#mCarousel" data-slide-to="1"></li>
         <li data-target="#mCarousel" data-slide-to="2"></li>
         <li data-target="#mCarousel" data-slide-to="3"></li>
       </ol>

       <!-- Wrapper for slides -->
       <div class="carousel-inner" role="listbox">
         <div class="item active">
           <img src="img/1.jpg" alt="Chania" class="img-thumbnail" >
           <div class="carousel-caption">

             <p>LAURBÆRBLADET 2016</p>
           </div>
         </div>

         <div class="item">
           <img src="img/2.jpg" alt="Chania" class="img-thumbnail" >
           <div class="carousel-caption">
               <p>LAURBÆRBLADET 2016</p>
           </div>
         </div>

         <div class="item">
           <img src="img/3.jpg" alt="Flower" class="img-thumbnail" >
           <div class="carousel-caption">
             <p>LAURBÆRBLADET 2016</p>
           </div>
         </div>

         <div class="item">
           <img src="img/4.jpg" alt="Flower" class="img-thumbnail" >
           <div class="carousel-caption">
               <p>LAURBÆRBLADET 2016</p>
           </div>
         </div>
       </div>

       <!-- Left and right controls -->
       <a class="left carousel-control" href="#mCarousel" role="button" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
       </a>
       <a class="right carousel-control" href="#mCarousel" role="button" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
       </a>
     </div>
     </div>

           <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
          </div>
 </div>

 <br><br>

  <h2 >Laurbærbladet er <strong>Høyskolen i Østfolds</strong> pris <br> for beste studentprosjektet på bachelornivå</h2>

  <br><br>
  <h4 > på grunnlag av prosjektet </h4>
  <h3 style="color:black;"><strong>"Informasjonsflyten rundt mobbing og utvikling av en teknologisk løsning" </strong></h3>
  <br><br>
  <h4 >Kriteriene for prosjektene var målt etter:</h4>
  <h4 > <strong> Kvalitet </strong></h3>
    <h4 > <strong>Verdi for fagfeltet og/eller samfunnet </strong></h4>
      <h4 > <strong>Kreativitet </strong></h4>

</div>










  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
  </div>
  </div>

<!-- Container (Portfolio Section) -->
<div id="dokumenter" class="container-fluid backgroundblue boxshadow  text-center">
 <div class="row">
  <h2>DOKUMENTER</h2>
  <h4>Her kan du se på alle skoleprosjekter jeg har jobbet med</h4>
  <br>

  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

    </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

    <div class="col-sm-6">
      <p><a href="docs/bacheloroppgave.pdf" target="_blank" title="bachelorprosjektet">
	  <img  src="img/document-icon.png" alt="bacheloroppgave" width="100" height="100">
	  </a></p>
      <h4>Bacheloroppgave</h4>
      <h3 class="textshadow">"Informasjonsflyten rundt mobbing og utvikling av en teknologisk løsning"</h3>
      <h4>Dato: Mai, 2016 </h4>
    </div>
    <div class="col-sm-6">
     <a href="docs/PMreport.pdf" target="_blank" ><img  src="img/document-icon.png" width="100" height="100"></a>
      <h4>Prosjektledelse</h4>
      <h3 class="textshadow">I dette kurset jeg og min gruppe lagde en rapport om ledelsen av et spillprosjekt </h3>
      <h4>Dato: Desember, 2015</h4>
    </div>
    <div class="col-sm-12">
      <a  href="docs/SEreport.pdf" target="_blank"><img  target="_blank" src="img/document-icon.png" width="100" height="100"></a>
      <h4>Software engineering and testing</h4>
      <h3 class="textshadow">I dette kurset jeg og min gruppe har laget en IT-løsning for hjemmepleien</h3>
      <h4>Dato: Mai, 2015</h4>
    </div>

    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

    </div>
  </div>
  <br><br>

</div>



<!-- Container (Skills Section) -->
<div id="ferdigheter" class=" container-fluid ">

    <h2 class="text-center" >Ferdigheter</h2>
    	<h4 class="text-center">IT-SKILLS</h4>



			<div class="text-center slide">


				<div class="row">


				<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 slide">
				<h3 class="textshadow">Webutvikling</h3>
                <div class="c100 p70 dark orange big center">
                    <span>70%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
				</div>


				<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 slide">
				<h3 class="textshadow">Servere</h3>
                <div class="c100 p60 dark orange big center">
                    <span>60%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
				</div>


				<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 slide">
				<h3 class="textshadow">Java-programmering</h3>
                <div class="c100 p70 dark orange big center">
                    <span>70%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
				</div>

				<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 slide">
				<h3 class="textshadow">Databaser</h3>
				<div class="c100 p70 dark orange big center">
                    <span>70%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>

				</div>
				</div>



		</div>


  <!-- Container (skills section part 2) -->

  <div class="container-fluid ">

    <div class="row">
     <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

    </div>
     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">


     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="row">
      	<h4 class="text-center">Språk</h4>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
              aria-valuemin="0" aria-valuemax="100" style="width:90%">
            Norsk
            </div>
        </div>

	  	</div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
              aria-valuemin="0" aria-valuemax="100" style="width:90%">
            Polsk
            </div>
        </div>

	  	</div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
              aria-valuemin="0" aria-valuemax="100" style="width:80%">
            Engelsk
            </div>
        </div>

	  	</div>
    </div>
    </div>

     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h4 class="text-center">Annet</h4>
      <p class="text-center"><i class="fa fa-check fa-2x"></i>  Førerkort - B Klasse</p>
    </div>
    </div>
    </div>
      </div>
       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

    </div>
    </div>
  </div>
    </div>
</div>







<footer class="container-fluid text-center bg-black boxshadow  " >
<!-- Container (Contact Section) -->
<div id="kontakt" class="container-fluid ">



   <div class="row">

    <div class="col-md-12 text-center">
  <h2 style="color:white;">KONTAKT</h2>
  <br><br>


      <p style="color:white;"><span class="glyphicon glyphicon-map-marker"></span> Oslo, NO</p>
      <p style="color:white;"><span class="glyphicon glyphicon-phone"></span> Mobil: <img src="img/mobil.png" width="120" height="20"></p>
      <p style="color:white;"><span class="glyphicon glyphicon-envelope"></span> E-post: <img src="img/epost.png" width="120" height="20"></p>
    </div>


  </div>
  </div>
  <br>

    <a href="https://www.facebook.com/kamisiuu"><i class="fa fa-facebook-square fa-inverse fa-4x" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/kamisiuu/"><i class="fa fa-instagram fa-inverse fa-4x" aria-hidden="true"></i></a>
        <a href="https://no.linkedin.com/in/kamil-lipski-81187b54"><i class="fa fa-linkedin-square fa-inverse fa-4x" aria-hidden="true"></i></a>
  <p> Copyright © Kamil Lipski 2016 </p>
</div>
</footer>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".scroll-page , .btn, footer a[href='#myPage']").on('click', function(event) {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  });

  // Slide in elements on scroll
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>



</body>
</html>

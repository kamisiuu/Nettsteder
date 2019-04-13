<?php
session_start();
if(!isset($_SESSION['loggedin'])){ //if login in session is not set
    header("Location: loginn.php");
}
?>

<!DOCTYPE html>
<html lang="no">
<head>

  <title>lipski.no</title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- ... -->
    <script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

 <link rel="stylesheet" href="../css/minstil.css" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/loginn.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/mobiscroll.custom-3.0.0-beta4.min.css" type="text/css" />
  <script src="js/mobiscroll.custom-3.0.0-beta4.min.js"></script>

   <!-- Custom CSS -->

<style type="text/css">

        /* Demo Page styling, you can ignore this in your implementation */

        #myModal1 {
        top:15%;
        outline: none;
        }
        #myModal2 {
        top:15%;
        outline: none;
        }
        #myModal3 {
        top:15%;
        outline: none;
        }




        input {
            width: 100%;
            margin: 0 0 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 0;

            font-family: Arial, sans-serif,verdana;
            text-shadow: none;
            color: #000;
            font-size: 15px;
            -webkit-appearance: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

		.demo-main-cont {
			height: 100%;
		}

        .demo-iframe {
            padding: 10px 10px 10px 10px;
            text-shadow: none;
        }

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
      <ul class="nav navbar-nav navbar">

      </ul>
      <ul class="nav navbar-nav navbar-right">

     <?php
						if(!isset($_SESSION['loggedin'])){ //if login in session is not set
					?>
					<li><a href="registrer.php"><span class="glyphicon glyphicon-user"></span> Registrering</a></li>
					<li><a href="loginn.php"><span class="glyphicon glyphicon-log-in"></span> Logg inn</a></li>
					<?php
					} else{
					?>
					<li><a href="index.php"><span class="glyphicon glyphicon-user "></span> <?php echo ucfirst($_SESSION['navn']); ?></a></li>
					<li><a href="loggut.php"><span class="glyphicon glyphicon-log-out"></span> Logg ut</a></li>
					<?php
					}
					?>
    </ul>


    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="col-lg-2 col-md-1 col-sm-1 col-xs-0">
  </div>
<div class="card container-fluid col-lg-8 col-md-10 col-sm-10 col-xs-12 box-shadow" >

<div class="row">
<div class="col-sm-2 text-center">
	<label>Velg arbeidssted:</label>
</div>
</div>

<div class="row">
<div class="col-sm-3">

	<?php
			$servername = "localhost";
			$username = "root";
			$password = "LuPa4(!195";
			$dbname = "arbeidstimer";
			$bruker_id = $_SESSION["bruker_id"];
									  // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
			if ($conn->connect_error)
			   {
					die("Connection failed: " . $conn->connect_error);
				}

			$sql = "SELECT arbeidsstedsnavn FROM arbeidssted WHERE bruker_id='$bruker_id' ";
			$result = $conn->query($sql);

			if ($result->num_rows >= 0)
			{

				echo "<select class='form-control' name='arbeidsstedsnavn'>";
										// output data of each row
				while($row = $result->fetch_assoc())
				{

					echo "<option> ".$row["arbeidsstedsnavn"]. "</option>";

				}

					echo " </select> ";

			} else
			{

				echo "0 results";
			}
				$conn->close();
	?>
  </div>



<div class="col-sm-3">
  <div class="btn-group btn-group">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1">
      <span class="glyphicon glyphicon-plus btn-xs" aria-hidden="true" ></span>
    </button>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">
      <span class="glyphicon glyphicon-remove btn-xs" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal3">
      <span class="glyphicon glyphicon-pencil btn-xs" aria-hidden="true"></span>
    </button>
  </div>
  </div>

</div>
<div class="row">
  <!-- Modal -->
  <div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <form role="form" method ="post" action="leggtilarbeidssted.php" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Legg til nytt arbeidssted</h4>
        </div>

        <div class="modal-body">
            <input type="text" name="arbeidsstedsnavn"  placeholder="skriv inn navnet på arbeidsstedet" class="form-control"/>
        </div>
        <div class="modal-footer">
          <button dismiss-btn type="button" class="btn btn-default" data-dismiss="modal">Avbryt</button>
          <button type="submit" class="btn btn-default" value="Submit">Legg til</button>
        </form>
        </div>
      </div>

    </div>
  </div>
</div>



<div class="row">
  <!-- Modal -->
  <div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <form role="form"  method="post"  action="fjernarbeidssted.php">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Fjern et av arbeidsstedene</h4>
        </div>

        <div class="modal-body">

          <?php
        			$servername = "localhost";
        			$username = "root";
        			$password = "LuPa4(!195";
        			$dbname = "arbeidstimer";
        			$bruker_id = $_SESSION["bruker_id"];
        									  // Create connection
        			$conn = new mysqli($servername, $username, $password, $dbname);
        									// Check connection
        			if ($conn->connect_error)
        			   {
        					die("Connection failed: " . $conn->connect_error);
        				}

        			$sql = "SELECT arbeidsstedsnavn FROM arbeidssted WHERE bruker_id='$bruker_id' ";
        			$result = $conn->query($sql);

        			if ($result->num_rows >= 0)
        			{

        				echo "<select name='select-component' class='form-control' id='sel1'>";
        										// output data of each row
        				while($row = $result->fetch_assoc())
        				{

        					echo "<option > ".$row["arbeidsstedsnavn"]. "</option>";

        				}

        					echo " </select> ";

        			} else
        			{

        				echo "0 results";
        			}
        				$conn->close();
        	?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Avbryt</button>
          <button type="submit" class="btn btn-default" value="Submit">Fjern</button>
        </form>
        </div>
      </div>

    </div>
  </div>
</div>




<div class="row">
  <!-- Modal -->
  <div id="myModal3" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <form role="form" method="post" action="oppdaterarbeidsstedet.php">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Endre navnet på arbeidsstedet</h4>
        </div>

        <div class="modal-body">
          <?php
              $servername = "localhost";
              $username = "root";
              $password = "LuPa4(!195";
              $dbname = "arbeidstimer";
              $bruker_id = $_SESSION["bruker_id"];
                            // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
                          // Check connection
              if ($conn->connect_error)
                 {
                  die("Connection failed: " . $conn->connect_error);
                }

              $sql = "SELECT arbeidsstedsnavn FROM arbeidssted WHERE bruker_id='$bruker_id' ";
              $result = $conn->query($sql);

              if ($result->num_rows >= 0)
              {

                echo "<select name='select2' class='form-control' id='sel1'>";
                            // output data of each row
                while($row = $result->fetch_assoc())
                {

                  echo "<option id='select' > ".$row["arbeidsstedsnavn"]. "</option>";

                }

                  echo " </select> ";

              } else
              {

                echo "0 results";
              }
                $conn->close();
          ?>
            <input type="text" name="asnavn2"  placeholder="Oppdater navnet på arbeidsstedet" class="form-control"/>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Avbryt</button>
          <button type="submit"  class="btn btn-default" value="Submit">Oppdater</button>
        </form>
        </div>
      </div>

    </div>
  </div>
</div>
<br><br>

<div class="row">
<div class="col-sm-6">
<label>Startet på jobb</label>
<!-- Date & Time demo markup -->
<form method="post" action="leggtilarbeidstimer.php" >
        <input name="startDato" id="demo" placeholder="Velg dato og tid fra kalenderen..." class="form-control"/>

</div>

<div class="col-sm-6">
<label>Sluttet på jobb</label>
<!-- Date & Time demo markup -->
        <input name="sluttDato" id="demo2" placeholder="Velg dato og tid fra kalenderen..." class="form-control"/>
</div>
</div>
<div class="row">
  <div class="container-fluid col-lg-12">
  <button type="submit"  class="btn btn-primary btn-block" value="Submit">Legg til</button>
</form>
</div>
</div>







<br><br>
<div class="row">
<div class="col-sm-2 text-center">
	<label>Velg arbeidssted:</label>
</div>
</div>
<div class="row">
<div class="col-sm-3">

	<?php
			$servername = "localhost";
			$username = "root";
			$password = "LuPa4(!195";
			$dbname = "arbeidstimer";
			$bruker_id = $_SESSION["bruker_id"];
									  // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
			if ($conn->connect_error)
			   {
					die("Connection failed: " . $conn->connect_error);
				}

			$sql = "SELECT arbeidsstedsnavn FROM arbeidssted WHERE bruker_id='$bruker_id' ";
			$result = $conn->query($sql);

			if ($result->num_rows >= 0)
			{

				echo "<select class='form-control' name='arbeidsstedsnavn'>";
										// output data of each row
				while($row = $result->fetch_assoc())
				{

					echo "<option> ".$row["arbeidsstedsnavn"]. "</option>";

				}

					echo " </select> ";

			} else
			{

				echo "0 results";
			}
				$conn->close();
	?>
  </div>



<div class="col-sm-3">
  <div class="btn-group btn-group">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1">
      <span class="glyphicon glyphicon-plus btn-xs" aria-hidden="true" ></span>
    </button>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">
      <span class="glyphicon glyphicon-remove btn-xs" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal3">
      <span class="glyphicon glyphicon-pencil btn-xs" aria-hidden="true"></span>
    </button>
  </div>
  </div>

</div>
<br><br>
  <div class="row">
  <div class="col-sm-6">
  <label>Regn ut ant. arbeidet timer fra perioden </label>
  <!-- Date & Time demo markup -->
    <form action="regnutantTimer.php" method="post">
    <input name="regnStartDato" id="fperioden" class="form-control" placeholder="Velg dato fra kalenderen..."/>
  </div>

   <div class="col-sm-6">
  <label>Regn ut ant. arbeidet timer til perioden </label>
  <!-- Date & Time demo markup -->

    <input name="regnSluttDato" id="tperioden" class="form-control" placeholder="Velg dato fra kalenderen..."/>
  </div>
  </div>
  <div class="row">
    <div class="container-fluid col-lg-12">
    <button type="submit" value="Submit" class="btn btn-primary btn-block">Regn ut</button>
  </form>
  </div>
  </div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>










    <script type="text/javascript">
   	var instance = mobiscroll.calendar('#demo', {
    	theme: 'bootstrap',
    	lang: 'no',
    	display: 'inline',
    	controls: ['calendar', 'time'],
   	showScrollArrows: true
});
 		var instance2 = mobiscroll.calendar('#demo2', {
    	theme: 'bootstrap',
    	lang: 'no',
    	display: 'inline',
    	controls: ['calendar', 'time'],
    	showScrollArrows: true
});

		var instance3 = mobiscroll.calendar('#fperioden', {
    	theme: 'bootstrap',
    	lang: 'no',
   	 display: 'inline'
});

		var instance4 = mobiscroll.calendar('#tperioden', {
		theme: 'bootstrap',
		lang: 'no',
		display: 'inline'
});
    </script>

        </div>




<footer class="container-fluid text-center " >
<!-- Container (Contact Section) -->
<div id="kontakt" class="container-fluid ">



   <div class="row">




  </div>
  </div>
  <br>

    <a href="https://www.facebook.com/kamisiuu"><i class="fa fa-facebook-square fa-inverse fa-4x" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/kamisiuu/"><i class="fa fa-instagram fa-inverse fa-4x" aria-hidden="true"></i></a>
        <a href="https://no.linkedin.com/in/kamil-lipski-81187b54"><i class="fa fa-linkedin-square fa-inverse fa-4x" aria-hidden="true"></i></a>
  <p> Copyright © Kamil Lipski 2016 </p>
</div>
</footer>



</body>
</html>

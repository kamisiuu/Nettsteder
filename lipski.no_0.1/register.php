<?php
$servername = "localhost";
$username = "root";
$password = "LuPa4(!195";
$dbname = "arbeidstimer";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$navn=$_POST["navn"];
$brukernavn=$_POST["brukernavn"];
$epost=$_POST["epost"];
$passord=$_POST["passord"];

function UserAvailable(){
    global $brukernavn, $conn; 
    $sql = "SELECT * FROM bruker WHERE brukernavn = '$brukernavn'";
    $result = $conn->query($sql);
    if($result->num_rows < 1){
        return true;
    }else{
        echo "Dette brukernavnet er opptatt";
        return false;
    }

}
$passordhashing = password_hash($passord, PASSWORD_DEFAULT);
$sql = "INSERT INTO bruker (navn, brukernavn, epost, passord)
VALUES ('$navn', '$brukernavn', '$epost', '$passordhashing')";

 if (UserAvailable() && mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo  mysqli_error($conn);
}
mysqli_close($conn);
?> 

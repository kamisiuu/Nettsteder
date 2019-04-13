<?php
$servername = "localhost";
$username = "root";
$password = "LuPa4(!195";
$dbname = "arbeidstimer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_name=$_POST["brukernavn"];
$user_pass=$_POST["passord"];

$sql = "SELECT bruker_id FROM bruker WHERE BINARY brukernavn='$user_name' AND passord='$user_pass'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Sucessfull login";
    // output data of each row
   // while($row = $result->fetch_assoc()) {
       
   // }
   
} else {
    echo "Login failed";
}
$conn->close();
?> 

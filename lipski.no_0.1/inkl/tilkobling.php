<?php 
// tilkobling
$host="localhost";
$brukernavn="root";
$passord="LuPa4(!195";
$database="arbeidstimer";

// oppretter tilkobling
$tilkobling = mysql_connect($host, $brukernavn, $passord, $database) ;

//sjekker tilkobling
if(!$tilkobling) 
{
	die("tilkoblings feil" .mysqli_connect_errno());
}
?>
<?php session_start(); 
//https://pasip.azurewebsites.net/Se3.php
$kk = "0";
//$vv = "0";
/*	foreach ($_SESSION as $k => $v) {
		$kk = $k;
		//$vv = $v;
	}
*/
if (isset($_SESSION['kayttaja'])) $kk = $_SESSION['kayttaja']; 
elseif (isset($_POST["user"]) && $_POST["password"] != "") {
		$us = $_POST["user"];
		$pw = $_POST["password"];
		$kk = $us;
		//$vv = $_POST["password"];
		$_SESSION['kayttaja'] = $us;
		$_SESSION['salasana'] = $pw;
	} 

if (isset($_POST["ulos"])){
	session_unset();
	session_destroy();
	$_GET["sivu"] = NULL;
	$kk = "0";
}

?>
<!DOCTYPE html>
<html>
<head>
<link type="text/css" href="keskitetty.css" rel="stylesheet" />
<title>Sessiot harjoitus 3</title>
<meta charset="utf-8" />
</head>
<body>

<h1>Sessiot harjoitus 3</h1>

<div id="uloin_div">
	<div id="banner_div">
		<img src="banner.jpg" alt="Mars banner">

	</div>
	<div id="valikko_div">
		<div id="linkki_1_div">
			<a href="Se3.php">Etusivu</a>
		</div>
		<div style="width:225px; height:30px; background-color:pink; float:left; text-align:center; vertical-align:middle;">
			<a href="Se3.php?sivu=tietoja">Tietoja</a>
		</div>
<?php

//tulostaa valikkoon kirjaudu/profiili osat
if (isset($_GET['sivu']) && $_GET["sivu"] == "profiili" || $kk != "0"){
		echo "<div style=\"width:225px; height:30px; background-color:green; float:left; text-align:center; vertical-align:middle;\">";
			echo "<a href=\"Se3.php?sivu=profiili\">Profiili</a>";
		echo "</div>";
} elseif (isset($_GET['sivu']) && $_GET["sivu"] == "kirjaudu" || $kk == "0") {
		echo "<div style=\"width:225px; height:30px; background-color:green; float:left; text-align:center; vertical-align:middle;\">";
			echo "<a href=\"Se3.php?sivu=kirjaudu\">Kirjaudu</a>";
		echo "</div>";
} else {
		echo "<div style=\"width:225px; height:30px; background-color:green; float:left; text-align:center; vertical-align:middle;\">";
			echo "<a href=\"Se3.php?sivu=kirjaudu\">Kirjaudu</a>";
		echo "</div>";
}
//tulostaa valikkoon yhteystiedot ja päättää palkin div rakenteen
echo "<div style=\"width:225px; height:30px; background-color:yellow; float:left; text-align:center; vertical-align:middle;\">";
	echo "<a href=\"Se3.php?sivu=yhteys\">Yhteystiedot</a>";
echo "</div>";
echo "</div>";
if (!isset($_GET["sivu"])) {
   //Tulostaa etusivun
	echo "<div style=\"width:600px; height:500px; background-color:white; margin-left:auto; margin-right:auto; margin-top:70px; padding:20px;\">";
		echo "<h3>Etusivu</h3>";
		echo "<p>Tämä on harjoituksen etusivu. Sivulle tulee etusivutavaraa.</p>";
	echo "</div>";
} elseif (isset($_GET["sivu"] && $_GET["sivu"] == "tietoja")) {
	echo "<div style=\"width:600px; height:500px; background-color:white; margin-left:auto; margin-right:auto; margin-top:70px; padding:20px;\">";
		echo "<h3>Tietoja</h3>";
		echo "<p>Tämä sivu sisältää sivuston tietoja. Sivulle tulee tarvittavat tiedot poislukien yhteystiedot.</p>";
	echo "</div>";
} elseif (isset($_GET["sivu"] && $_GET["sivu"] == "kirjaudu")) {
	echo "<div style=\"width:600px; height:500px; background-color:white; margin-left:auto; margin-right:auto; margin-top:70px; padding:20px;\">";
	echo "<form action=\"Se3.php\" method=\"POST\">";
		echo "<fieldset>";
			echo "<legend>Kirjautuminen</legend>";
			echo "Käyttäjä:<input type=\"text\" name=\"user\" required><br>";
			echo "Salasana:<input type=\"password\" name=\"password\" required><br>";
		echo "</fieldset>";
	  echo "<input type=\"submit\" name=\"Kirjaudu\" value=\"kirjaudu\">";
	echo "</form>";
	echo "</div>";
} elseif (isset($_GET["sivu"] && $_GET["sivu"] == "profiili")) {
	echo "<div style=\"width:600px; height:500px; background-color:white; margin-left:auto; margin-right:auto; margin-top:70px; padding:20px;\">";	
	echo "<h3>Profiili</h3>";


	echo "<p>Käyttäjän tunnus on: $kk.</p>";

	echo "<form action=\"Se3.php\" method=\"POST\">";
	echo "<input type=\"hidden\" name=\"pois\" value=\"10\">";
	echo "<input type=\"submit\" name=\"ulos\" value=\"Kirjaudu Ulos\">";
	echo "</div>";

} elseif (isset($_GET["sivu"] && $_GET["sivu"] == "yhteys")) {
		echo "<div style=\"width:600px; height:500px; background-color:white; margin-left:auto; margin-right:auto; margin-top:70px; padding:20px;\">";
		echo "<h3>Yhteystiedot</h3>";
		echo "Harjoituskatu 15 C 87<br>";
		echo "00457 Helsinki<br>";
		echo "+358 40 8347000<br>";
		echo "info@pp.org<br>";
		echo "</div>";
} else {
	echo "<div style=\"width:600px; height:500px; background-color:white; margin-left:auto; margin-right:auto; margin-top:70px; padding:20px;\">";
	echo "<p>Sivu on saanut virheellisen parametrin.</p>";
	echo "</div>";
}

?>
</div>
</body>
</html>
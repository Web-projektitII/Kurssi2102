<!DOCTYPE html>
<html>
<head>
<title>PHP-tehtävät</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<?php
function muodostateksti()
{
	$merkkijono='';
	/*
	if ($_GET["koira"]=="koira")
	{	
      $merkkijono.="koira,";
	}  
    if (isset($_GET["kissa"]))
	{

		   $merkkijono.="kissa,";		    
	}
	
	if (isset($_POST['lemmikki'])) 
	  foreach ($_POST["lemmikki"] as $lemmikki) {
		$merkkijono.= "$lemmikki,";
	    }
	$merkkijono = substr($merkkijono,0,-1);   */
	$merkkijono = implode(",",$_POST['lemmikki']);
		
   	return $merkkijono;
}

var_export($_POST);
echo "<br><br>";
print_r($_POST);
echo "<br><br>";
var_dump($_POST);
echo "<p></p>";

$nimi = trim($_POST["nimi"]);
$email = trim($_POST["email"]);
$ssana = trim($_POST["ssana"]);

//echo "empty $nimi:" .empty($nimi)."<br>";
if(!empty($nimi) && !empty($email) && !empty($ssana))
{
  echo "Osasto:".$_POST['osasto']."<br>";	
  echo "Nimi:".$_POST['nimi']."<br>";
  echo "Sähköposti:".$_POST['email']."<br>";
  echo "Salasana:".$_POST['ssana']."<br>";
  echo "Sukupuoli:".$_POST['sukupuoli']."<br>";
  echo "Maakunta:".$_POST['maakunta']."<br>";
  echo "Lemmikit:".implode(",",$_POST['lemmikki'])."<br>";
  echo "Kuvaus:".$_POST['kuvaus']."<br>";  
}
else
{
  echo "nimi, sähköposti ja salasana ovat pakollisia";
}
?>

</body>
</html>

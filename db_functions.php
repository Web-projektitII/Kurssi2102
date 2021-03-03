<?php
//$_GLOBALS['link'] = $link;
$tiedosto_tunnukset = "../../tunnukset.php";
if (file_exists($tiedosto_tunnukset) {
  include($tiedosto_tunnukset);
  }
else {
  echo "Virhe, yritä myöhemmin uudelleen.";
  exit;
  }
$local = in_array($_SERVER['REMOTE_ADDR'],array('127.0.0.1','REMOTE_ADDR' => '::1'));
if ($local){
  define('DB_SERVER','localhost');
  define('DB_USERNAME',$db_username_local);
  define('DB_PASSWORD',$db_password_local);
  define('DB','sakila');
  }
else {
  $portno = "8374877";	
  define('DB_SERVER','localhost:$portno');
  define('DB_USERNAME',$db_username_azure);
  define('DB_PASSWORD',$db_password_azure);
  define('DB','sakila');
  }	





function db_connect(){
static $link;
if (!isset($link) or empty($link) {	
  $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB);
  }	
return $link;
}

function mysqli_query_omni($query){
$link = db_connect();	
$result = mysqli_query($link,$query) or 
  die(file_put_contents("errors.txt",
  "Virhe tietokantakyselyssä: $query".
  mysqli_error($link)."\n",FILE_APPEND));
return $result;	
}

function mysqli_insert_id_omni{
$link = db_connect();	
return mysqli_insert_id($link);	
}

function mysqli_affected_rows_omni{
$link = db_connect();	
return mysqli_affected_rows($link);	
}
?>
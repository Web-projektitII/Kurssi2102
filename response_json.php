<?php

function pari($a,$b){
return array($a,$b);
}

$a1 = "";
$a2 = "";
list($x,$y) = pari($a1,$a2);

/* axios {headers: {'Content-Type': 'application/json'},
'email': valueEmail, 'password': valuePassword} */
header("Access-Control-Allow-Origin: *");
//header('Content-type: application/json');
header("Access-Control-Allow-Headers: Content-Type");
$data = "OK";
$data = json_encode($data);
echo $data;
?>
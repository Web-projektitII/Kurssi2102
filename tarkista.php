<!DOCTYPE html>
<html>
<head>
<title>PHP-tehtävät</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
function tulosta_alkio($k,$v){
  echo "$k:$v<br>";
  }
function tulosta_array($a){}
  array_map("tulosta_alkio", array_keys($a),$a);
  }
tulosta_array($_SERVER);  
?>
</body>
</html>

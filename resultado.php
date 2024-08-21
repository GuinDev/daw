<?php
  $primeiro = $_GET ["num1"];
  $op = $_GET ["op"];
  $segundo = $_GET ["num2"];
  $resul=0;

if($op == "+") 
{ $resul = $primeiro + $segundo;
}
elseif($op == "-")
{ $resul = $primeiro - $segundo;
}
elseif($op == "*") 
{ $resul = $primeiro * $segundo;
}
elseif($op == "/") 
{ $resul = $primeiro / $segundo;
}
?> 

<!doctype html>
<html>
<head>

<meta charset="utf-8">
<meta http-equiv="refresh" content="15"/>
<title>Calculadora</title>
</head>
<!--00 == 0 ff==255  ffffff == red255,green255,blue255-->
<body  style="background-color: #00b1ff; color: white;">
  <h1>Calculadora</h1>
    <form action="resultado.php" method="GET">
      Numero 1: <input type="number" id="num1" name="num1"><br>
      Operador : <input type="text" id="op" name="op"><br>
      Numero 2: <input type="number" id="num2" name="num2"><br>
      <input type="submit" value="Calcular">
    </form>     
      <p> o resultado eh: <?php
      echo "$resul";
      ?> 
      </p>
</body>
</html>
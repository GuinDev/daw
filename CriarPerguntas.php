<?php 
  $msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
  $pergunta = $_POST["pergunta"];
  $resposta = $_POST["resposta"];
  $opcoes = $_POST["opcoes"];
  echo "pergunta: $pergunta " . " resposta: $resposta ". " opcoes: $opcoes ";
  $arqGab = fopen("Gabarito.txt","a") or die("erro ao criar arquivo");
    $linha = "pergunta;resposta;opcoes\n";
    $linha = $pergunta . ";" . $resposta . ";" . $opcoes . "\n";
    fwrite($arqGab,$linha);
    fclose($arqGab);
    $msg = "arquivo criado com sucesso!";
  }

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta 
  name="viewport" 
  content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Criar Pergunta</h1>
<form action="CriarPerguntas.php" method="POST">
    pergunta: <input type="text" name="pergunta" required>
    <br><br>
    resposta: <input type="text" name="resposta" required>
    <br><br>
    opcoes: <input type="text" name="opcoes" required>
    <br><br>
    <input type="submit" value="Criar Pergunta">
</form>
<br>
<ul>
    <li><a href="Cadastro.php">Cadastrar</a></li>
    <li><a href="CriarPerguntas.php">Criar Perguntas</a></li>
    <li><a href="listarPerguntas.php">Listar Perguntas</a></li>
    <li><a href="EditarPerguntas.php">Editar Perguntas</a></li>
    <li><a href="listarUmaPergunta.php">Listar uma Pergunta</a></li>
    <li><a href="ExcluirPergunta.php">excluir Pergunta</a></li>
    <li><a href="Menu.php">Menu</a></li>
</ul>

<p><?php echo $msg ?></p>
<br>
</body>
</html>
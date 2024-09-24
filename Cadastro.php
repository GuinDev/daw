<?php 
  $msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  echo "nome: $nome " . " email: $email " . "senha salva com sucesso!";
  $arqCad = fopen("cadastro.txt","a") or die("erro ao criar arquivo");
    $linha = "nome;email;senha\n";
    $linha = $nome . ";" . $email . ";" . $senha . "\n";
    fwrite($arqCad,$linha);
    fclose($arqCad);
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
<h1>Cadastrar funcionario</h1>
<form action="Cadastro.php" method="POST">
    Nome: <input type="text" name="nome" required>
    <br><br>
    email: <input type="text" name="email" required>
    <br><br>
    senha: <input type="password" id="pwd" name="senha" required>
    <br><br>
    <input type="submit" value="Cadastrar">
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
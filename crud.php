<?php 
  $msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
  $nome = $_POST["nome"];
  $idade = $_POST["idade"];
  $genero = $_POST["genero"];
  echo "nome: $nome " . " idade: $idade ". " genero: $genero ";
  $arqCad = fopen("cadastro.txt","a") or die("erro ao criar arquivo");
    $linha = "nome;idade;genero\n";
    $linha = $nome . ";" . $idade . ";" . $genero . "\n";
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
<h1>Criar Novo aluno</h1>
<form action="crud.php" method="POST">
    Nome: <input type="text" name="nome" required>
    <br><br>
    Idade: <input type="text" name="idade" required>
    <br><br>
    Genero: <input type="radio" id="F" name="genero" value="f" required>
    <label for="F" >F</label>
    <input type="radio" id="M" name="genero" value="m" required>
    <label for="M" >M</label>
    <br><br>
    <input type="submit" value="Cadastrar">
</form>
<br>
<ul>
    <li><a href="crud.php">Cadastrar</a></li>
    <li><a href="listar.php">Listar Alunos</a></li>
    <li><a href="alterar.php">Editar Alunos</a></li>
    <li><a href="listarum.php">Listar um Aluno</a></li>
    <li><a href="excluir.php">excluir Aluno</a></li>
</ul>

<p><?php echo $msg ?></p>
<br>
</body>
</html>
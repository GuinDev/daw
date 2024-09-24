<?php
    $msg = "";
    $pergunta = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $pergunta = $_POST["pergunta"];
        
        $arqGab = fopen("gabarito.txt","r") or die("erro ao abrir arquivo");
        
    
        while(!feof($arqGab)) {
            $linha = fgets($arqGab);
            $colunaDados = explode(";", $linha);
            if ($colunaDados[0] == $pergunta) {

                echo $linha;
            }
         }
        fclose($arqGab);
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>listar aluno</h1>
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
<form action="listarUmaPergunta.php" method="POST">
    Pergunta: <input type="text" name="pergunta" required>
    <br><br>
    <input type="submit" value="Listar Pergunta">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>
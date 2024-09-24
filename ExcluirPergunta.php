<?php
    $msg = "";
    $pergunta = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $pergunta = $_POST["pergunta"];
        $msg = "";
        $arqGab = fopen("gabarito.txt","r") or die("erro ao abrir arquivo");
        $arqGab2 = fopen("temp.txt","w") or die("erro ao abrir arquivo");
        
    
        while(!feof($arqGab)) {
            $linha = fgets($arqGab);
            $colunaDados = explode(";", $linha);
            if ($colunaDados[0] == $pergunta) {

                continue;
            }
            
            fwrite($arqGab2,$linha);
         }
        fclose($arqGab);
        fclose($arqGab2);
        unlink("gabarito.txt");

// renomeia o arquivo temporário para o nome original
    rename("temp.txt", "gabarito.txt");
        $msg = "Pergunta Deletada com sucesso!!!";
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Excluir Pergunta</h1>
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
<form action="ExcluirPergunta.php" method="POST">
    Pergunta: <input type="text" name="pergunta" required>
    <br><br>
    <input type="submit" value="excluir Pergunta">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>
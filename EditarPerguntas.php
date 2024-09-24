<?php
    $msg = "";
    $perguntaAnt = "";
    $pergutaNov = "";
    $respostaAnt = ""; 
    $respostaNov = "";
    $opcao = "";
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $perguntaAnt = $_POST["perguntaAnt"];
        $pergutaNov = $_POST["pergutaNov"];
        $respostaAnt = $_POST["respostaAnt"];
        $respostaNov = $_POST["respostaNov"];
        $opcao = $_POST["opcao"];
        $msg = "";
        $arqGab = fopen("gabarito.txt","r") or die("erro ao abrir arquivo");
        $arqGab2 = fopen("temp.txt","a") or die("erro ao abrir arquivo");
        
    
        while(!feof($arqGab)) {
            $linha = fgets($arqGab);
            $colunaDados = explode(";", $linha);
            if (($colunaDados[0] == $perguntaAnt) && ($colunaDados [1] == $respostaAnt)) {

                $linha = $pergutaNov . ";" . $respostaNov . ";" . $opcao ."\n";
                echo $linha;
              }
            
            fwrite($arqGab2,$linha);
         }
        fclose($arqGab);
        fclose($arqGab2);
        unlink("gabarito.txt");

// renomeia o arquivo temporário para o nome original
rename("temp.txt", "gabarito.txt");
        $msg = "Deu tudo certo!!!";
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterar Perguntas</h1>
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
<form action="editarPerguntas.php" method="POST">
    pergunta Antiga: <input type="text" name="perguntaAnt" required>
    <br><br>
    pergunta Nova: <input type="text" name="pergutaNov" required>
    <br><br>
    resposta Antiga: <input type="text" name="respostaAnt" required>
    <br><br>
    resposta Nova: <input type="text" name="respostaNov" required>
    <br><br>
    opcao nova: <input type="text" name="opcao" required>
    <br><br>
    <input type="submit" value="Alterar pergunta">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>
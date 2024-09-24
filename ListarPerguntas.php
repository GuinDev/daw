<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Listar Perguntas</h1>

<table>
    <tr><th>pergunta</th><th>resposta</th><th>opcoes</th></tr>
<?php
   $arqGab = fopen("gabarito.txt","r") or die("erro ao abrir arquivo");
 
   while(!feof($arqGab)) {
        $linha = fgets($arqGab);
        $colunaDados = explode(";", $linha);
 
 // <tr><td><?php echo $colunaDados[0] </td>
        echo "<tr><td>" . $colunaDados[0] . "</td>" .
            "<td>" . $colunaDados[1] . "</td>" .
            "<td>" . $colunaDados[2] . "</td></tr>";
    }
 
   fclose($arqGab);
    $msg = "Deu tudo certo!!!";
?>
</table>
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
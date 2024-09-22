<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Listar Disciplinas</h1>

<table>
    <tr><th>nome</th><th>idade</th><th>genero</th></tr>
<?php
   $arqCad = fopen("cadastro.txt","r") or die("erro ao abrir arquivo");
 
   while(!feof($arqCad)) {
        $linha = fgets($arqCad);
        $colunaDados = explode(";", $linha);
 
 // <tr><td><?php echo $colunaDados[0] </td>
        echo "<tr><td>" . $colunaDados[0] . "</td>" .
            "<td>" . $colunaDados[1] . "</td>" .
            "<td>" . $colunaDados[2] . "</td></tr>";
    }
 
   fclose($arqCad);
    $msg = "Deu tudo certo!!!";
?>
</table>
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
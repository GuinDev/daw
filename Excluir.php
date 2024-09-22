<?php
    $msg = "";
    $nome = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $nome = $_POST["nome"];
        $msg = "";
        $arqCad = fopen("cadastro.txt","r") or die("erro ao abrir arquivo");
        $arqCad2 = fopen("temp.txt","a") or die("erro ao abrir arquivo");
        
    
        while(!feof($arqCad)) {
            $linha = fgets($arqCad);
            $colunaDados = explode(";", $linha);
            if ($colunaDados[0] == $nome) {

                continue;
            }
            
            fwrite($arqCad2,$linha);
         }
        fclose($arqCad);
        fclose($arqCad2);
        unlink("cadastro.txt");

// renomeia o arquivo temporário para o nome original
    rename("temp.txt", "cadastro.txt");
        $msg = "Aluno Deletado com sucesso!!!";
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Alterar aluno</h1>
<br>
<ul>
<li><a href="crud.php">Cadastrar</a></li>
    <li><a href="listar.php">Listar Alunos</a></li>
    <li><a href="alterar.php">Editar Alunos</a></li>
    <li><a href="listarum.php">Listar um Aluno</a></li>
    <li><a href="excluir.php">excluir Aluno</a></li>
</ul>
<form action="excluir.php" method="POST">
    Nome: <input type="text" name="nome" required>
    <br><br>
    <input type="submit" value="excluir aluno">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>
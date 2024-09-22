<?php
    $msg = "";
    $nome = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $nome = $_POST["nome"];
        
        $arqCad = fopen("cadastro.txt","r") or die("erro ao abrir arquivo");
        
    
        while(!feof($arqCad)) {
            $linha = fgets($arqCad);
            $colunaDados = explode(";", $linha);
            if ($colunaDados[0] == $nome) {

                echo $linha;
            }
         }
        fclose($arqCad);
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
<li><a href="crud.php">Cadastrar</a></li>
    <li><a href="listar.php">Listar Alunos</a></li>
    <li><a href="alterar.php">Editar Alunos</a></li>
    <li><a href="listarum.php">Listar um Aluno</a></li>
    <li><a href="excluir.php">excluir Aluno</a></li>
</ul>
<form action="listarum.php" method="POST">
    Nome: <input type="text" name="nome" required>
    <br><br>
    <input type="submit" value="listar aluno">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>
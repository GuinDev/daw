<?php
    $msg = "";
    $nomeAnt = "";
    $nomeNovo = "";
    $idade = ""; 
    $genero = "";
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $nomeAnt = $_POST["nomeAnt"];
        $nomeNovo = $_POST["nomeNovo"];
        $idade = $_POST["idade"];
        $genero = $_POST["genero"];
        $msg = "";
        $arqCad = fopen("cadastro.txt","r") or die("erro ao abrir arquivo");
        $arqCad2 = fopen("temp.txt","a") or die("erro ao abrir arquivo");
        
    
        while(!feof($arqCad)) {
            $linha = fgets($arqCad);
            $colunaDados = explode(";", $linha);
            if ($colunaDados[0] == $nomeAnt) {

                $linha = $nomeNovo . ";" . $idade . ";" . $genero . "\n";
            }
            
            fwrite($arqCad2,$linha);
         }
        fclose($arqCad);
        fclose($arqCad2);
        unlink("cadastro.txt");

// renomeia o arquivo temporário para o nome original
rename("temp.txt", "cadastro.txt");
        $msg = "Deu tudo certo!!!";
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
<form action="alterar.php" method="POST">
    Nome Antigo: <input type="text" name="nomeAnt" required>
    <br><br>
    Nome Novo: <input type="text" name="nomeNovo" required>
    <br><br>
    Idade: <input type="text" name="idade" required>
    <br><br>
    Genero: <input type="radio" id="F" name="genero" value="f" required>
    <label for="F" >F</label>
    <input type="radio" id="M" name="genero" value="m" required>
    <label for="M" >M</label>
    <br><br>
    <input type="submit" value="Alterar nome">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>
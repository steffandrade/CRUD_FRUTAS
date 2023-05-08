<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Frutas</title>
</head>
<body>
    
<div class="container-formulario">

<title>Cadastro de Frutas</title>

    
<div class="container-formulario">
    <h1>Cadastro de Frutas</h1>
    <?php
    if (isset($_POST['submit'])) {
        $nomef = $_POST['nomef'];
        $tamanho = $_POST['tamanho'];
        $peso = $_POST['peso'];
        $quantidade = $_POST['quantidade'];
        $preco = $_POST['preco'];

        $stmt = $pdo->prepare('SELECT COUNT(*) FROM frutas WHERE quantidade = ?');
        $stmt->execute([$quantidade]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $error = 'Já existe um cadastro com esse nome.';
        } else {

            $stmt = $pdo->prepare('INSERT INTO frutas(nomef, tamanho, peso, quantidade, preco)
            VALUES(:nomef, :tamanho, :peso, :quantidade, :preco)');
            $stmt->execute(['nomef'=> $nomef, 'tamanho'=> $tamanho, 'peso'=> $peso, 'quantidade'=> $quantidade, 'preco'=> $preco]);

            if ($stmt->rowCount()) {
                echo '<span>Cadastro feito com sucesso!</span>';
            } else {
                echo '<span>Erro ao cadastrar, tente novamente mais tarde.</span>';
            }
        }
        
        if (isset($error)) {
            echo '<span>' . $error . '</span>';
        }
    }
?>

<form method="post">

<label for="nomef">Nome:</label>
<input type="text" name="nomef" required></br>

<label for="tamanho">Tamanho:</label>
<input type="text" name="tamanho" required></br>

<label for="peso">Peso:</label>
<input type="text" name="peso" maxLength="11" required></br>

<label for="quantidade">Quantidade:</label>
<input type="number" name="quantidade" required></br>

<label for="preco">preco:</label>
<input type="text" name="preco" required></br>


<div>
    <button type="submit" name="submit" value="Cadastrar">Cadastrar</button>
    <button><a href="listarf.php">Listar</a></button>
</div>

</form>
</div>

</body>
</html>
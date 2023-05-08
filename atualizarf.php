<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data'];
    


    $stmt = $pdo->prepare('UPDATE clientes SET nome = ?, email = ?, telefone = ?, data = ? WHERE id = ?');
    $stmt->execute([$nome, $email, $telefone, $data, $id]);
    header('Location: listarf.php');
    exit;
}
?>




<?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('Location: listarf.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM frutas WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listarf.php');
    exit;
}
$nomef = $appointment['nomef'];
$tamanho = $appointment['tamanho'];
$peso = $appointment['peso'];
$quantidade = $appointment['quantidade'];
$preco = $appointment['preco'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cadastro</title>
</head>
<body>
    
<h1>Atualizar Cadastro<h1>
    <form method="post">
        <label for="nomef">Nome</label>
        <input type="text" name="nomef" value="<?php echo $nomef; ?>" required></br>

        <label for="tamanho">Tamanho</label>
        <input type="text" name="tamanho" value="<?php echo $tamanho;?>" required></br>

        <label for="peso">Peso</label>
        <input type="text" name="peso" value="<?php echo $peso;?>" required></br>

        <label for="quantidade">Quantidade</label>
        <input type="text" name="quantidade" value="<?php echo $quantidade;?>" required></br>

        <label for="preco">preco</label>
        <input type="text" name="preco" value="<?php echo $preco;?>" required></br>

        <button type="submit">Atualizar</button>
    </form>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomef = $_POST['nomef'];
    $tamanho = $_POST['tamanho'];
    $peso = $_POST['peso'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    


    $stmt = $pdo->prepare('UPDATE frutas SET nomef = ?, tamanho = ?, peso = ?, quantidade = ?, preco = ?  WHERE id = ?');
    $stmt->execute([$nomef, $tamanho, $peso, $quantidade, $preco, $id]);
    header('Location: listarf.php');
    exit;
}
?>
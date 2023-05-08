<?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM clientes WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;
}
$nome = $appointment['nome'];
$email = $appointment['email'];
$telefone = $appointment['telefone'];
$data = $appointment['data'];
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
        <label for="nome">Nome</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>" required></br>

        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo $email;?>" required></br>

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" value="<?php echo $telefone;?>" required></br>

        <label for="data">Data</label>
        <input type="text" name="data" value="<?php echo $data;?>" required></br>

        <button type="submit">Atualizar</button>
    </form>

</body>
</html>

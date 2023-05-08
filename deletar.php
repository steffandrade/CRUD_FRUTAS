<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM clientes WHERE id = ?');
$stmt->execute([$id]);
$apoointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$apoointment) {
    header('Location: listar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM clientes WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: listar.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar cadastro</title>
</head>
<body>
    
<h1>Deletar cadastro</h1>
<p>Tem certeza que deseja deletar o compromisso de
    <?php echo $apoointment['nome'];?>
    <?php echo $apoointment['email'];?>
    <?php echo $apoointment['telefone'];?>
    <?php echo $apoointment['data'];?>
   </p>
    <form method='post'>
        <button type='submit'>Sim</button>
        <a href="listar.php">Não</a>
    </form>

</body>
</html>
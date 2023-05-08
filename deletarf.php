<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: listarf.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM frutas WHERE id = ?');
$stmt->execute([$id]);
$apoointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$apoointment) {
    header('Location: listarf.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM frutas WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: listarf.php');
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
<p>Tem certeza que deseja deletar 
    <?php echo $apoointment['id'];?>
    <?php echo $apoointment['nomef'];?>
    <?php echo $apoointment['tamanho'];?>
    <?php echo $apoointment['peso'];?>
    <?php echo $apoointment['quantidade'];?>
    <?php echo $apoointment['preco'];?>
   </p>
    <form method='post'>
        <button type='submit'>Sim</button>
        <a href="listarf.php">Não</a>
    </form>

</body>

</html>
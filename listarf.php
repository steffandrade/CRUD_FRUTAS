<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="style.css"> 
<title>Cadastro de Frutas</title>
</head>

<body class="listar">
<h1>Cadastro de Frutas</h1>

<?php
$stmt = $pdo->query('SELECT * FROM frutas ORDER BY preco'); 
$frutas = $stmt->fetchAll(PDO:: FETCH_ASSOC);

if (count($frutas) == 0) {
echo '<p>Nenhum cadastro encontrado.</p>';
} else {
echo '<table border="1">';
echo '<thead>
    <tr>
        <th>Nome</th>
        <th>Tamanho</th>
        <th>Peso</th>
        <th>Quantidade</th>
        <th>Preço</th>
        <th colspan="2">Opções</th>
    </tr>
    </thead>';
echo '<tbody>';

foreach ($frutas as $frutas) {
echo '<tr>';
echo '<td>' . $frutas['nomef'] . '</td>'; 
echo '<td>' . $frutas['tamanho'] . '</td>';
echo '<td>' . $frutas['peso'] . '</td>';
echo '<td>'. $frutas['quantidade']. '</td>';
echo '<td>'. $frutas['preco']. '</td>';
echo '<td><a style="color:white;" href="atualizarf.php?id=' . $frutas['id'].'">Atualizar</a></td>';
echo '<td><a style="color:white;" href="deletarf.php?id=' . $frutas['id'].'">Deletar</a></td>';
echo '</tr>';
}

echo '</tbody>';
echo '</table>';
}
?> 

</body>
</html>
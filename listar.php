<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="style.css"> 
<title>Cadastro de Clientes</title>
</head>

<body class="listar">
<h1>Cadastro de Clientes</h1>

<?php
$stmt = $pdo->query('SELECT * FROM clientes ORDER BY data'); 
$clientes = $stmt->fetchAll(PDO:: FETCH_ASSOC);

if (count($clientes) == 0) {
echo '<p>Nenhum cadastro encontrado.</p>';
} else {
echo '<table border="1">';
echo '<thead>
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Data</th>
        <th colspan="2">Opções</th>
    </tr>
    </thead>';
echo '<tbody>';

foreach ($clientes as $clientes) {
echo '<tr>';
echo '<td>' . $clientes['nome'] . '</td>'; 
echo '<td>' . $clientes['email'] . '</td>';
echo '<td>' . $clientes['telefone'] . '</td>';
echo '<td>' . date('d/m/Y', strtotime($clientes['data'])) . '</td>'; 
echo '<td><a style="color:white;" href="atualizar.php?id=' . $clientes['id'].'">Atualizar</a></td>';
echo '<td><a style="color:white;" href="deletar.php?id=' . $clientes['id'].'">Deletar</a></td>';
echo '</tr>';
}

echo '</tbody>';
echo '</table>';
}
?> 

</body>
</html>





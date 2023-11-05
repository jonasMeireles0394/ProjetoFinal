<?php
include('conexao.php'); // Inclua o arquivo de conexão

// Preparar a consulta SQL para selecionar registros onde inadimplente é "SIM"
$sql = "SELECT idAluno, nomeAluno, inadimplente, valorInadimplente FROM financeiro WHERE inadimplente = 'SIM'";

// Executar a consulta SQL
$result = $mysqli->query($sql);

// Inicializar a variável para armazenar os resultados da busca
$resultado = "";

// Verificar se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Construir a tabela com os dados encontrados
    $resultado .= "<h2>Alunos Inadimplentes</h2>";
    $resultado .= "<table border='1'>
                    <tr>
                        <th>ID do Aluno</th>
                        <th>Nome do Aluno</th>
                        <th>Inadimplente</th>
                        <th>Valor Inadimplente</th>
                    </tr>";
    while($row = $result->fetch_assoc()) {
        $resultado .= "<tr>
                        <td>" . $row["idAluno"]. "</td>
                        <td>" . $row["nomeAluno"]. "</td>
                        <td>" . $row["inadimplente"]. "</td>
                        <td>" . $row["valorInadimplente"]. "</td>
                    </tr>";
    }
    $resultado .= "</table>";
} else {
    $resultado = "Nenhum aluno inadimplente encontrado.";
}

// Fechar a conexão com o banco de dados
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos Inadimplentes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Exibir resultados na página -->
    <?php echo $resultado; ?>
    <p>
        <a href="pagina_financeiro.html">Voltar</a>
    </p> 
</body>
</html>

<?php
include('conexao.php'); // Inclua o arquivo de conexão

// Preparar a consulta SQL para selecionar todos os livros
$sql = "SELECT * FROM livro";

// Executar a consulta SQL
$result = $mysqli->query($sql);

// Inicializar a variável para armazenar os resultados da busca
$resultado = "";

// Verificar se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Construir a tabela com os dados encontrados
    $resultado .= "<h2>Lista de Livros</h2>";
    $resultado .= "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Autor</th>
                    </tr>";
    while($row = $result->fetch_assoc()) {
        $resultado .= "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["nome"]. "</td>
                        <td>" . $row["autor"]. "</td>
                    </tr>";
    }
    $resultado .= "</table>";
} else {
    $resultado = "Nenhum livro cadastrado.";
}

// Fechar a conexão com o banco de dados
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Livros</h1>
    
    <!-- Exibir resultados na página -->
    <?php echo $resultado; ?>

    <p>
        <a href="pagina_biblioteca.html">Voltar</a>
    </p>
</body>
</html>

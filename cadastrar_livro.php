<?php
include('conexao.php'); // Inclua o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['autor'])) {
    // Receba os dados do formulário
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $autor = $mysqli->real_escape_string($_POST['autor']);

    // Preparar a consulta SQL para inserir dados na tabela 'livro'
    $sql = "INSERT INTO livro (nome, autor) VALUES ('$nome', '$autor')";

    // Executar a consulta SQL
    if ($mysqli->query($sql) === TRUE) {
        echo "Livro cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar livro: " . $mysqli->error;
    }

    // Fechar a conexão com o banco de dados
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de Livros</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>Nome do Livro:</label>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label>Autor do Livro:</label>
            <input type="text" name="autor" required>
        </p>
        <button type="submit">Cadastrar Livro</button>
        <p>
            <a href="pagina_biblioteca.html">Voltar</a>
        </p>
    </form>
</body>
</html>

<?php
include('conexao.php'); // Inclua o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['idade'])) {
    // Receba os dados do formulário
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $idade = $mysqli->real_escape_string($_POST['idade']);

    // Preparar a consulta SQL para inserir dados na tabela 'professor'
    $sql = "INSERT INTO professor (nome, idade) VALUES ('$nome', '$idade')";

    // Executar a consulta SQL
    if ($mysqli->query($sql) === TRUE) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . $mysqli->error;
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
    <title>Inserir Professor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Inserir Professor</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>Nome:</label>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label>Idade:</label>
            <input type="number" name="idade" required>
        </p>
        <button type="submit">Inserir</button>
        <p>
        <a href="pagina_cadastro_professores.html">Voltar</a>
    </p> 
    </form>
</body>
</html>

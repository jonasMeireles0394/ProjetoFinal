<?php
include('conexao.php'); // Inclua o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    // Receba os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar a consulta SQL para inserir dados na tabela 'usuario'
    $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

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
    <title>Inserir Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Criar Usuário</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>Nome:</label>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label>Email:</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label>Senha:</label>
            <input type="password" name="senha" required>
        </p>
        <button type="submit">Inserir</button>
        <p>
            <a href="usuario.html">Voltar</a>
        </p> 
    </form>
</body>
</html>

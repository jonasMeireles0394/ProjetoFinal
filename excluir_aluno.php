<?php
include('conexao.php'); // Inclua o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idAluno'])) {
    $idAluno = $_POST['idAluno'];

    // Preparar a consulta SQL para excluir um aluno pelo idAluno
    $sql = "DELETE FROM aluno WHERE idAluno = $idAluno";

    // Executar a consulta SQL
    if ($mysqli->query($sql) === TRUE) {
        if ($mysqli->affected_rows > 0) {
            echo "Registro excluído com sucesso!";
        } else {
            echo "Nenhum registro encontrado com o ID do Aluno fornecido.";
        }
    } else {
        echo "Erro ao excluir registro: " . $mysqli->error;
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
    <title>Excluir Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Excluir Aluno</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>ID do Aluno a Excluir:</label>
            <input type="number" name="idAluno" required>
        </p>
        <button type="submit">Excluir</button>
        <p>
            <a href="pagina_cadastro_alunos.html">Voltar</a>
        </p>
    </form>
</body>
</html>

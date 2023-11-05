<?php
include('conexao.php'); // Inclua o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idAluno']) && isset($_POST['nome']) && isset($_POST['idade'])) {
    // Receba os dados do formulário
    $idAluno = $_POST['idAluno'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    // Preparar a consulta SQL para verificar se o aluno com o ID fornecido existe
    $sql_check = "SELECT * FROM aluno WHERE idAluno = '$idAluno'";
    $result_check = $mysqli->query($sql_check);

    if ($result_check->num_rows > 0) {
        // O aluno com o ID fornecido existe, então atualize os valores
        $sql_update = "UPDATE aluno SET nome='$nome', idade='$idade' WHERE idAluno='$idAluno'";
        if ($mysqli->query($sql_update) === TRUE) {
            echo "Registro atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro: " . $mysqli->error;
        }
    } else {
        echo "Nenhum aluno encontrado com o ID fornecido.";
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
    <title>Alterar Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Alterar Aluno</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>ID do Aluno:</label>
            <input type="number" name="idAluno" required>
        </p>
        <p>
            <label>Novo Nome:</label>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label>Nova Idade:</label>
            <input type="number" name="idade" required>
        </p>
        <button type="submit">Salvar Alterações</button>
        <p>
            <a href="pagina_cadastro_alunos.html">Voltar</a>
        </p> 
    </form>
</body>
</html>

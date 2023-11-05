<?php
include('conexao.php'); // Inclua o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idProfessor']) && isset($_POST['nome']) && isset($_POST['idade'])) {
    // Receba os dados do formulário
    $idProfessor = $_POST['idProfessor'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    // Preparar a consulta SQL para verificar se o professor com o ID fornecido existe
    $sql_check = "SELECT * FROM professor WHERE id = '$idProfessor'";
    $result_check = $mysqli->query($sql_check);

    if ($result_check->num_rows > 0) {
        // O professor com o ID fornecido existe, então atualize os valores
        $sql_update = "UPDATE professor SET nome='$nome', idade='$idade' WHERE id='$idProfessor'";
        if ($mysqli->query($sql_update) === TRUE) {
            echo "Registro atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro: " . $mysqli->error;
        }
    } else {
        echo "Nenhum professor encontrado com o ID fornecido.";
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
    <title>Alterar Professor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Alterar Professor</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>ID do Professor:</label>
            <input type="number" name="idProfessor" required>
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
            <a href="pagina_cadastro_professores.html">Voltar</a>
        </p> 
    </form>
</body>
</html>

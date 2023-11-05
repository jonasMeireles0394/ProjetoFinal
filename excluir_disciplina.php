<?php
include('conexao.php'); // Inclua o arquivo de conexão

$resultado = ""; // Variável para armazenar mensagens de sucesso ou erro

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idDisciplina'])) {
    // Receba o ID da disciplina do formulário
    $idDisciplina = $mysqli->real_escape_string($_POST['idDisciplina']);

    // Preparar a consulta SQL para verificar se o registro existe
    $verifica_sql = "SELECT * FROM disciplina WHERE id = '$idDisciplina'";
    $verifica_result = $mysqli->query($verifica_sql);

    // Verificar se o registro existe
    if ($verifica_result->num_rows > 0) {
        // Preparar a consulta SQL para excluir o registro da tabela 'disciplina'
        $exclusao_sql = "DELETE FROM disciplina WHERE id = '$idDisciplina'";

        // Executar a consulta SQL de exclusão
        if ($mysqli->query($exclusao_sql) === TRUE) {
            $resultado = "Disciplina excluída com sucesso!";
        } else {
            $resultado = "Erro ao excluir disciplina: " . $mysqli->error;
        }
    } else {
        $resultado = "Nenhum registro encontrado para o ID informado.";
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
    <title>Excluir Disciplina</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Excluir Disciplina</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>ID da Disciplina a ser excluída:</label>
            <input type="number" name="idDisciplina" required>
        </p>
        <button type="submit">Excluir Disciplina</button>
    </form>

    <!-- Exibir resultados na página -->
    <?php echo $resultado; ?>

    <p>
        <a href="pagina_cadastro_disciplinas.html">Voltar</a>
    </p>
</body>
</html>

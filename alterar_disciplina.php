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
        // Receber os novos dados do formulário
        $novoNome = $mysqli->real_escape_string($_POST['novoNome']);
        $novaCargaHoraria = $mysqli->real_escape_string($_POST['novaCargaHoraria']);

        // Preparar a consulta SQL para atualizar o registro na tabela 'disciplina'
        $atualizacao_sql = "UPDATE disciplina SET nome = '$novoNome', cargaHoraria = '$novaCargaHoraria' WHERE id = '$idDisciplina'";

        // Executar a consulta SQL de atualização
        if ($mysqli->query($atualizacao_sql) === TRUE) {
            $resultado = "Disciplina atualizada com sucesso!";
        } else {
            $resultado = "Erro ao atualizar disciplina: " . $mysqli->error;
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
    <title>Alterar Disciplina</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Alterar Disciplina</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            <label>ID da Disciplina a ser alterada:</label>
            <input type="number" name="idDisciplina" required>
        </p>
        <p>
            <label>Novo Nome da Disciplina:</label>
            <input type="text" name="novoNome" required>
        </p>
        <p>
            <label>Nova Carga Horária:</label>
            <input type="number" name="novaCargaHoraria" required>
        </p>
        <button type="submit">Alterar Disciplina</button>
    </form>

    <!-- Exibir resultados na página -->
    <?php echo $resultado; ?>

    <p>
        <a href="pagina_cadastro_disciplinas.html">Voltar</a>
    </p>
</body>
</html>
